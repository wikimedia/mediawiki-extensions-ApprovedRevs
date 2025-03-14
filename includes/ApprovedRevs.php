<?php

use MediaWiki\Content\Renderer\ContentParseParams;
use MediaWiki\Linker\LinkTarget;
use MediaWiki\MediaWikiServices;
use MediaWiki\Page\PageReference;
use MediaWiki\Revision\MutableRevisionRecord;
use MediaWiki\Revision\SlotRecord;
use MediaWiki\Title\Title;
use MediaWiki\User\UserIdentity;
use MediaWiki\User\UserNameUtils;
use Wikimedia\Rdbms\IDatabase;
use Wikimedia\Rdbms\IReadableDatabase;

/**
 * Main class for the Approved Revs extension.
 *
 * @file
 * @ingroup Extensions
 *
 * @author Yaron Koren
 */
class ApprovedRevs {

	/**
	 * Static arrays to prevent querying the database more than necessary.
	 * @var array<int,?Content>
	 */
	private static $mApprovedContentForPage = [];
	/** @var array<int,?int> */
	private static $mApprovedRevIDForPage = [];
	/** @var array<int,?UserIdentity> */
	private static $mApproverForPage = [];
	/** @var array<int,bool> */
	private static $mApprovablePages = [];
	/** @var array<int,bool> */
	private static $mApprovableFiles = [];

	/**
	 * Array in form $mUserCanApprove["<user id>:<article id>"] = <bool>
	 * @var array<string,?bool>
	 */
	private static $mUserCanApprove = [];
	/** @var array<string,array{string|false, string|false}> */
	private static $mApprovedFileInfo = [];

	/** @var int[] */
	private static $mApprovedRevsNamespaces;

	/**
	 * Get array of approvable namespaces. Handles backwards compatibility.
	 *
	 * @return int[]
	 */
	public static function getApprovableNamespaces() {
		global $egApprovedRevsNamespaces, $egApprovedRevsEnabledNamespaces;

		if ( is_array( self::$mApprovedRevsNamespaces ) ) {
			return self::$mApprovedRevsNamespaces;
		}

		self::$mApprovedRevsNamespaces = [];

		// Definition of $egApprovedRevsNamespaces removed from Approved
		// Revs to handle extension.json method of config settings. Now,
		// if $egApprovedRevsNamespaces is defined, then it must have been
		// defined by the user in LocalSettings.php. Since no good method of
		// providing backwards-compatibility was determined, instead notify user
		// that $egApprovedRevsNamespaces is obsolete.
		if ( isset( $egApprovedRevsNamespaces ) ) {
			throw new MWException( '$egApprovedRevsNamespaces is no longer supported - ' .
				'please use $egApprovedRevsEnabledNamespaces (which has a different format) instead' );
		}

		// since extension.json values have to be strings, convert to int
		// changes [ "0" => true, "10" => false, "14" => true ] to [0, 14]
		self::$mApprovedRevsNamespaces = array_keys( array_filter( $egApprovedRevsEnabledNamespaces ) );

		return self::$mApprovedRevsNamespaces;
	}

	/**
	 * Gets the approved revision User for this page, or null if there isn't
	 * one.
	 *
	 * @param Title $title The page title
	 * @return ?UserIdentity
	 */
	public static function getRevApprover( $title ) {
		if ( !self::pageIsApprovable( $title ) ) {
			return null;
		}

		$pageID = $title->getArticleID();
		if ( !isset( self::$mApproverForPage[$pageID] ) ) {
			$dbr = self::getReadDB();
			$approverID = $dbr->selectField( 'approved_revs', 'approver_id',
				[ 'page_id' => $pageID ] );
			$approver = $approverID ? User::newFromID( $approverID ) : null;
			self::$mApproverForPage[$pageID] = $approver;
		}
		return self::$mApproverForPage[$pageID];
	}

	/**
	 * Gets the approved revision ID for this page, or null if there isn't
	 * one.
	 *
	 * @param ?Title $title
	 * @return int|null
	 */
	public static function getApprovedRevID( $title ) {
		if ( $title == null ) {
			return null;
		}

		$pageID = $title->getArticleID();
		if ( array_key_exists( $pageID, self::$mApprovedRevIDForPage ) ) {
			return self::$mApprovedRevIDForPage[$pageID];
		}

		if ( !self::pageIsApprovable( $title ) ) {
			return null;
		}

		$dbr = self::getReadDB();
		$revID = $dbr->selectField(
			'approved_revs',
			'rev_id',
			[ 'page_id' => $pageID ],
			__METHOD__
		);
		self::$mApprovedRevIDForPage[$pageID] = $revID;
		return $revID;
	}

