<?php

/**
 * Main class for the Approved Revs extension.
 *
 * @file
 * @ingroup Extensions
 *
 * @author Yaron Koren
 */
class ApprovedRevs {

	// Static arrays to prevent querying the database more than necessary.
	static $mApprovedContentForPage = array();
	static $mApprovedRevIDForPage = array();
	static $mApproverForPage = array();

	/**
	 * Array in form $mUserCanApprove["<user id>:<article id>"] = <bool>
	 * @var array
	 */
	static $mUserCanApprove = array();
	static $mApprovedFileInfo = array();

	static $mApprovedRevsNamespaces;

	/**
	 * Get array of approvable namespaces. Handles backwards compatibility.
	 */
	public static function getApprovableNamespaces () {
		global $egApprovedRevsNamespaces, $egApprovedRevsEnabledNamespaces;

		if ( is_array( self::$mApprovedRevsNamespaces ) ) {
			return self::$mApprovedRevsNamespaces;
		}

		self::$mApprovedRevsNamespaces = array();

		// Definition of $egApprovedRevsNamespaces removed from Approved
		// Revs to handle extension.json method of config settings. Now,
		// if $egApprovedRevsNamespaces is defined, then it must have been
		// defined by the user in LocalSettings.php. Since no good method of
		// providing backwards-compatibility was determined, instead notify user
		// that $egApprovedRevsNamespaces is obsolete.
		if ( isset( $egApprovedRevsNamespaces ) ) {
			throw new MWException( '$egApprovedRevsNamespaces is no longer supported - please use $egApprovedRevsEnabledNamespaces (which has a different format) instead' );
		}

		// since extension.json values have to be strings, convert to int
		// changes [ "0" => true, "10" => false, "14" => true ] to [0, 14]
		self::$mApprovedRevsNamespaces = array_keys( array_filter( $egApprovedRevsEnabledNamespaces ) );

		return self::$mApprovedRevsNamespaces;
	}

	/**
	 * Gets the approved revision User for this page, or null if there isn't
	 * one.
	 */
	public static function getRevApprover( $title ) {
		$pageID = $title->getArticleID();
		if ( !isset( self::$mApproverForPage[$pageID] ) && self::pageIsApprovable( $title ) ) {
			$dbr = wfGetDB( DB_SLAVE );
			$approverID = $dbr->selectField( 'approved_revs', 'approver_id',
				array( 'page_id' => $pageID ) );
			$approver = $approverID ? User::newFromID( $approverID ) : null;
			self::$mApproverForPage[$pageID] = $approver;
		}
		return $approver;
	}

	/**
	 * Gets the approved revision ID for this page, or null if there isn't
	 * one.
	 */
	public static function getApprovedRevID( $title ) {
		if ( $title == null ) {
			return null;
		}

		$pageID = $title->getArticleID();
		if ( array_key_exists( $pageID, self::$mApprovedRevIDForPage ) ) {
			return self::$mApprovedRevIDForPage[$pageID];
		}

		if ( ! self::pageIsApprovable( $title ) ) {
			return null;
		}

		$dbr = wfGetDB( DB_SLAVE );
		$revID = $dbr->selectField( 'approved_revs', 'rev_id', array( 'page_id' => $pageID ) );
		self::$mApprovedRevIDForPage[$pageID] = $revID;
		return $revID;
	}

	/**
	 * Returns whether or not this page has a revision ID.
	 */
	public static function hasApprovedRevision( $title ) {
		$revision_id = self::getApprovedRevID( $title );
		return ( ! empty( $revision_id ) );
	}

	/**
	 * Returns the contents of the specified wiki page, at either the
	 * specified revision (if there is one) or the latest revision
	 * (otherwise).
	 */
	public static function getPageText( $title, $revisionID = null ) {
		$revision = Revision::newFromTitle( $title, $revisionID );
		return $revision->getContent()->getNativeData();
	}

