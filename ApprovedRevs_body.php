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
	/**
	 * Gets the approved revision ID for this page, or null if there isn't
	 * one.
	 */
	public static function getApprovedRevID( $title ) {
		if ( self::hasUnsupportedNamespace( $title ) ) {
			return null;
		}
		$dbr = wfGetDB( DB_SLAVE );
		$page_id = $title->getArticleId();
		$rev_id = $dbr->selectField( 'approved_revs', 'rev_id', array( 'page_id' => $page_id ) );
		return $rev_id;
	}

	/**
	 * Returns whether or not this page has a revision ID.
	 */
	public static function hasApprovedRevision( $title ) {
		$revision_id = self::getApprovedRevID( $title );
		return ( ! empty( $revision_id ) );
	}

	/**
	 * Returns the content of the approved revision of this page, or null
	 * if there isn't one.
	 */
	public static function getApprovedContent( $title ) {
		$revision_id = ApprovedRevs::getApprovedRevID( $title );
		if ( empty( $revision_id ) ) {
			return null;
		}
		$article = new Article( $title, $revision_id );
		return( $article->getContent() );
	}

	/**
	 * Returns whether this page is in a namespace that the Approved Revs
	 * extension doesn't support.
	 */
	public static function hasUnsupportedNamespace( $title ) {
		global $egApprovedRevsExcludedNamespaces;
		$unsupported_namespaces = $egApprovedRevsExcludedNamespaces;
		$unsupported_namespaces[] = NS_FILE;
		$unsupported_namespaces[] = NS_CATEGORY;
		$unsupported_namespaces[] = NS_MEDIAWIKI;
		return( in_array( $title->getNamespace(), $unsupported_namespaces ) );
	}

	/**
	 * Sets a certain revision as the approved one for this page in the
	 * approved_revs DB table; calls a "links update" on this revision
	 * so that category information can be stored correctly, as well as
	 * info for extensions such as Semantic MediaWiki; and logs the action.
	 */
	public static function setApprovedRevID( $title, $rev_id ) {
		$dbr = wfGetDB( DB_MASTER );
		$page_id = $title->getArticleId();
		$old_rev_id = $dbr->selectField( 'approved_revs', 'rev_id', array( 'page_id' => $page_id ) );
		if ( $old_rev_id ) {
			$dbr->update( 'approved_revs', array( 'rev_id' => $rev_id ), array( 'page_id' => $page_id ) );
		} else {
			$dbr->insert( 'approved_revs', array( 'page_id' => $page_id, 'rev_id' => $rev_id ) );
		}

		$parser = new Parser();
		$parser->setTitle( $title );
		$article = new Article( $title, $rev_id );
		$text = $article->getContent();
		$options = new ParserOptions();
		$parser->parse( $text, $title, $options, true, true, $rev_id );
		$u = new LinksUpdate( $title, $parser->getOutput() );
		$u->doUpdate();

		$log = new LogPage( 'approval' );
		$rev_url = $title->getFullURL( array( 'old_id' => $rev_id ) );
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

		wfRunHooks( 'ApprovedRevsRevisionApproved', array( $parser, $title, $rev_id ) );
	}

	public static function deleteRevisionApproval( $title ) {
		$dbr = wfGetDB( DB_MASTER );
		$page_id = $title->getArticleId();
		$dbr->delete( 'approved_revs', array( 'page_id' => $page_id ) );
	}

	/**
	 * Unsets the approved revision for this page in the approved_revs DB
	 * table; calls a "links update" on this page so that category
	 * information can be stored correctly, as well as info for
	 * extensions such as Semantic MediaWiki; and logs the action.
	 */
	public static function unsetApproval( $title ) {
		self::deleteRevisionApproval( $title );

		$parser = new Parser();
		$parser->setTitle( $title );
		$article = new Article( $title );
		$text = $article->getContent();
		$options = new ParserOptions();
		$parser->parse( $text, $title, $options );
		$u = new LinksUpdate( $title, $parser->getOutput() );
		$u->doUpdate();

		$log = new LogPage( 'approval' );
		$log->addEntry(
			'unapprove',
			$title,
			''
		);

		wfRunHooks( 'ApprovedRevsRevisionUnapproved', array( $parser, $title ) );
	}
}