	/**
	 * Returns whether or not this page has a revision ID.
	 *
	 * @param ?Title $title
	 * @return bool
	 */
	public static function hasApprovedRevision( $title ) {
		$revision_id = self::getApprovedRevID( $title );
		return ( !empty( $revision_id ) );
	}

	/**
	 * @param LinkTarget $title
	 * @param int $revisionID
	 * @return ?Content
	 */
	public static function getContent( $title, $revisionID = 0 ) {
		$revisionRecord = MediaWikiServices::getInstance()->getRevisionLookup()
			->getRevisionByTitle( $title, $revisionID );
		return $revisionRecord->getContent( SlotRecord::MAIN );
	}

	/**
	 * Returns the content of the approved revision of this page, or null
	 * if there isn't one.
	 *
	 * @param Title $title
	 * @return ?Content
	 */
	public static function getApprovedContent( $title ) {
		$pageID = $title->getArticleID();
		if ( array_key_exists( $pageID, self::$mApprovedContentForPage ) ) {
			return self::$mApprovedContentForPage[$pageID];
		}

		$revisionID = self::getApprovedRevID( $title );
		if ( empty( $revisionID ) ) {
			return null;
		}

		$content = self::getContent( $title, $revisionID );
		self::$mApprovedContentForPage[$pageID] = $content;

		return $content;
	}

	/**
	 * Helper function - returns whether the user is currently requesting
	 * a page via the simple URL for it - not specfying a version number,
	 * not editing the page, etc.
	 *
	 * @param WebRequest $request
	 * @return bool
	 */
	public static function isDefaultPageRequest( $request ) {
		if ( $request->getCheck( 'oldid' ) ) {
			return false;
		}
		// Check if it's an action other than viewing.
		if ( $request->getCheck( 'action' ) &&
			$request->getVal( 'action' ) != 'view' &&
			$request->getVal( 'action' ) != 'purge' &&
			$request->getVal( 'action' ) != 'render' ) {
				return false;
		}
		return true;
	}

	/**
	 * @return IReadableDatabase
	 */
	public static function getReadDB() {
		return MediaWikiServices::getInstance()
			->getDBLoadBalancerFactory()
			->getReplicaDatabase();
	}

	/**
	 * @return IDatabase
	 */
	public static function getWriteDB() {
		return MediaWikiServices::getInstance()
			->getDBLoadBalancerFactory()
			->getPrimaryDatabase();
	}

	/**
	 * Returns whether this page can be approved - either because it's in
	 * a supported namespace, or because it's been specially marked as
	 * approvable. Also stores the boolean answer as a field in the page
	 * object, to speed up processing if it's called more than once.
	 *
	 * @param Title $title
	 * @return bool
	 */
	public static function pageIsApprovable( Title $title ) {
		$articleID = $title->getArticleID();

		// If this function was already called for this page, the value
		// should have been stored.
		if ( array_key_exists( $articleID, self::$mApprovablePages ) ) {
			return self::$mApprovablePages[$articleID];
		}

		if ( !$title->exists() ) {
			self::$mApprovablePages[$articleID] = false;
			return false;
		}

		// File *pages* are not ever approvable. Files themselves can
		// be, but checks for file approvability are handled by
		// fileIsApprovable(). This constraint is to avoid confusion
		// between approving file pages and approving files themselves.
		if ( $title->getNamespace() === NS_FILE ) {
			self::$mApprovablePages[$articleID] = false;
			return false;
		}

		// Allow custom setting of whether the page is approvable.
		if ( !MediaWikiServices::getInstance()->getHookContainer()
			->run( 'ApprovedRevsPageIsApprovable', [ $title, &$isApprovable ] )
		) {
			self::$mApprovablePages[$articleID] = $isApprovable;
			return $isApprovable;
		}

		// Check the namespace.
		if ( in_array( $title->getNamespace(), self::getApprovableNamespaces() ) ) {
			self::$mApprovablePages[$articleID] = true;
			return true;
		}

		// It's not in an included namespace, so check for the page
		// properties for the parser functions - for some reason,
		// calling the standard getProperty() function doesn't work, so
		// we just do a DB query on the page_props table.
		$dbr = self::getReadDB();
		$count = $dbr->selectField( 'page_props', 'COUNT(*)',
			[
				'pp_page' => $articleID,
				'pp_propname' => [
					'approvedrevs-approver-users', 'approvedrevs-approver-groups'
				],
			],
			__METHOD__
		);
		if ( $count > 0 ) {
			self::$mApprovablePages[$articleID] = true;
			return true;
		}

		// parser function page properties not present. Check for magic word.
		$count = $dbr->selectField( 'page_props', 'COUNT(*)',
			[
				'pp_page' => $articleID,
				'pp_propname' => 'approvedrevs',
				'pp_value' => 'y'
			],
			__METHOD__
		);
		$isApprovable = ( $count == '1' );
		self::$mApprovablePages[$articleID] = $isApprovable;
		return $isApprovable;
	}

