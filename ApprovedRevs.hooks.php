<?php

if ( ! defined( 'MEDIAWIKI' ) ) die();

/**
 * Functions for the Approved Revs extension called by hooks in the MediaWiki
 * code.
 *
 * @file
 * @ingroup Extensions
 *
 * @author Yaron Koren
 */

class ApprovedRevsHooks {

	static public function setApprovedRevForParsing( &$parser, &$text, &$stripState ) {
		global $wgRequest;
		$action = $wgRequest->getVal( 'action' );
		if ( $action == 'submit' ) {
			$title = $parser->getTitle();
			$approvedText = ApprovedRevs::getApprovedContent( $title );
			if ( ! is_null( $approvedText ) ) {
				$text = $approvedText;
			}
		}
		return true;
	}

	/**
	 * Return the approved revision of the page, if there is one, and if
	 * the page is simply being viewed, and if no specific revision has
	 * been requested.
	 */
	static function showApprovedRevision( &$title, &$article ) {
		// if a revision ID is set, exit
		if ( $title->mArticleID > -1 ) {
			return true;
		}
		// if it's any action other than viewing, exit
		global $wgRequest;
		if ( $wgRequest->getCheck( 'action' ) &&
			$wgRequest->getVal( 'action' ) != 'view' &&
			$wgRequest->getVal( 'action' ) != 'purge' &&
			$wgRequest->getVal( 'action' ) != 'render' ) {
				return true;
		}
	
		$revisionID = ApprovedRevs::getApprovedRevID( $title );
		if ( ! empty( $revisionID ) ) {
			$article = new Article( $title, $revisionID );
		}
		return true;
	}

	/**
	 * If user is viewing the page via its main URL, and what they're
	 * seeing is the approved revision of the page, remove the standard
	 * subtitle shown for all non-latest revisions, and replace it with
	 * either nothing or a message explaining the situation, depending
	 * on the user's rights
	 */
	static function setSubtitle( &$article, &$revisionID ) {
		if ( ! ApprovedRevs::hasApprovedRevision( $article->getTitle() ) ) {
			return true;
		}

		global $wgRequest;
		if ( $wgRequest->getCheck( 'oldid' ) ) {
			return true;
		}

		if ( ! $article->getTitle()->userCan( 'viewlinktolatest' ) ) {
			return false;
		}

		wfLoadExtensionMessages( 'ApprovedRevs' );
		if ( $revisionID == $article->getLatest() ) {
			$text = wfMsg( 'approvedrevs-approvedandlatest' );
		} else {
			$text = wfMsg( 'approvedrevs-notlatest' );
			global $wgUser;
			$sk = $wgUser->getSkin();
			$curRevLink = $sk->link(
				$article->getTitle(),
				wfMsgHtml( 'approvedrevs-viewlatest' ),
				array(),
				array( 'oldid' => $article->getLatest() ),
				array( 'known', 'noclasses' )
			);
			$text .= ' ' . $curRevLink;
		}
		global $wgOut;
		$wgOut->setSubtitle( $text );
		return false;
	}
	
