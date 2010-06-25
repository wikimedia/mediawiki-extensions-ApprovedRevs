<?php
/**
 * Special page that lists all pages that have an approved revision.
 *
 * @author Yaron Koren
 */

if ( !defined( 'MEDIAWIKI' ) ) die();

class ARApprovedPages extends SpecialPage {

	/**
	 * Constructor
	 */
	function ARApprovedPages() {
		SpecialPage::SpecialPage( 'ApprovedPages' );
		wfLoadExtensionMessages( 'ApprovedRevs' );
	}

	function execute( $query ) {
		$this->setHeaders();
		list( $limit, $offset ) = wfCheckLimits();
		$rep = new ARApprovedPagesPage();
		return $rep->doQuery( $offset, $limit );
	}
}

class ARApprovedPagesPage extends QueryPage {
	function getName() {
		return "ApprovedPages";
	}

	function isExpensive() { return false; }

	function isSyndicated() { return false; }

	function getPageHeader() {
		$header = Xml::element( 'p', null, wfMsg( 'approvedrevs-approvedpages-docu' ) ) . "<br />\n";
		return $header;
	}

	function getPageFooter() {
	}

	function getSQL() {
		$dbr = wfGetDB( DB_SLAVE );
		$approved_revs = $dbr->tableName( 'approved_revs' );
		$page = $dbr->tableName( 'page' );
		// QueryPage uses the value from this SQL in an ORDER clause,
		// so return page_title as title.
		return "SELECT 'Page' AS type,
			p.page_title AS title,
			p.page_id AS value
			FROM $approved_revs ar JOIN $page p
			ON ar.page_id = p.page_id";
	}

	function sortDescending() {
		return false;
	}

	function formatResult( $skin, $result ) {
		$title = Title::newFromId( $result->value );
		return $skin->makeLinkObj( $title );
	}
}