	/**
	 * @param Title $title
	 * @return bool
	 */
	public static function fileIsApprovable( Title $title ) {
		$articleID = $title->getArticleID();

		// If this function was already called for this page, the value
		// should have been stored.
		if ( array_key_exists( $articleID, self::$mApprovableFiles ) ) {
			return self::$mApprovableFiles[$articleID];
		}

		if ( !$title->exists() ) {
			self::$mApprovableFiles[$articleID] = false;
			return false;
		}

		// Allow custom setting of whether the page is approvable.
		if ( !MediaWikiServices::getInstance()->getHookContainer()
			->run( 'ApprovedRevsFileIsApprovable', [ $title, &$fileIsApprovable ] )
		) {
			self::$mApprovableFiles[$articleID] = $fileIsApprovable;
			return $fileIsApprovable;
		}

		// Check if NS_FILE is in approvable namespaces
		$approvedRevsNamespaces = self::getApprovableNamespaces();
		if ( in_array( NS_FILE, $approvedRevsNamespaces ) ) {
			self::$mApprovableFiles[$articleID] = true;
			return true;
		}

		// It's not in an included namespace, so check for the page
		// properties for the parser functions - for some reason,
		// calling the standard getProperty() function doesn't work, so
		// we just do a DB query on the page_props table.
		$dbr = self::getReadDB();
		$count = $dbr->selectField( 'page_props', 'COUNT(*)',
			[
				'pp_page' => $articleID,
				'pp_propname' => [
					'approvedrevs-approver-users',
					'approvedrevs-approver-groups'
				],
			],
			__METHOD__
		);
		if ( $count > 0 ) {
			self::$mApprovableFiles[$articleID] = true;
			return true;
		}

		// Parser function page properties not present. Check for magic word.
		$count = $dbr->selectField( 'page_props', 'COUNT(*)',
			[
				'pp_page' => $articleID,
				'pp_propname' => 'approvedrevs',
				'pp_value' => 'y'
			],
			__METHOD__
		);
		if ( $count == '1' ) {
			self::$mApprovableFiles[$articleID] = true;
			return true;
		}

		// If a file already has an approval, it must be considered
		// approvable in order for the user to be able to view/modify
		// approvals. Though this wasn't the case on versions of
		// ApprovedRevs before v1.0, it is necessary now since
		// approvability can change much more easily.

		// if title in approved_revs_files table
		[ $timestamp, $sha1 ] = self::getApprovedFileInfo( $title );
		if ( $timestamp !== false ) {
			// only approvable because it already has an approved rev, not
			// because it is in ApprovedRevs::$permissions
			self::$mApprovableFiles[$articleID] = true;
			return true;
		}

		self::$mApprovableFiles[$articleID] = false;
		return false;
	}

	/**
	 * @param User $user
	 * @param Title $title
	 * @param string $permission
	 * @return bool
	 */
	public static function checkPermission( User $user, Title $title, $permission ) {
		$permissionManager = MediaWikiServices::getInstance()->getPermissionManager();
		return ( $permissionManager->userCan( $permission, $user, $title ) ||
			$permissionManager->userHasRight( $user, $permission ) );
	}

