<?php

use MediaWiki\MediaWikiServices;

/**
 * Functions for the Approved Revs extension called by hooks in the MediaWiki
 * code.
 *
 * @file
 * @ingroup Extensions
 *
 * @author Yaron Koren
 * @author Jeroen De Dauw
 */
class ApprovedRevsHooks {

	static $mNoSaveOccurring = false;

	static public function userRevsApprovedAutomatically( User $user, Title $title ) {
		global $egApprovedRevsAutomaticApprovals;
		return ( ApprovedRevs::userCanApprove( $user, $title ) && $egApprovedRevsAutomaticApprovals );
	}

	/**
	 * "noindex" and "nofollow" meta-tags are added to every revision page,
	 * so that search engines won't index them - remove those if this is
	 * the approved revision.
	 * There doesn't seem to be an ideal MediaWiki hook to use for this
	 * function - it currently uses 'PersonalUrls', which works.
	 */
	static public function removeRobotsTag( &$personal_urls, &$title ) {
		global $wgRequest;

		if ( ! ApprovedRevs::isDefaultPageRequest( $wgRequest ) ) {
			return true;
		}

		$revisionID = ApprovedRevs::getApprovedRevID( $title );
		if ( ! empty( $revisionID ) ) {
			global $wgOut;
			$wgOut->setRobotPolicy( 'index,follow' );
		}
		return true;
	}

	/**
	 * Hook: ArticleEditUpdates
	 *
	 * Call LinksUpdate on the text of this page's approved revision,
	 * if there is one.
	 */
	static public function updateLinksAfterEdit( WikiPage &$wikiPage, &$editInfo, $changed ) {
		$title = $wikiPage->getTitle();
		if ( ! ApprovedRevs::pageIsApprovable( $title ) ) {
			return true;
		}
		// If this user's revisions get approved automatically, exit
		// now, because this will be the approved revision anyway.
		$userID = $wikiPage->getUser();
		$user = User::newFromId( $userID );
		if ( self::userRevsApprovedAutomatically( $user, $title ) ) {
			return true;
		}
		$text = '';
		$approvedText = ApprovedRevs::getApprovedContent( $title );
		if ( !is_null( $approvedText ) ) {
			$text = $approvedText;
		}
		// If there's no approved revision, and 'blank if
		// unapproved' is set to true, set the text to blank.
		if ( is_null( $approvedText ) ) {
			global $egApprovedRevsBlankIfUnapproved;
			if ( $egApprovedRevsBlankIfUnapproved ) {
				$text = '';
			} else {
				// If it's an unapproved page and there's no
				// page blanking, exit here.
				return true;
			}
		}

		$editInfo = $wikiPage->prepareContentForEdit( new WikitextContent( $text ) );
		$u = new LinksUpdate( $wikiPage->mTitle, $editInfo->output );
		$u->doUpdate();

		return true;
	}

	/**
	 * Hook: PageContentSaveComplete
	 *
	 * If the user saving this page has approval power, and automatic
	 * approvals are enabled, and the page is approvable, and either
	 * (a) this page already has an approved revision, or (b) unapproved
	 * pages are shown as blank on this wiki, automatically set this
	 * latest revision to be the approved one - don't bother logging
	 * the approval, though; the log is reserved for manual approvals.
	 */
	static public function setLatestAsApproved( WikiPage $wikipage, $user, $content,
		$summary, $isMinor, $isWatch, $section, $flags, $revision,
		$status, $baseRevId ) {

		if ( is_null( $revision ) ) {
			return true;
		}

		$title = $wikipage->getTitle();
		if ( ! self::userRevsApprovedAutomatically( $user, $title ) ) {
			return true;
		}

		if ( !ApprovedRevs::pageIsApprovable( $title ) ) {
			return true;
		}

		global $egApprovedRevsBlankIfUnapproved;
		if ( !$egApprovedRevsBlankIfUnapproved ) {
			$approvedRevID = ApprovedRevs::getApprovedRevID( $title );
			if ( empty( $approvedRevID ) ) {
				return true;
			}
		}

		// Save approval without logging.
		ApprovedRevs::saveApprovedRevIDInDB( $title, $revision->getID(), true );
		return true;
	}