	/**
	 * Returns the content of the approved revision of this page, or null
	 * if there isn't one.
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

		$content = Revision::newFromTitle( $title, $revisionID )->getContent();
		self::$mApprovedContentForPage[$pageID] = $content;

		return $content;
	}

	/**
	 * Helper function - returns whether the user is currently requesting
	 * a page via the simple URL for it - not specfying a version number,
	 * not editing the page, etc.
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
	 * Returns whether this page can be approved - either because it's in
	 * a supported namespace, or because it's been specially marked as
	 * approvable. Also stores the boolean answer as a field in the page
	 * object, to speed up processing if it's called more than once.
	 */
	public static function pageIsApprovable( Title $title ) {
		// If this function was already called for this page, the value
		// should have been stored as a field in the $title object.
		if ( isset( $title->isApprovable ) ) {
			return $title->isApprovable;
		}

		if ( !$title->exists() ) {
			$title->isApprovable = false;
			return $title->isApprovable;
		}

		// File *pages* are not ever approvable. Files themselves can be, but
		// checks for file approvability is handled by fileIsApprovable(). This
		// constraint is to avoid confusion between approving file pages and
		// approving files themselves.
		if ( $title->getNamespace() === NS_FILE ) {
			$title->isApprovable = false;
			return $title->isApprovable;
		}

		// Allow custom setting of whether the page is approvable.
		if ( !Hooks::run( 'ApprovedRevsPageIsApprovable', array( $title, &$isApprovable ) ) ) {
			$title->isApprovable = $isApprovable;
			return $title->isApprovable;
		}

		// Check the namespace.
		if ( in_array( $title->getNamespace(), self::getApprovableNamespaces() ) ) {
			$title->isApprovable = true;
			return $title->isApprovable;
		}

		// It's not in an included namespace, so check for the page
		// properties for the parser functions - for some reason, calling the standard
		// getProperty() function doesn't work, so we just do a DB
		// query on the page_props table.
		$dbr = wfGetDB( DB_SLAVE );
		$res = $dbr->select( 'page_props', 'COUNT(*)',
			array(
				'pp_page' => $title->getArticleID(),
				'pp_propname' => array(
					'approvedrevs-approver-users', 'approvedrevs-approver-groups'
				),
			)
		);
		$row = $dbr->fetchRow( $res );
		if ( intval( $row[0] ) > 0 ) {
			$title->isApprovable = true;
			return $title->isApprovable;
		}

		// parser function page properties not present. Check for magic word.
		$res = $dbr->select( 'page_props', 'COUNT(*)',
			array(
				'pp_page' => $title->getArticleID(),
				'pp_propname' => 'approvedrevs',
				'pp_value' => 'y'
			)
		);
		$row = $dbr->fetchRow( $res );
		$isApprovable = ( $row[0] == '1' );
		$title->isApprovable = $isApprovable;
		return $isApprovable;
	}

	public static function fileIsApprovable ( Title $title ) {

		// If this function was already called for this page, the value
		// should have been stored as a field in the $title object.
		if ( isset( $title->fileIsApprovable ) ) {
			return $title->fileIsApprovable;
		}

		if ( !$title->exists() ) {
			$title->fileIsApprovable = false;
			return false;
		}


		// Allow custom setting of whether the page is approvable.
		if ( !Hooks::run( 'ApprovedRevsFileIsApprovable', array( $title, &$fileIsApprovable ) ) ) {
			$title->fileIsApprovable = $fileIsApprovable;
			return $title->fileIsApprovable;
		}

		// Check if NS_FILE is in approvable namespaces
		$approvedRevsNamespaces = ApprovedRevs::getApprovableNamespaces();
		if ( in_array( NS_FILE, $approvedRevsNamespaces ) ) {
			$title->fileIsApprovable = true;
			return true;
		}

		// It's not in an included namespace, so check for the page
		// properties for the parser functions - for some reason, calling the standard
		// getProperty() function doesn't work, so we just do a DB
		// query on the page_props table.
		//
		// NOTE: Checks for these propnames won't do anything until [1] is merged, but also will
		//       not hurt anything.
		//       [1] https://gerrit.wikimedia.org/r/#/c/mediawiki/extensions/ApprovedRevs/+/429368/
		$dbr = wfGetDB( DB_SLAVE );
		$res = $dbr->select( 'page_props', 'COUNT(*)',
			array(
				'pp_page' => $title->getArticleID(),
				'pp_propname' => array(
					'approvedrevs-approver-users',
					'approvedrevs-approver-groups'
				),
			)
		);
		$row = $dbr->fetchRow( $res );
		if ( intval( $row[0] ) > 0 ) {
			$title->fileIsApprovable = true;
			return true;
		}

		// parser function page properties not present. Check for magic word.
		$res = $dbr->select( 'page_props', 'COUNT(*)',
			array(
				'pp_page' => $title->getArticleID(),
				'pp_propname' => 'approvedrevs',
				'pp_value' => 'y'
			)
		);
		$row = $dbr->fetchRow( $res );
		if ( $row[0] == '1' ) {
			$title->fileIsApprovable = true;
			return true;
		}

		// if a file already has an approval, it must be considered approvable
		// in order for the user to be able to view/modify approvals. Though
		// this wasn't the case on versions of ApprovedRevs before v1.0, it is
		// necessary now since approvability can change much more easily

		// if title in approved_revs_files table
		list( $timestamp, $sha1 ) = self::getApprovedFileInfo( $title );
		if ( $timestamp !== false ) {
			// only approvable because it already has an approved rev, not
			// because it is in ApprovedRevs::$permissions
			$title->fileIsApprovable = true;
			return true;
		}

		$title->fileIsApprovable = false;
		return false;

	}