	/**
	 * @param User $user
	 * @param Title $title
	 * @return bool
	 */
	public static function userCanApprove( User $user, Title $title ) {
		global $egApprovedRevsSelfOwnedNamespaces;
		$permission = 'approverevisions';

		$userAndPageKey = $user->getId() . ':' . $title->getArticleID();

		// set to null to avoid notices below
		if ( !isset( self::$mUserCanApprove[$userAndPageKey] ) ) {
			self::$mUserCanApprove[$userAndPageKey] = null;
		}

		// $mUserCanApprove is a static variable used for
		// "caching" the result of this function, so that
		// it only has to be called once per user/page combination
		if ( self::$mUserCanApprove[$userAndPageKey] ) {
			return true;
		} elseif ( self::$mUserCanApprove[$userAndPageKey] === false ) {
			return false;
		} elseif ( self::checkPermission( $user, $title, $permission ) ) {
			self::$mUserCanApprove[$userAndPageKey] = true;
			return true;
		} elseif ( self::checkParserFunctionPermission( $user, $title ) ) {
			self::$mUserCanApprove[$userAndPageKey] = true;
			return true;
		} else {
			// If the user doesn't have the 'approverevisions'
			// permission, nor does #approvable_by grant them
			// permission, they still might be able to approve
			// revisions - it depends on whether the current
			// namespace is within the admin-defined
			// $egApprovedRevsSelfOwnedNamespaces array.
			$namespace = $title->getNamespace();
			if ( in_array( $namespace, $egApprovedRevsSelfOwnedNamespaces ) ) {
				if ( $namespace == NS_USER ) {
					// If the page is in the 'User:'
					// namespace, this user can approve
					// revisions if it's their user page.
					if ( $title->getText() == $user->getName() ) {
						self::$mUserCanApprove[$userAndPageKey] = true;
						return true;
					}
				} else {
					// Otherwise, they can approve revisions
					// if they created the page.
					// We get that information via a SQL
					// query - is there an easier way?

					// We can't just call self::getReadDB() here, because of
					// the tableExists() call.
					$lb = MediaWikiServices::getInstance()->getDBLoadBalancer();
					$dbr = $lb->getConnectionRef( DB_REPLICA );
					if ( $dbr->tableExists( 'revision_actor_temp' ) ) {
						$tables = [ 'ra' => 'revision_actor_temp', 'a' => 'actor' ];
						$userIDField = 'a.actor_user';
						$pageIDField = 'ra.revactor_page';
						$revIDField = 'ra.revactor_rev';
						$joinOn = [ 'ra' => [ 'JOIN', 'ra.revactor_actor = a.actor_id' ] ];
					} else {
						// The "rev_actor" table field was added in MW 1.35, but for
						// some reason it appears to not always get populated. So,
						// only use it if the temp table is gone.
						$tables = [ 'r' => 'revision', 'a' => 'actor' ];
						$userIDField = 'a.actor_user';
						$pageIDField = 'r.rev_page';
						$revIDField = 'r.rev_id';
						$joinOn = [ 'r' => [ 'JOIN', 'r.rev_actor = a.actor_id' ] ];
					}
					$row = $dbr->selectRow(
						$tables,
						[ 'user_id' => $userIDField ],
						[ $pageIDField => $title->getArticleID() ],
						__METHOD__,
						[ 'ORDER BY' => $revIDField . ' ASC', 'LIMIT' => 1 ],
						$joinOn
					);
					if ( $row->user_id !== null && $row->user_id == $user->getID() ) {
						self::$mUserCanApprove[$userAndPageKey] = true;
						return true;
					}
				}
			}
		}
		self::$mUserCanApprove[$userAndPageKey] = false;
		return false;
	}

	/**
	 * Check if a user is allowed to approve a page based upon being listed
	 * in the page properties approvedrevs-approver-users and
	 * approvedrevs-approver-groups.
	 *
	 * @param User $user Check if this user has #approvable_by permissions on title
	 * @param Title $title Title to check
	 * @return bool Whether or not approving revisions is allowed
	 * @since 1.0
	 */
	public static function checkParserFunctionPermission( User $user, Title $title ) {
		$articleID = $title->getArticleID();

		$dbr = self::getReadDB();

		// First check:
		// Users

		$result = $dbr->selectField(
			'page_props',
			'pp_value',
			[
				'pp_page' => $articleID,
				'pp_propname' => "approvedrevs-approver-users"
			],
			__METHOD__
		);
		if ( $result !== false ) {
			// If user is listed as an approver, allow approval.
			$userNameUtils = MediaWikiServices::getInstance()->getUserNameUtils();
			$approverUsers = array_map( static function ( $name ) use ( $userNameUtils ) {
				return $userNameUtils->getCanonical( $name, UserNameUtils::RIGOR_USABLE );
			}, explode( ',', $result ) );
			if ( in_array( $user->getName(), $approverUsers ) ) {
				return true;
			}
		}

		// Second check:
		// Groups

		$result = $dbr->selectField(
			'page_props',
			'pp_value',
			[
				'pp_page' => $articleID,
				'pp_propname' => "approvedrevs-approver-groups"
			],
			__METHOD__
		);
		if ( $result !== false ) {
			$groups = MediaWikiServices::getInstance()->getUserGroupManager()
				->getUserGroups( $user );
			// intersect groups that can approve with user's group
			$userGroupsWithApprove = array_intersect(
				explode( ',', $result ), $groups
			);

			// if user has any groups in list of approver groups, allow approval
			if ( count( $userGroupsWithApprove ) > 0 ) {
				return true;
			}
		}

		// neither group nor username allowed approval...disallow
		return false;
	}