	/**
	 * PageContentSaveComplete hook handler
	 *
	 * Set the text that's stored for the page for standard searches.
	 */
	static public function setSearchText( WikiPage $wikiPage, $user, $content,
		$summary, $isMinor, $isWatch, $section, $flags, $revision,
		$status, $baseRevId ) {

		if ( is_null( $revision ) ) {
			return true;
		}

		$title = $wikiPage->getTitle();
		if ( !ApprovedRevs::pageIsApprovable( $title ) ) {
			return true;
		}

		$revisionID = ApprovedRevs::getApprovedRevID( $title );
		if ( is_null( $revisionID ) ) {
			return true;
		}

		// We only need to modify the search text if the approved
		// revision is not the latest one.
		if ( $revisionID != $wikiPage->getLatest() ) {
			$approvedPage = WikiPage::factory( $title );
			$approvedText = $approvedPage->getContent()->getNativeData();
			ApprovedRevs::setPageSearchText( $title, $approvedText );
		}

		return true;
	}

	/**
	 * Sets the correct page revision to display the "text snippet" for
	 * a search result.
	 */
	public static function setSearchRevisionID( $title, &$id ) {
		$revisionID = ApprovedRevs::getApprovedRevID( $title );
		if ( !is_null( $revisionID ) ) {
			$id = $revisionID;
		}
		return true;
	}

	/**
	 * Return the approved revision of the page, if there is one, and if
	 * the page is simply being viewed, and if no specific revision has
	 * been requested.
	 */
	static function showApprovedRevision( &$title, &$article, $context ) {
		$request = $context->getRequest();

		if ( ! ApprovedRevs::isDefaultPageRequest( $request ) ) {
			return true;
		}

		if ( ! ApprovedRevs::pageIsApprovable( $title ) ) {
			return true;
		}

		global $egApprovedRevsBlankIfUnapproved;
		$revisionID = ApprovedRevs::getApprovedRevID( $title );

		// Starting in around MW 1.24, blanking of unapproved pages
		// seems to no longer work unless code like this is called -
		// possibly because the cache needs to be disabled. There
		// may be a better way to accomplish that than this, but this
		// works, and it doesn't seem to have a noticeable negative
		// impact, so we'll go with it for now, at least.
		if ( ! empty( $revisionID ) || $egApprovedRevsBlankIfUnapproved ) {
			$article = new Article( $title, $revisionID );
			// This call is necessary because it
			// causes $article->mRevision to get initialized,
			// which in turn allows "edit section" links to show
			// up if the approved revision is also the latest.
			$article->getRevisionFetched();
		}
		return true;
	}

	/**
	 * Hook: ArticleAfterFetchContentObject
	 *
	 * @param Article $article
	 * @param Content $content
	 * @return true
	 */
	public static function showBlankIfUnapproved( &$article, Content &$content ) {
		global $egApprovedRevsBlankIfUnapproved;
		if ( ! $egApprovedRevsBlankIfUnapproved ) {
			return true;
		}

		$title = $article->getTitle();
		if ( ! ApprovedRevs::pageIsApprovable( $title ) ) {
			return true;
		}

		$revisionID = ApprovedRevs::getApprovedRevID( $title );
		if ( !empty( $revisionID ) ) {
			return true;
		}

		// Disable the cache for every page, if users aren't meant
		// to see pages with no approved revision, and this page
		// has no approved revision. This looks extreme - but
		// there doesn't seem to be any other way to distinguish
		// between a user looking at the main view of page, and a
		// user specifically looking at the latest revision of the
		// page (which we don't want to show as blank).
		global $wgEnableParserCache;
		$wgEnableParserCache = false;

		$context = $article->getContext();
		$request = $context->getRequest();
		if ( ! ApprovedRevs::isDefaultPageRequest( $request ) ) {
			return true;
		}

		ApprovedRevs::addCSS();

		// Set the content to blank.
		if( $content instanceof TextContent ) {
			$contentClass = get_class( $content );
			$content = new $contentClass( '' );
		} else {
			$content = '';
		}

		return true;
	}