	/**
	 * If user is looking at a revision through a main 'view' URL (no
	 * revision specified), have the 'edit' tab link to the basic
	 * 'action=edit' URL (i.e., the latest revision), no matter which
	 * revision they're actually on.
	 */
	static function changeEditLink( &$skin, &$contentActions ) {
		global $wgRequest;
		if ( $wgRequest->getCheck( 'oldid' ) ) {
			return true;
		}
		if ( ApprovedRevs::hasApprovedRevision( $skin->getTitle() ) ) {
			$contentActions['views']['edit']['href'] = $skin->getTitle()->getLocalUrl( array( 'action' => 'edit' ) );
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
		// this will be null if there's no ID
		$approvedRevID = ApprovedRevs::getApprovedRevID( $article->getTitle() );
		$article->approvedRevID = $approvedRevID;
		// also load extension messages, while we're at it
		wfLoadExtensionMessages( 'ApprovedRevs' );
		return true;
	}
	
	/**
	 * If the user is allowed to make revision approvals, add either an
	 * 'approve' or 'unapprove' link to the end of this row in the page
	 * history, depending on whether or not this is already the approved
	 * revision. If it's the approved revision also add on a "star"
	 * icon, regardless of the user.
	 */
	static function addApprovalLink( $historyPage, &$row , &$s )  {
		$title = $historyPage->getTitle();
		if ( ApprovedRevs::hasUnsupportedNamespace( $title ) ) {
			return true;
		}

		$article = $historyPage->getArticle();
		// use the rev ID field in the $article object, which was
		// stored earlier
		$approvedRevID = $article->approvedRevID;
		if ( $row->rev_id == $approvedRevID ) {
			$s .= '&#9733; ';
		}
		if ( $title->userCan( 'approverevisions' ) ) {
			if ( $row->rev_id == $approvedRevID ) {
				$url = $title->getLocalUrl(
					array( 'action' => 'unapprove' )
				);
				$msg = wfMsg( 'approvedrevs-unapprove' );
			} else {
				$url = $title->getLocalUrl(
					array( 'action' => 'approve', 'oldid' => $row->rev_id )
				);
				$msg = wfMsg( 'approvedrevs-approve' );
			}
			$s .= '(' . Xml::element(
				'a',
				array( 'href' => $url ),
				$msg
			) . ')';
		}
		return true;
	}
	
	/**
	 * Handle the 'approve' action, defined for ApprovedRevs -
	 * mark the revision as approved, log it, and show a message to
	 * the user.
	 */
	static function setAsApproved( $action, $article ) {
		// return "true" if the call failed (meaning, pass on handling
		// of the hook to others), and "false" otherwise
		if ( $action != 'approve' ) {
			return true;
		}
		$title = $article->getTitle();
		if ( ApprovedRevs::hasUnsupportedNamespace( $title ) ) {
			return true;
		}
		if ( ! $title->userCan( 'approverevisions' ) ) {
			return true;
		}
		global $wgRequest;
		if ( ! $wgRequest->getCheck( 'oldid' ) ) {
			return true;
		}
		$revision_id = $wgRequest->getVal( 'oldid' );
		ApprovedRevs::setApprovedRevID( $title, $revision_id );

		global $wgOut;
		$wgOut->addHTML( '		' . Xml::element(
			'div',
			array( 'class' => 'successbox' ),
			wfMsg( 'approvedrevs-approvesuccess' )
		) . "\n" );
		$wgOut->addHTML( '		' . Xml::element(
			'p',
			array( 'style' => 'clear: both' )
		) . "\n" );

		// show the revision, instead of the history page
		$article->doPurge();
		$article->view();
		return false;
	}
	
	/**
	 * Handle the 'unapprove' action, defined for ApprovedRevs -
	 * unset the previously-approved revision, log the change, and show
	 * a message to the user.
	 */
	static function unsetAsApproved( $action, $article ) {
		// return "true" if the call failed (meaning, pass on handling
		// of the hook to others), and "false" otherwise
		if ( $action != 'unapprove' ) {
			return true;
		}
		$title = $article->getTitle();
		if ( ! $title->userCan( 'approverevisions' ) ) {
			return true;
		}

		ApprovedRevs::unsetApproval( $title );

		global $wgOut;
		$wgOut->addHTML( '		' . Xml::element(
			'div',
			array( 'class' => 'successbox' ),
			wfMsg( 'approvedrevs-unapprovesuccess' )
		) . "\n" );
		$wgOut->addHTML( '		' . Xml::element(
			'p',
			array( 'style' => 'clear: both' )
		) . "\n" );

		// show the revision, instead of the history page
		$article->doPurge();
		$article->view();
		return false;
	}

	/**
	 * Use the approved revision, if it exists, for templates and other
	 * transcluded pages.
	 */
	static function setTranscludedPageRev( $parser, &$title, &$skip, &$id ) {
		$revision_id = ApprovedRevs::getApprovedRevID( $title );
		if ( ! is_null( $revision_id ) ) {
			$id = $revision_id;
		}
		return true;
	}

	/**
	 * Deletes the approval record in the database if the page itself is
	 * deleted.
	 */
	static function deleteRevisionApproval( &$article, &$user, $reason, $id ) {
		ApprovedRevs::deleteRevisionApproval( $article->getTitle() );
		return true;
	}

	/**
	 * Adds a link to 'Special:ApprovedPages' to the the page
	 * 'Special:AdminLinks', defined by the Admin Links extension.
	 */
	function addToAdminLinks( &$admin_links_tree ) {
		$general_section = $admin_links_tree->getSection( wfMsg( 'adminlinks_general' ) );
		$extensions_row = $general_section->getRow( 'extensions' );
		if ( is_null( $extensions_row ) ) {
			$extensions_row = new ALRow( 'extensions' );
			$general_section->addRow( $extensions_row );
		}
		$extensions_row->addItem( ALItem::newFromSpecialPage( 'ApprovedPages' ) );
		return true;
	}

	public static function onLoadExtensionSchemaUpdates() {
		global $wgExtNewTables, $wgDBtype;

		$dir = dirname( __FILE__ );

		// DB updates
		if ( $wgDBtype == 'mysql' ) {
			$wgExtNewTables[] = array( 'approved_revs', "$dir/ApprovedRevs.sql" );
		}
		return true;
	}
}