	/**
	 * @param Title $title
	 * @param int $rev_id
	 * @param UserIdentity $user
	 * @param bool $isAutoApprove
	 */
	public static function saveApprovedRevIDInDB( $title, $rev_id, UserIdentity $user, $isAutoApprove = true ) {
		$timestamp = date( 'Y-m-d H:i:s' );
		$approvalInfo = [
			'rev_id' => $rev_id,
			'approval_date' => $timestamp
		];

		if ( !$isAutoApprove ) {
			$approvalInfo['approver_id'] = $user->getID();
		}

		$dbw = self::getWriteDB();
		$page_id = $title->getArticleID();
		$old_rev_id = $dbw->selectField( 'approved_revs', 'rev_id', [ 'page_id' => $page_id ] );
		if ( $old_rev_id ) {
			$dbw->update( 'approved_revs', $approvalInfo, [ 'page_id' => $page_id ] );
		} else {
			$approvalInfo['page_id'] = $page_id;
			$dbw->insert( 'approved_revs', $approvalInfo );
		}
		// Update "cache" in memory
		self::$mApprovedRevIDForPage[$page_id] = $rev_id;
		self::$mApproverForPage[$page_id] = $user;

		$content = self::getContent( $title, $rev_id );
		MediaWikiServices::getInstance()->getHookContainer()
			->run( 'ApprovedRevsRevisionApproved', [ $output = null, $title, $rev_id, $content ] );
	}

	/**
	 * Use the approved revision (instead of latest revision) to run page updates.
	 *
	 * These are normally run by MediaWiki core after each edit. When the latest
	 * edit is auto-approved, this is fine. Otherwise, we use this method after
	 * edit/approve/unapprove actions to re-run LinksUpdate and SearchUpdate in
	 * context of the approved revision.
	 *
	 * @param Title|PageIdentity $title
	 * @param int $approvedRevID
	 */
	public static function doPageUpdates( $title, $approvedRevID ) {
		global $egApprovedRevsBlankIfUnapproved;

		$wikiPage = MediaWikiServices::getInstance()->getWikiPageFactory()->newFromTitle( $title );
		$revRecord = MediaWikiServices::getInstance()->getRevisionLookup()
			->getRevisionByTitle( $title, $approvedRevID );

		if ( !$wikiPage || !$revRecord ) {
			// Race condition, page/rev was deleted or moved?
			// Ignore, we will respond again to the delete/move action.
			return;
		}
		$user = $revRecord->getUser();
		if ( !$user ) {
			// Can't index the revision if was RevDel'ed.
			return;
		}

		if ( $egApprovedRevsBlankIfUnapproved ) {
			// For LinksUpdate, we don't need to handle content blanking here because
			// DerivedPageDataUpdater::doUpdates() eventually calls the
			// RevisionDataUpdates hook, which we handle already. This is for core's
			// SearchUpdate instead, which runs after, and separately from, the
			// updates exposed to RevisionDataUpdates.
			$mutableRev = MutableRevisionRecord::newFromParentRevision( $revRecord );
			$mutableRev->setUser( $user );
			$mutableRev->setId( $revRecord->getId() );
			$mutableRev->setContent(
				SlotRecord::MAIN,
				$wikiPage->getContentHandler()->makeEmptyContent()
			);
			$revRecord = $mutableRev;
		}

		$pageDataUpdater = MediaWikiServices::getInstance()->getPageUpdaterFactory()
			->newDerivedPageDataUpdater( $wikiPage );
		$pageDataUpdater->prepareUpdate( $revRecord );
		$pageDataUpdater->doUpdates();
	}

	/**
	 * Sets a certain revision as the approved one for this page in the
	 * approved_revs DB table; calls a "links update" on this revision
	 * so that category information can be stored correctly, as well as
	 * info for extensions such as Semantic MediaWiki; and logs the action.
	 *
	 * @param Title $title
	 * @param int $rev_id
	 * @param User $user
	 * @param bool $is_latest
	 */
	public static function setApprovedRevID( $title, $rev_id, User $user, $is_latest = false ) {
		// Don't approve it if it's already approved.
		if ( $rev_id == self::getApprovedRevID( $title ) ) {
			return;
		}

		self::saveApprovedRevIDInDB( $title, $rev_id, $user, false );

		// If the revision being approved is definitely the latest
		// one, there's no need to call the parser on it.
		if ( !$is_latest ) {
			self::doPageUpdates( $title, $rev_id );
		}

		$log = new LogPage( 'approval' );
		$rev_url = $title->getFullURL( [ 'oldid' => $rev_id ] );
		$rev_link = Xml::element(
			'a',
			[ 'href' => $rev_url ],
			$rev_id
		);
		$logParams = [ $rev_link ];
		$log->addEntry(
			'approve',
			$title,
			'',
			$logParams,
			$user
		);
	}