	/**
	 * Sets the subtitle when viewing old revisions of a page.
	 * This function's code is mostly copied from Article::setOldSubtitle(),
	 * and it is meant to serve as a replacement for that function, using
	 * the 'DisplayOldSubtitle' hook.
	 * This display has the following differences from the standard one:
	 * - It includes a link to the approved revision, which goes to the
	 * default page.
	 * - It includes a "diff" link alongside it.
	 * - The "Latest revision" link points to the correct revision ID,
	 * instead of to the default page (unless the latest revision is also
	 * the approved one).
	 *
	 * @author Eli Handel
	 */
	static function setOldSubtitle( $article, $revisionID ) {
		$title = $article->getTitle(); # Added for ApprovedRevs - and removed hook
		$context = $article->getContext();

		$unhide = $context->getRequest()->getInt( 'unhide' ) == 1;

		// Cascade unhide param in links for easy deletion browsing.
		$extraParams = array();
		if ( $unhide ) {
			$extraParams['unhide'] = 1;
		}

		if ( $article->mRevision && $article->mRevision->getId() === $revisionID ) {
			$revision = $article->mRevision;
		} else {
			$revision = Revision::newFromId( $revisionID );
		}

		$timestamp = $revision->getTimestamp();

		$latestID = $article->getLatest(); // Modified for Approved Revs
		$current = ( $revisionID == $latestID );
		$approvedID = ApprovedRevs::getApprovedRevID( $title );
		$language = $context->getLanguage();
		$user = $context->getUser();

		$td = $language->userTimeAndDate( $timestamp, $user );
		$tddate = $language->userDate( $timestamp, $user );
		$tdtime = $language->userTime( $timestamp, $user );

		// Show the user links if they're allowed to see them.
		// If hidden, then show them only if requested...
		$userlinks = Linker::revUserTools( $revision, !$unhide );

		$infomsg = $current && !wfMessage( 'revision-info-current' )->isDisabled()
			? 'revision-info-current'
			: 'revision-info';

		$outputPage = $context->getOutput();
		$revisionInfo = "<div id=\"mw-{$infomsg}\">" .
			$context->msg( $infomsg, $td )
				->rawParams( $userlinks )
				->params( $revision->getId(), $tddate, $tdtime, $revision->getUserText() )
				->rawParams( Linker::revComment( $revision, true, true ) )
				->parse() .
			"</div>";
		$outputPage->addSubtitle( $revisionInfo );

		// Created for Approved Revs
		$latestLinkParams = array();
		if ( $latestID != $approvedID ) {
			$latestLinkParams['oldid'] = $latestID;
		}
		if ( function_exists( 'MediaWiki\MediaWikiServices::getLinkRenderer' ) ) {
			$linkRenderer = MediaWikiServices::getInstance()->getLinkRenderer();
		} else {
			$linkRenderer = null;
		}
		$lnk = $current
			? wfMessage( 'currentrevisionlink' )->escaped()
			: ApprovedRevs::makeLink(
				$linkRenderer,
				$title,
				wfMessage( 'currentrevisionlink' )->text(),
				array(),
				$latestLinkParams + $extraParams
			);
		$curdiff = $current
			? wfMessage( 'diff' )->escaped()
			: ApprovedRevs::makeLink(
				$linkRenderer,
				$title,
				wfMessage( 'diff' )->text(),
				array(),
				array(
					'diff' => 'cur',
					'oldid' => $revisionID
				) + $extraParams
			);
		$prev = $title->getPreviousRevisionID( $revisionID );
		$prevlink = $prev
			? ApprovedRevs::makeLink(
				$linkRenderer,
				$title,
				wfMessage( 'previousrevision' )->text(),
				array(),
				array(
					'direction' => 'prev',
					'oldid' => $revisionID
				) + $extraParams
			)
			: wfMessage( 'previousrevision' )->escaped();
		$prevdiff = $prev
			? ApprovedRevs::makeLink(
				$linkRenderer,
				$title,
				wfMessage( 'diff' )->text(),
				array(),
				array(
					'diff' => 'prev',
					'oldid' => $revisionID
				) + $extraParams
			)
			: wfMessage( 'diff' )->escaped();
		$nextlink = $current
			? wfMessage( 'nextrevision' )->escaped()
			: ApprovedRevs::makeLink(
				$linkRenderer,
				$title,
				wfMessage( 'nextrevision' )->text(),
				array(),
				array(
					'direction' => 'next',
					'oldid' => $revisionID
				) + $extraParams
			);
		$nextdiff = $current
			? wfMessage( 'diff' )->escaped()
			: ApprovedRevs::makeLink(
				$linkRenderer,
				$title,
				wfMessage( 'diff' )->text(),
				array(),
				array(
					'diff' => 'next',
					'oldid' => $revisionID
				) + $extraParams
			);

		// Added for Approved Revs
		$approved = ( $approvedID != null && $revisionID == $approvedID );
		$approvedlink = $approved
			? wfMessage( 'approvedrevs-approvedrevision' )->escaped()
			: ApprovedRevs::makeLink(
				$linkRenderer,
				$title,
				wfMessage( 'approvedrevs-approvedrevision' )->text(),
				array(),
				$extraParams
			);
		$approveddiff = $approved
			? wfMessage( 'diff' )->escaped()
			: ApprovedRevs::makeLink(
				$linkRenderer,
				$title,
				wfMessage( 'diff' )->text(),
				array(),
				array(
					'diff' => $approvedID,
					'oldid' => $revisionID
				) + $extraParams
			);

		$cdel = Linker::getRevDeleteLink( $user, $revision, $title );
		if ( $cdel !== '' ) {
			$cdel .= ' ';
		}

		// Modified for Approved Revs
		$outputPage->addSubtitle( "<div id=\"mw-revision-nav\">" . $cdel .
			wfMessage( 'approvedrevs-revision-nav' )->rawParams(
				$prevdiff, $prevlink, $approvedlink, $approveddiff, $lnk, $curdiff, $nextlink, $nextdiff
			)->escaped() . "</div>" );
	}