	public static function checkPermission( User $user, Title $title, $permission ) {
		return ( $title->userCan( $permission, $user ) || $user->isAllowed( $permission ) );
	}

	public static function userCanApprove( User $user, Title $title ) {
		global $egApprovedRevsSelfOwnedNamespaces;
		$permission = 'approverevisions';

		$userAndPageKey = $user->getId() . ':' . $title->getArticleID();

		// set to null to avoid notices below
		if ( ! isset( self::$mUserCanApprove[$userAndPageKey] ) ) {
			self::$mUserCanApprove[$userAndPageKey] = null;
		}

		// $mUserCanApprove is a static variable used for
		// "caching" the result of this function, so that
		// it only has to be called once per user/page combination
		if ( self::$mUserCanApprove[$userAndPageKey] ) {
			return true;
		} elseif ( self::$mUserCanApprove[$userAndPageKey] === false ) {
			return false;
		} elseif ( ApprovedRevs::checkPermission( $user, $title, $permission ) ) {
			self::$mUserCanApprove[$userAndPageKey] = true;
			return true;
		} elseif ( ApprovedRevs::checkParserFunctionPermission( $user, $title ) ) {
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
					$dbr = wfGetDB( DB_SLAVE );
					$row = $dbr->selectRow(
						array( 'r' => 'revision', 'p' => 'page' ),
						'r.rev_user_text',
						array( 'p.page_title' => $title->getDBkey() ),
						null,
						array( 'ORDER BY' => 'r.rev_id ASC' ),
						array( 'revision' => array( 'JOIN', 'r.rev_page = p.page_id' ) )
					);
					if ( $row->rev_user_text == $user->getName() ) {
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
	 * Check if a user is allowed to approve a page based upon being listed in
	 * the page properties approvedrevs-approver-users and
	 * approvedrevs-approver-groups
	 *
	 * @param User $user Check if this user has #approvable_by permissions on title
	 * @param Title $title Title to check
	 * @return bool Whether or not approving revisions is allowed
	 * @since 1.0
	 */
	public static function checkParserFunctionPermission( User $user, Title $title ) {

		$articleID = $title->getArticleID();

		$dbr = wfGetDB( DB_SLAVE );

		// First check:
		// Users

		$result = $dbr->selectField(
			'page_props',
			'pp_value',
			array(
				'pp_page' => $articleID,
				'pp_propname' => "approvedrevs-approver-users"
			),
			__METHOD__
		);
		if ( $result !== false ) {
			// if user listed as an approver, allow approval
			$approverUsers = array_map( 'User::getCanonicalName', explode( ',', $result ) );
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

			// intersect groups that can approve with user's group
			$userGroupsWithApprove = array_intersect(
				explode( ',', $result ), $user->getGroups()
			);

			// if user has any groups in list of approver groups, allow approval
			if ( count( $userGroupsWithApprove ) > 0 ) {
				return true;
			}
		}

		// neither group nor username allowed approval...disallow
		return false;
	}

	public static function saveApprovedRevIDInDB( $title, $rev_id, $isAutoApprove = true ) {
		global $wgUser;
		$userBit = array();

		if ( !$isAutoApprove ) {
			$userBit = array( 'approver_id' => $wgUser->getID() );
		}

		$dbr = wfGetDB( DB_MASTER );
		$page_id = $title->getArticleID();
		$old_rev_id = $dbr->selectField( 'approved_revs', 'rev_id', array( 'page_id' => $page_id ) );
		if ( $old_rev_id ) {
			$dbr->update( 'approved_revs',
				array_merge( array( 'rev_id' => $rev_id ), $userBit ),
				array( 'page_id' => $page_id ) );
		} else {
			$dbr->insert( 'approved_revs',
				array_merge( array( 'page_id' => $page_id, 'rev_id' => $rev_id ), $userBit ) );
		}
		// Update "cache" in memory
		self::$mApprovedRevIDForPage[$page_id] = $rev_id;
		self::$mApproverForPage[$page_id] = $wgUser;
	}

	static function setPageSearchText( $title, $text ) {
		DeferredUpdates::addUpdate( new SearchUpdate( $title->getArticleID(), $title->getText(), $text ) );
	}

	/**
	 * Sets a certain revision as the approved one for this page in the
	 * approved_revs DB table; calls a "links update" on this revision
	 * so that category information can be stored correctly, as well as
	 * info for extensions such as Semantic MediaWiki; and logs the action.
	 */
	public static function setApprovedRevID( $title, $rev_id, $is_latest = false ) {
		self::saveApprovedRevIDInDB( $title, $rev_id, false );

		$content = Revision::newFromTitle( $title, $rev_id )->getContent();
		$output = null;

		// If the revision being approved is definitely the latest
		// one, there's no need to call the parser on it.
		if ( !$is_latest ) {
			$output = $content->getParserOutput( $title, $rev_id, new ParserOptions() );
			$u = new LinksUpdate( $title, $output );
			$u->doUpdate();
			self::setPageSearchText( $title, $output->getText() );
		}

		$log = new LogPage( 'approval' );
		$rev_url = $title->getFullURL( array( 'oldid' => $rev_id ) );
		$rev_link = Xml::element(
			'a',
			array( 'href' => $rev_url ),
			$rev_id
		);
		$logParams = array( $rev_link );
		$log->addEntry(
			'approve',
			$title,
			'',
			$logParams
		);

		Hooks::run( 'ApprovedRevsRevisionApproved', array( $output, $title, $rev_id, $content ) );
	}

	public static function deleteRevisionApproval( $title ) {
		$dbr = wfGetDB( DB_MASTER );
		$page_id = $title->getArticleID();
		$dbr->delete( 'approved_revs', array( 'page_id' => $page_id ) );
	}

	/**
	 * Unsets the approved revision for this page in the approved_revs DB
	 * table; calls a "links update" on this page so that category
	 * information can be stored correctly, as well as info for
	 * extensions such as Semantic MediaWiki; and logs the action.
	 */
	public static function unsetApproval( $title ) {
		global $egApprovedRevsBlankIfUnapproved;

		self::deleteRevisionApproval( $title );

		$revision = Revision::newFromTitle( $title );
		$content = $egApprovedRevsBlankIfUnapproved ? $revision->getContentHandler()->makeEmptyContent() : $revision->getContent();
		$output = $content->getParserOutput( $title, null, new ParserOptions() );
		$u = new LinksUpdate( $title, $output );
		$u->doUpdate();
		self::setPageSearchText( $title, $output->getText() );

		$log = new LogPage( 'approval' );
		$log->addEntry(
			'unapprove',
			$title,
			''
		);

		Hooks::run( 'ApprovedRevsRevisionUnapproved', array( $output, $title, $content ) );
	}

	public static function addCSS() {
		global $wgOut;
		$wgOut->addModuleStyles( 'ext.ApprovedRevs' );
	}

	/**
	 * Helper function for backward compatibility.
	 */
	public static function makeLink( $linkRenderer, $title, $msg = null, $attrs = array(), $params = array() ) {
		if ( !is_null( $linkRenderer ) ) {
			// MW 1.28+
			return $linkRenderer->makeLink( $title, $msg, $attrs, $params );
		} else {
			return Linker::linkKnown( $title, $msg, $attrs, $params );
		}
	}

	public static function setApprovedFileInDB ( $title, $timestamp, $sha1 ) {

		$parser = new Parser();
		$parser->setTitle( $title );

		$dbr = wfGetDB( DB_MASTER );
		$fileTitle = $title->getDBkey();
		$oldFileTitle = $dbr->selectField(
			'approved_revs_files', 'file_title',
			array( 'file_title' => $fileTitle )
		);
		if ( $oldFileTitle ) {
			$dbr->update( 'approved_revs_files',
				array(
					'approved_timestamp' => $timestamp,
					'approved_sha1' => $sha1
				), // update fields
				array( 'file_title' => $fileTitle )
			);
		} else {
			$dbr->insert( 'approved_revs_files',
				array(
					'file_title' => $fileTitle,
					'approved_timestamp' => $timestamp,
					'approved_sha1' => $sha1
				)
			);
		}
		// Update "cache" in memory
		self::$mApprovedFileInfo[$fileTitle] = array( $timestamp, $sha1 );

		$log = new LogPage( 'approval' );

		$imagepage = ImagePage::newFromID( $title->getArticleID() );
		$displayedFileUrl = $imagepage->getDisplayedFile()->getFullURL();

		$revisionAnchorTag = Xml::element(
			'a',
			array(
				'href' => $displayedFileUrl,
				'title' => 'unique identifier: ' . $sha1
			),
			// There's no simple "revision ID" for file uploads. Instead
			// uniqueness is determined by sha1, but dumping out the sha1 here
			// would be ugly. Instead show a timestamp of the file upload.
			wfTimestamp( TS_RFC2822, $timestamp )
		);
		$logParams = array( $revisionAnchorTag );
		$log->addEntry(
			'approvefile',
			$title,
			'',
			$logParams
		);

		Hooks::run(
			'ApprovedRevsFileRevisionApproved',
			array( $parser, $title, $timestamp, $sha1 )
		);

	}

	public static function unsetApprovedFileInDB ( $title ) {

		$parser = new Parser();
		$parser->setTitle( $title );

		$fileTitle = $title->getDBkey();

		$dbr = wfGetDB( DB_MASTER );
		$dbr->delete( 'approved_revs_files',
			array( 'file_title' => $fileTitle )
		);
		// the unapprove page method had LinksUpdate and Parser
		// objects here, but the page text has not changed at all with
		// a file approval, so I don't think those are necessary.

		$log = new LogPage( 'approval' );
		$log->addEntry(
			'unapprove',
			$title,
			''
		);

		Hooks::run(
			'ApprovedRevsFileRevisionUnapproved', array( $parser, $title )
		);

	}

	/**
	 *  Pulls from DB table approved_revs_files which revision of a
	 *  file, if any besides most recent, should be used as the
	 *  approved revision.
	 **/
	public static function getApprovedFileInfo ( $fileTitle ) {

		if ( isset( self::$mApprovedFileInfo[ $fileTitle->getDBkey() ] ) ) {
			return self::$mApprovedFileInfo[ $fileTitle->getDBkey() ];
		}

		$dbr = wfGetDB( DB_SLAVE );
		$row = $dbr->selectRow(
			'approved_revs_files', // select from table
			array( 'approved_timestamp', 'approved_sha1' ),
			array( 'file_title' => $fileTitle->getDBkey() )
		);
		if ( $row ) {
			$return = array( $row->approved_timestamp, $row->approved_sha1 );
		}
		else {
			$return = array( false, false );
		}

		self::$mApprovedFileInfo[ $fileTitle->getDBkey() ] = $return;
		return $return;

	}

	/**
	 * (non-PHPdoc)
	 * @see QueryPage::getSQL()
	 */
	static public function getQueryInfoPageApprovals( $mode ) {
		$approvedRevsNamespaces = ApprovedRevs::getApprovableNamespaces();

		$mainCondsString = "( pp_propname = 'approvedrevs' AND pp_value = 'y' " .
			"OR pp_propname = 'approvedrevs-approver-users' " .
			"OR pp_propname = 'approvedrevs-approver-groups' )";
		if ( $mode == 'invalid' ) {
			$mainCondsString = "( pp_propname IS NULL OR NOT $mainCondsString )";
		}
		if ( count( $approvedRevsNamespaces ) > 0 ) {
			if ( $mode == 'invalid' ) {
				$mainCondsString .= " AND ( p.page_namespace NOT IN ( " . implode( ',', $approvedRevsNamespaces ) . " ) )";
			} else {
				$mainCondsString .= " OR ( p.page_namespace IN ( " . implode( ',', $approvedRevsNamespaces ) . " ) )";
			}
		}

		if ( $mode == 'all' ) {
			return array(
				'tables' => array(
					'ar' => 'approved_revs',
					'p' => 'page',
					'pp' => 'page_props',
				),
				'fields' => array(
					'p.page_id AS id',
					'ar.rev_id AS rev_id',
					'p.page_latest AS latest_id',
				),
				'join_conds' => array(
					'p' => array(
						'JOIN', 'ar.page_id=p.page_id'
					),
					'pp' => array(
						'LEFT OUTER JOIN', 'ar.page_id=pp_page'
					),
				),
				'conds' => $mainCondsString,
				'options' => array( 'DISTINCT' )
			);
		} elseif ( $mode == 'unapproved' ) {
			return array(
				'tables' => array(
					'ar' => 'approved_revs',
					'p' => 'page',
					'pp' => 'page_props',
				),
				'fields' => array(
					'p.page_id AS id',
					'p.page_latest AS latest_id'
				),
				'join_conds' => array(
					'ar' => array(
						'LEFT OUTER JOIN', 'p.page_id=ar.page_id'
					),
					'pp' => array(
						'LEFT OUTER JOIN', 'ar.page_id=pp_page'
					),
				),
				'conds' => "ar.page_id IS NULL AND ( $mainCondsString )",
				'options' => array( 'DISTINCT' )
			);
		} elseif ( $mode == 'invalid' ) {
			return array(
				'tables' => array(
					'ar' => 'approved_revs',
					'p' => 'page',
					'pp' => 'page_props',
				),
				'fields' => array(
					'p.page_id AS id',
					'p.page_latest AS latest_id'
				),
				'join_conds' => array(
					'p' => array(
						'LEFT OUTER JOIN', 'p.page_id=ar.page_id'
					),
					'pp' => array(
						'LEFT OUTER JOIN', 'ar.page_id=pp_page'
					),
				),
				'conds' => $mainCondsString,
				'options' => array( 'DISTINCT' )
			);
		} else { // 'approved revision is not latest'
			return array(
				'tables' => array(
					'ar' => 'approved_revs',
					'p' => 'page',
					'pp' => 'page_props',
				),
				'fields' => array(
					'p.page_id AS id',
					'ar.rev_id AS rev_id',
					'p.page_latest AS latest_id',
				),
				'join_conds' => array(
					'p' => array(
						'JOIN', 'ar.page_id=p.page_id'
					),
					'pp' => array(
						'LEFT OUTER JOIN', 'ar.page_id=pp_page'
					),
				),
				'conds' => "p.page_latest != ar.rev_id AND ( $mainCondsString )",
				'options' => array( 'DISTINCT' )
			);
		}
	}

	/**
	 * (non-PHPdoc)
	 * @see QueryPage::getSQL()
	 */
	static public function getQueryInfoFileApprovals( $mode ) {

		$tables = array(
			'ar' => 'approved_revs_files',
			'im' => 'image',
			'p' => 'page',
		);

		$fields = array(
			'im.img_name AS title',
			'ar.approved_sha1 AS approved_sha1',
			'ar.approved_timestamp AS approved_ts',
			'im.img_sha1 AS latest_sha1',
			'im.img_timestamp AS latest_ts',
		);

		$conds = array( 'p.page_namespace' => NS_FILE );

		$join_conds = array(
			'im' => array( null, 'ar.file_title=im.img_name' ),
			'p'  => array( 'JOIN' , 'im.img_name=p.page_title' ),
		);

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
			$join_conds['pp'] = array( 'LEFT OUTER JOIN', 'p.page_id=pp_page' );

			$approvedRevsNamespaces = ApprovedRevs::getApprovableNamespaces();

			// if all files are not approvable then need to find files matching
			// __APPROVEDREVS__ and {{#approvable_by: ... }} permissions
			if ( ! in_array( NS_FILE, $approvedRevsNamespaces ) ) {
				$conds[] = $pagePropsConditions;
			}

			$conds['ar.file_title'] = null;

		#
		# mode: invalidfiles
		#
		} elseif ( $mode == 'invalidfiles' ) {

			$join_conds['im'][0] = 'LEFT OUTER JOIN';

			$tables['pp'] = 'page_props';
			$join_conds['pp'] = array( 'LEFT OUTER JOIN', 'p.page_id=pp_page' );

			$approvedRevsNamespaces = ApprovedRevs::getApprovableNamespaces();

			if ( in_array( NS_FILE, $approvedRevsNamespaces ) ) {

				// if all files are approvable, no files should have invalid
				// approvals. Below is an impossible condition that prevents any
				// results from being returned.
				$conds[] = 'p.page_namespace=1 AND p.page_namespace=2';
			}
			else {

				$conds[] = "( pp_propname IS NULL OR NOT $pagePropsConditions )";;

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

		return array(
			'tables' => $tables,
			'fields' => $fields,
			'join_conds' => $join_conds,
			'conds' => $conds,
			'options' => array( 'DISTINCT' ),
		);

	}

}