	/**
	 * @param Title $title
	 * @param Content|null $content
	 */
	public static function unsetApprovalInDB( $title, $content = null ) {
		$dbw = self::getWriteDB();
		$page_id = $title->getArticleID();
		$dbw->delete( 'approved_revs', [ 'page_id' => $page_id ] );
		unset( self::$mApprovedContentForPage[ $page_id ] );
		unset( self::$mApprovedRevIDForPage[ $page_id ] );
		unset( self::$mApproverForPage[ $page_id ] );

		MediaWikiServices::getInstance()->getHookContainer()
			->run( 'ApprovedRevsRevisionUnapproved', [ $output = null, $title, $content ] );
	}

	/**
	 * Unsets the approved revision for this page in the approved_revs DB
	 * table; calls a "links update" on this page so that category
	 * information can be stored correctly, as well as info for
	 * extensions such as Semantic MediaWiki; and logs the action.
	 *
	 * @param Title $title
	 * @param User $user
	 */
	public static function unsetApproval( $title, User $user ) {
		// Make sure the page actually has an approved revision.
		$revId = self::getApprovedRevID( $title );
		if ( !$revId ) {
			return;
		}

		self::doPageUpdates( $title, $revId );

		$content = self::getContent( $title );
		self::unsetApprovalInDB( $title, $content );

		$log = new LogPage( 'approval' );
		$log->addEntry(
			'unapprove',
			$title,
			'',
			[],
			$user
		);
	}

	/**
	 * @param ContentHandler $contentHandler
	 * @param Content $content
	 * @param PageReference $title
	 * @param int $revID
	 * @param UserIdentity $user
	 * @return ParserOutput
	 */
	public static function getParserOutput( $contentHandler, $content, $title, $revID, $user ) {
		$parserOptions = ParserOptions::newFromUser( $user );
		$contentParseParams = new ContentParseParams( $title, $revID, $parserOptions );
		return $contentHandler->getParserOutput( $content, $contentParseParams );
	}

	public static function addCSS() {
		global $wgOut;
		$wgOut->addModuleStyles( 'ext.ApprovedRevs' );
	}

	/**
	 * @param Title $title
	 * @param string $timestamp
	 * @param string $sha1
	 * @param UserIdentity $user
	 */
	public static function setApprovedFileInDB( $title, $timestamp, $sha1, UserIdentity $user ) {
		$parser = MediaWikiServices::getInstance()->getParserFactory()->create();
		$parser->setTitle( $title );

		$dbw = self::getWriteDB();
		$fileTitle = $title->getDBkey();
		$oldFileTitle = $dbw->selectField(
			'approved_revs_files', 'file_title',
			[ 'file_title' => $fileTitle ]
		);
		if ( $oldFileTitle ) {
			$dbw->update( 'approved_revs_files',
				[
					'approved_timestamp' => $timestamp,
					'approved_sha1' => $sha1
				],
				[ 'file_title' => $fileTitle ]
			);
		} else {
			$dbw->insert( 'approved_revs_files',
				[
					'file_title' => $fileTitle,
					'approved_timestamp' => $timestamp,
					'approved_sha1' => $sha1
				]
			);
		}
		// Update "cache" in memory
		self::$mApprovedFileInfo[$fileTitle] = [ $timestamp, $sha1 ];

		$log = new LogPage( 'approval' );

		$imagepage = ImagePage::newFromID( $title->getArticleID() );
		$displayedFileUrl = $imagepage->getDisplayedFile()->getFullURL();

		$revisionAnchorTag = Xml::element(
			'a',
			[
				'href' => $displayedFileUrl,
				'title' => 'unique identifier: ' . $sha1
			],
			// There's no simple "revision ID" for file uploads. Instead
			// uniqueness is determined by sha1, but dumping out the sha1 here
			// would be ugly. Instead show a timestamp of the file upload.
			wfTimestamp( TS_RFC2822, $timestamp )
		);
		$logParams = [ $revisionAnchorTag ];
		$log->addEntry(
			'approvefile',
			$title,
			'',
			$logParams,
			$user
		);

		MediaWikiServices::getInstance()->getHookContainer()->run(
			'ApprovedRevsFileRevisionApproved',
			[ $parser, $title, $timestamp, $sha1 ]
		);
	}