	/**
	 * If user is viewing the page via its main URL, and what they're
	 * seeing is the approved revision of the page, remove the standard
	 * subtitle shown for all non-latest revisions, and replace it with
	 * either nothing or a message explaining the situation, depending
	 * on the user's rights.
	 */
	static function setSubtitle( &$article, &$revisionID ) {
		$title = $article->getTitle();
		if ( ! ApprovedRevs::hasApprovedRevision( $title ) ) {
			return true;
		}

		$context = $article->getContext();
		$request = $context->getRequest();
		if ( $request->getCheck( 'oldid' ) ) {
			// If the user is looking at the latest revision,
			// disable caching, to avoid the wiki getting the
			// contents from the cache, and thus getting the
			// approved contents instead.
			if ( $revisionID == $article->getLatest() ) {
				global $wgEnableParserCache;
				$wgEnableParserCache = false;
			}
			self::setOldSubtitle( $article, $revisionID );
			// Don't show default Article::setOldSubtitle().
			return false;
		}

		$text = "";
		ApprovedRevs::addCSS();

		$user = $context->getUser();
		if ( ApprovedRevs::checkPermission( $user, $title, "viewlinktolatest" ) ) {
			if ( $revisionID == $article->getLatest() ) {
				$text .= Xml::element(
					'span',
					array( 'class' => 'approvedAndLatestMsg' ),
					wfMessage( 'approvedrevs-approvedandlatest' )->text()
				);
			} else {
				$text .= wfMessage( 'approvedrevs-notlatest' )->parse();

				if ( function_exists( 'MediaWiki\MediaWikiServices::getLinkRenderer' ) ) {
					$linkRenderer = MediaWikiServices::getInstance()->getLinkRenderer();
				} else {
					$linkRenderer = null;
				}
				$text .= ' ' . ApprovedRevs::makeLink(
					$linkRenderer,
					$title,
					wfMessage( 'approvedrevs-viewlatestrev' )->parse(),
					array(),
					array( 'oldid' => $article->getLatest() )
				);

				$text = Xml::tags(
					'span',
					array( 'class' => 'notLatestMsg' ),
					$text
				);
			}
		}

		if ( ApprovedRevs::checkPermission( $user, $title, "viewapprover" ) ) {
			$revisionUser = ApprovedRevs::getRevApprover( $title );
			if ( $revisionUser ) {
				$text .= Xml::openElement( 'span', array( 'class' => 'approvingUser' ) ) .
					wfMessage(
						  'approvedrevs-approver',
						  Linker::userLink( $revisionUser->getId(), $revisionUser->getName() )
					)->text() .
					Xml::closeElement( 'span' );
			}
		}

		if ( $text !== "" ) {
			$out = $context->getOutput();
			if ( $out->getSubtitle() != '' ) {
				$out->addSubtitle( '<br />' . $text );
			} else {
				$out->setSubtitle( $text );
			}
		}

		return false;
	}

	/**
	 * Add a warning to the top of the 'edit' page if the approved
	 * revision is not the same as the latest one, so that users don't
	 * get confused, since they'll be seeing the latest one.
	 */
	public static function addWarningToEditPage( &$editPage ) {
		$article = $editPage->getArticle();
		$context = $article->getContext();
		$request = $context->getRequest();

		// Only show the warning if it's not an old revision.
		if ( $request->getCheck( 'oldid' ) ) {
			return true;
		}

		$title = $article->getTitle();
		$approvedRevID = ApprovedRevs::getApprovedRevID( $title );
		$latestRevID = $title->getLatestRevID();
		if ( ! empty( $approvedRevID ) && $approvedRevID != $latestRevID ) {
			ApprovedRevs::addCSS();
			$out = $context->getOutput();
			$out->wrapWikiMsg( "<p class=\"approvedRevsEditWarning\">$1</p>\n", 'approvedrevs-editwarning' );
		}
		return true;
	}

	/**
	 * Same as addWarningToEditPage(), but for the Page Forms
	 * 'edit with form' tab.
	 */
	public static function addWarningToPFForm( &$title, &$preFormHTML ) {
		$approvedRevID = ApprovedRevs::getApprovedRevID( $title );
		$latestRevID = $title->getLatestRevID();
		if ( ! empty( $approvedRevID ) && $approvedRevID != $latestRevID ) {
			ApprovedRevs::addCSS();
			$preFormHTML .= Xml::element ( 'p',
				array( 'style' => 'font-weight: bold' ),
				wfMessage( 'approvedrevs-editwarning' )->text() ) . "\n";
		}
		return true;
	}

	/**
	 * If user is looking at a revision through a main 'view' URL (no
	 * revision specified), have the 'edit' tab link to the basic
	 * 'action=edit' URL (i.e., the latest revision), no matter which
	 * revision they're actually on.
	 */
	static function changeEditLink( SkinTemplate &$skinTemplate, &$links ) {
		$context = $skinTemplate->getContext();
		$request = $context->getRequest();

		if ( $request->getCheck( 'oldid' ) ) {
			return true;
		}

		$title = $skinTemplate->getTitle();
		if ( ApprovedRevs::hasApprovedRevision( $title ) ) {
			$contentActions = &$links['views'];
			// The URL is the same regardless of whether the tab
			// is 'edit' or 'view source', but the "action" is
			// different.
			if ( array_key_exists( 'edit', $contentActions ) ) {
				$contentActions['edit']['href'] = $title->getLocalUrl( array( 'action' => 'edit' ) );
			}
			if ( array_key_exists( 'viewsource', $contentActions ) ) {
				$contentActions['viewsource']['href'] = $title->getLocalUrl( array( 'action' => 'edit' ) );
			}
		}
		return true;
	}

	/**
	 * Store the approved revision ID, if any, directly in the object
	 * for this article - this is called so that a query to the database
	 * can be made just once for every view of a history page, instead
	 * of for every row.
	 */
	static function storeApprovedRevisionForHistoryPage( &$article ) {
		// This will be null if there's no ID.
		$approvedRevID = ApprovedRevs::getApprovedRevID( $article->getTitle() );
		$article->getTitle()->approvedRevID = $approvedRevID;

		return true;
	}

	/**
	 * If the user is allowed to make revision approvals, add either an
	 * 'approve' or 'unapprove' link to the end of this row in the page
	 * history, depending on whether or not this is already the approved
	 * revision. If it's the approved revision also add on a "star"
	 * icon, regardless of the user.
	 */
	static function addApprovalLink( $historyPage, &$row , &$s ) {
		$title = $historyPage->getTitle();
		if ( ! ApprovedRevs::pageIsApprovable( $title ) ) {
			return true;
		}

		$context = $historyPage->getContext();
		$user = $context->getUser();

		$approvedRevID = $title->approvedRevID;
		if ( $row->rev_id == $approvedRevID ) {
			$s .= ' &#9733;';
		}
		if ( ApprovedRevs::userCanApprove( $user, $title ) ) {
			if ( $row->rev_id == $approvedRevID ) {
				$url = $title->getLocalUrl(
					array( 'action' => 'unapprove' )
				);
				$msg = wfMessage( 'approvedrevs-unapprove' )->text();
			} else {
				$url = $title->getLocalUrl(
					array( 'action' => 'approve', 'oldid' => $row->rev_id )
				);
				$msg = wfMessage( 'approvedrevs-approve' )->text();
			}
			$s .= ' (' . Xml::element(
				'a',
				array( 'href' => $url ),
				$msg
			) . ')';
		}
		return true;
	}