	/**
	 * @param Title $title
	 * @param User $user
	 */
	public static function unsetApprovedFileInDB( $title, User $user ) {
		$parser = MediaWikiServices::getInstance()->getParserFactory()->create();
		$parser->setTitle( $title );

		$fileTitle = $title->getDBkey();

		$dbw = self::getWriteDB();
		$dbw->delete( 'approved_revs_files',
			[ 'file_title' => $fileTitle ]
		);
		// the unapprove page method had LinksUpdate and Parser
		// objects here, but the page text has not changed at all with
		// a file approval, so I don't think those are necessary.

		$log = new LogPage( 'approval' );
		$log->addEntry(
			'unapprove',
			$title,
			'',
			[],
			$user
		);

		// Delete from the in-memory cache as well.
		self::clearApprovedFileInfo( $title );

		MediaWikiServices::getInstance()->getHookContainer()->run(
			'ApprovedRevsFileRevisionUnapproved', [ $parser, $title ]
		);
	}

	public static function clearApprovedFileInfo( Title $fileTitle ) {
		unset( self::$mApprovedFileInfo[ $fileTitle->getDBkey() ] );
	}

	/**
	 * Pulls from the DB table approved_revs_files which revision of a file,
	 * if any besides the most recent, should be used as the approved
	 * revision.
	 *
	 * @param LinkTarget $fileTitle
	 * @return array{string|false, string|false}
	 */
	public static function getApprovedFileInfo( $fileTitle ) {
		if ( isset( self::$mApprovedFileInfo[ $fileTitle->getDBkey() ] ) ) {
			return self::$mApprovedFileInfo[ $fileTitle->getDBkey() ];
		}

		$dbr = self::getReadDB();
		$row = $dbr->selectRow(
			'approved_revs_files',
			[ 'approved_timestamp', 'approved_sha1' ],
			[ 'file_title' => $fileTitle->getDBkey() ],
			__METHOD__
		);
		if ( $row ) {
			$return = [ $row->approved_timestamp, $row->approved_sha1 ];
		} else {
			$return = [ false, false ];
		}

		self::$mApprovedFileInfo[ $fileTitle->getDBkey() ] = $return;
		return $return;
	}

	/**
	 * @param string $mode
	 * @return array
	 */
	public static function getQueryInfoPageApprovals( $mode ) {
		$approvedRevsNamespaces = self::getApprovableNamespaces();
		// Don't include the "File:" namespace in this query - file pages are not
		// approvable. (The presence of NS_FILE instead indicates that files
		// themselves are approvable.)
		$key = array_search( NS_FILE, $approvedRevsNamespaces );
		if ( $key !== false ) {
			unset( $approvedRevsNamespaces[$key] );
		}

		$mainCondsString = "( pp_propname = 'approvedrevs' AND pp_value = 'y' " .
			"OR pp_propname = 'approvedrevs-approver-users' " .
			"OR pp_propname = 'approvedrevs-approver-groups' )";
		if ( $mode == 'invalid' ) {
			$mainCondsString = "( pp_propname IS NULL OR NOT $mainCondsString )";
		}
		if ( count( $approvedRevsNamespaces ) > 0 ) {
			if ( $mode == 'invalid' ) {
				$mainCondsString .= " AND ( p.page_namespace NOT IN ( " .
					implode( ',', $approvedRevsNamespaces ) . " ) )";
			} else {
				$mainCondsString .= " OR ( p.page_namespace IN ( " .
					implode( ',', $approvedRevsNamespaces ) . " ) )";
			}
		}

		if ( $mode == 'all' ) {
			return [
				'tables' => [
					'ar' => 'approved_revs',
					'p' => 'page',
					'pp' => 'page_props',
				],
				'fields' => [
					'p.page_id AS id',
					'ar.rev_id AS rev_id',
					'p.page_latest AS latest_id',
					'p.page_namespace',
					'p.page_title',
				],
				'join_conds' => [
					'p' => [
						'JOIN', 'ar.page_id=p.page_id'
					],
					'pp' => [
						'LEFT OUTER JOIN', 'ar.page_id=pp_page'
					],
				],
				'conds' => [ $mainCondsString ],
				'options' => [ 'DISTINCT' ]
			];
		} elseif ( $mode == 'unapproved' ) {
			return [
				'tables' => [
					'ar' => 'approved_revs',
					'p' => 'page',
					'pp' => 'page_props',
				],
				'fields' => [
					'p.page_id AS id',
					'p.page_latest AS latest_id',
					'p.page_namespace',
					'p.page_title',
				],
				'join_conds' => [
					'ar' => [
						'LEFT OUTER JOIN', 'p.page_id=ar.page_id'
					],
					'pp' => [
						'LEFT OUTER JOIN', 'p.page_id=pp_page'
					],
				],
				'conds' => [ 'ar.page_id IS NULL', $mainCondsString ],
				'options' => [ 'DISTINCT' ]
			];
		} elseif ( $mode == 'invalid' ) {
			return [
				'tables' => [
					'ar' => 'approved_revs',
					'p' => 'page',
					'pp' => 'page_props',
				],
				'fields' => [
					'p.page_id AS id',
					'p.page_latest AS latest_id',
					'p.page_namespace',
					'p.page_title',
				],
				'join_conds' => [
					'p' => [
						'LEFT OUTER JOIN', 'p.page_id=ar.page_id'
					],
					'pp' => [
						'LEFT OUTER JOIN', 'ar.page_id=pp_page'
					],
				],
				'conds' => [ $mainCondsString ],
				'options' => [ 'DISTINCT' ]
			];
		} else {
			// 'approved revision is not latest'
			return [
				'tables' => [
					'ar' => 'approved_revs',
					'p' => 'page',
					'pp' => 'page_props',
				],
				'fields' => [
					'p.page_id AS id',
					'ar.rev_id AS rev_id',
					'p.page_latest AS latest_id',
					'p.page_namespace',
					'p.page_title',
				],
				'join_conds' => [
					'p' => [
						'JOIN', 'ar.page_id=p.page_id'
					],
					'pp' => [
						'LEFT OUTER JOIN', 'ar.page_id=pp_page'
					],
				],
				'conds' => [ 'p.page_latest != ar.rev_id', $mainCondsString ],
				'options' => [ 'DISTINCT' ]
			];
		}
	}