	/**
	 * Use the approved revision, if it exists, for templates and other
	 * transcluded pages.
	 */
	static function setTranscludedPageRev( $parser, $title, &$skip, &$id ) {
		$revisionID = ApprovedRevs::getApprovedRevID( $title );
		if ( ! empty( $revisionID ) ) {
			$id = $revisionID;
		}
		return true;
	}

	/**
	 * Delete the approval record in the database if the page itself is
	 * deleted.
	 */
	static function deleteRevisionApproval( &$article, &$user, $reason, $id ) {
		ApprovedRevs::deleteRevisionApproval( $article->getTitle() );
		return true;
	}

	/**
	 * Register magic-word variable IDs
	 */
	static function addMagicWordVariableIDs( &$magicWordVariableIDs ) {
		$magicWordVariableIDs[] = 'MAG_APPROVEDREVS';
		return true;
	}

	/**
	 * Set values in the page_props table based on the presence of the
	 * 'APPROVEDREVS' magic word in a page
	 */
	static function handleMagicWords( &$parser, &$text ) {
		$mw_hide = MagicWord::get( 'MAG_APPROVEDREVS' );
		if ( $mw_hide->matchAndRemove( $text ) ) {
			$parser->mOutput->setProperty( 'approvedrevs', 'y' );
		}
		return true;
	}

	/**
	 * Add a link to 'Special:ApprovedPages' to the the page
	 * 'Special:AdminLinks', defined by the Admin Links extension.
	 */
	static function addToAdminLinks( &$admin_links_tree ) {
		$general_section = $admin_links_tree->getSection( wfMessage( 'adminlinks_general' )->text() );
		$extensions_row = $general_section->getRow( 'extensions' );
		if ( is_null( $extensions_row ) ) {
			$extensions_row = new ALRow( 'extensions' );
			$general_section->addRow( $extensions_row );
		}
		$extensions_row->addItem( ALItem::newFromSpecialPage( 'ApprovedRevs' ) );
		return true;
	}

	public static function describeDBSchema( $updater = null ) {
		$dir = dirname( __FILE__ );

		// DB updates
		// For now, there's just a single SQL file for all DB types.
		if ( $updater === null ) {
			global $wgExtNewTables, $wgDBtype;
			//if ( $wgDBtype == 'mysql' ) {
				$wgExtNewTables[] = array( 'approved_revs', "$dir/../sql/ApprovedRevs.sql" );
			//}
		} else {
			//if ( $updater->getDB()->getType() == 'mysql' ) {
				$updater->addExtensionUpdate( array( 'addTable', 'approved_revs', "$dir/../sql/ApprovedRevs.sql", true ) );
				$updater->addExtensionUpdate( array( 'addField', 'approved_revs', 'approver_id', "$dir/../sql/patch-approver_id.sql", true ) );
			//}
		}
		return true;
	}