	/**
	 * @param string $mode
	 * @return array
	 */
	public static function getQueryInfoFileApprovals( $mode ) {
		$tables = [
			'ar' => 'approved_revs_files',
			'im' => 'image',
			'p' => 'page',
		];

		$fields = [
			'im.img_name AS title',
			'ar.approved_sha1 AS approved_sha1',
			'ar.approved_timestamp AS approved_ts',
			'im.img_sha1 AS latest_sha1',
			'im.img_timestamp AS latest_ts',
		];

		$conds = [ 'p.page_namespace' => NS_FILE ];

		$join_conds = [
			'im' => [ null, 'ar.file_title=im.img_name' ],
			'p' => [ 'JOIN', 'im.img_name=p.page_title' ],
		];

		$pagePropsConditions = "( (pp_propname = 'approvedrevs' AND pp_value = 'y') " .
			"OR pp_propname = 'approvedrevs-approver-users' " .
			"OR pp_propname = 'approvedrevs-approver-groups' )";

		#
		# mode: approvedfiles
		#
		if ( $mode == 'approvedfiles' ) {

			$join_conds['im'][0] = 'JOIN';

			// get everything from approved_revs table

		#
		# mode: unapprovedfiles
		#
		} elseif ( $mode == 'unapprovedfiles' ) {

			$join_conds['im'][0] = 'RIGHT OUTER JOIN';

			$tables['pp'] = 'page_props';
			$join_conds['pp'] = [ 'LEFT OUTER JOIN', 'p.page_id=pp_page' ];

			$approvedRevsNamespaces = self::getApprovableNamespaces();

			// if all files are not approvable then need to find files matching
			// __APPROVEDREVS__ and {{#approvable_by: ... }} permissions
			if ( !in_array( NS_FILE, $approvedRevsNamespaces ) ) {
				$conds[] = $pagePropsConditions;
			}

			$conds['ar.file_title'] = null;

		#
		# mode: invalidfiles
		#
		} elseif ( $mode == 'invalidfiles' ) {

			$join_conds['im'][0] = 'LEFT OUTER JOIN';

			$tables['pp'] = 'page_props';
			$join_conds['pp'] = [ 'LEFT OUTER JOIN', 'p.page_id=pp_page' ];

			$approvedRevsNamespaces = self::getApprovableNamespaces();

			if ( in_array( NS_FILE, $approvedRevsNamespaces ) ) {

				// if all files are approvable, no files should have invalid
				// approvals. Below is an impossible condition that prevents any
				// results from being returned.
				$conds[] = 'p.page_namespace=1 AND p.page_namespace=2';
			} else {

				$conds[] = "( pp_propname IS NULL OR NOT $pagePropsConditions )";

			}

		#
		# mode: notlatestfiles
		#
		} elseif ( $mode == 'notlatestfiles' ) {

			$join_conds['im'][0] = 'JOIN';

			// Name/Title both exist, sha1's don't match OR timestamps
			// don't match
			$conds[] = "(ar.approved_sha1!=im.img_sha1 OR ar.approved_timestamp!=im.img_timestamp)";

		}

		return [
			'tables' => $tables,
			'fields' => $fields,
			'join_conds' => $join_conds,
			'conds' => $conds,
			'options' => [ 'DISTINCT' ],
		];
	}

}