	/**
	 * Display a message to the user if (a) "blank if unapproved" is set,
	 * (b) the page is approvable, (c) the user has 'viewlinktolatest'
	 * permission, and (d) either the page has no approved revision, or
	 * the user is looking at a revision that's not the latest - the
	 * displayed message depends on which of those cases it is.
	 * @TODO - this should probably get split up into two methods.
	 *
	 * @since 0.5.6
	 *
	 * @param Article $article
	 * @param boolean $outputDone
	 * @param boolean $useParserCache
	 *
	 * @return true
	 */
	public static function setArticleHeader( Article $article, &$outputDone, &$useParserCache ) {
		global $egApprovedRevsBlankIfUnapproved;

		// For now, we only set the header if "blank if unapproved"
		// is set.
		if ( ! $egApprovedRevsBlankIfUnapproved ) {
			return true;
		}

		$title = $article->getTitle();
		$context = $article->getContext();
		$user = $context->getUser();
		$out = $context->getOutput();
		$request = $context->getRequest();

		if ( ! ApprovedRevs::pageIsApprovable( $title ) ) {
			return true;
		}

		// If the user isn't supposed to see these kinds of
		// messages, exit.
		if ( ! ApprovedRevs::checkPermission( $user, $title, "viewlinktolatest" ) ) {
			return false;
		}

		// If there's an approved revision for this page, and the
		// user is looking at it - either by simply going to the page,
		// or by looking at the revision that happens to be approved -
		// don't display anything.
		$approvedRevID = ApprovedRevs::getApprovedRevID( $title );
		if ( ! empty( $approvedRevID ) &&
			( ! $request->getCheck( 'oldid' ) ||
			$request->getInt( 'oldid' ) == $approvedRevID ) ) {
			return true;
		}

		// Disable caching, so that if it's a specific ID being shown
		// that happens to be the latest, it doesn't show a blank page.
		$useParserCache = false;
		$out->addHTML( '<span style="margin-left: 10.75px">' );

		// If the user is looking at a specific revision, show an
		// "approve this revision" message - otherwise, it means
		// there's no approved revision (we would have exited out if
		// there were), so show a message explaining why the page is
		// blank, with a link to the latest revision.
		if ( $request->getCheck( 'oldid' ) ) {
			if ( ApprovedRevs::userCanApprove( $user, $title ) ) {
				// @TODO - why is this message being shown
				// at all? Aren't the "approve this revision"
				// links in the history page always good
				// enough?
				$out->addHTML( Xml::tags( 'span', array( 'id' => 'contentSub2' ),
					Xml::element( 'a',
					array( 'href' => $title->getLocalUrl(
						array(
							'action' => 'approve',
							'oldid' => $request->getInt( 'oldid' )
						)
					) ),
					wfMessage( 'approvedrevs-approvethisrev' )->text()
				) ) );
			}
		} else {
			$out->addSubtitle(
				htmlspecialchars( wfMessage( 'approvedrevs-blankpageshown' )->text() ) . '&#160;' .
				Xml::element( 'a',
					array( 'href' => $title->getLocalUrl(
						array(
							'oldid' => $article->getRevIdFetched()
						)
					) ),
					wfMessage( 'approvedrevs-viewlatestrev' )->text()
				)
			);
		}

		$out->addHTML( '</span>' );

		return true;
	}

	/**
	 * If this page is approvable, but has no approved revision, display
	 * a header message stating that, if the setting to display this
	 * message is activated.
	 */
	public static function displayNotApprovedHeader( Article $article, &$outputDone, &$useParserCache ) {
		global $egApprovedRevsShowNotApprovedMessage;
		if ( !$egApprovedRevsShowNotApprovedMessage ) {
			return true;
		}

		$title = $article->getTitle();
		if ( ! ApprovedRevs::pageIsApprovable( $title ) ) {
			return true;
		}
		if ( ApprovedRevs::hasApprovedRevision( $title ) ) {
			return true;
		}

		$text = wfMessage( 'approvedrevs-noapprovedrevision' )->text();

		$context = $article->getContext();
		$out = $context->getOutput();
		if ( $out->getSubtitle() != '' ) {
			$out->addSubtitle( '<br />' . $text );
		} else {
			$out->setSubtitle( $text );
		}

		return true;
	}

	/**
	 * Add a class to the <body> tag indicating the approval status
	 * of this page, so it can be styled accordingly.
	 */
	public static function addBodyClass( $out, $skin, &$bodyAttrs ) {
		$title = $skin->getTitle();
		$context = $skin->getContext();
		$request = $context->getRequest();

		if ( ! ApprovedRevs::hasApprovedRevision( $title ) ) {
			// This page has no approved rev.
			$bodyAttrs['class'] .= " approvedRevs-noapprovedrev";
		} else {
			// The page has an approved rev - see if this is it.
			$approvedRevID = ApprovedRevs::getApprovedRevID( $title );
			if ( ! empty( $approvedRevID ) &&
				( ! $request->getCheck( 'oldid' ) ||
				$request->getInt( 'oldid' ) == $approvedRevID ) ) {
				// This is the approved rev.
				$bodyAttrs['class'] .= " approvedRevs-approved";
			} else {
				// This is not the approved rev.
				$bodyAttrs['class'] .= " approvedRevs-notapproved";
			}
		}
	}

	/**
	 * @param $qp array
	 * @return bool true
	 */
	public static function onwgQueryPages( &$qp ) {
		$qp['SpecialApprovedRevsPage'] = 'ApprovedRevs';
		return true;
	}
}
