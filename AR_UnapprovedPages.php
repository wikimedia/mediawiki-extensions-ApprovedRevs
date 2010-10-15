<?php
/**
 * Special page that lists all pages that have an approved revision.
 *
 * @author Yaron Koren
 */

if ( !defined( 'MEDIAWIKI' ) ) die();

class ARUnapprovedPages extends SpecialPage {

	/**
	 * Constructor
	 */
	function ARUnapprovedPages() {
		parent::__construct( 'UnapprovedPages' );
		wfLoadExtensionMessages( 'ApprovedRevs' );
	}

	function execute( $query ) {
		$this->setHeaders();
		list( $limit, $offset ) = wfCheckLimits();
		$rep = new ARUnapprovedPagesPage();
		return $rep->doQuery( $offset, $limit );
	}
}

class ARUnapprovedPagesPage extends QueryPage {
	function getName() {
		return "UnapprovedPages";
	}

	function isExpensive() { return false; }

	function isSyndicated() { return false; }

	function getPageHeader() {
		$header = Xml::element( 'p', null, wfMsg( 'approvedrevs-unapprovedpages-docu' ) ) . "<br />\n";
		return $header;
	}

	function getPageFooter() {
	}

	function getSQL() {
		$dbr = wfGetDB( DB_SLAVE );
		$approved_revs = $dbr->tableName( 'approved_revs' );
		$page = $dbr->tableName( 'page' );
		return "SELECT 'Page' AS type,
			p.page_id AS id
			FROM $approved_revs ar RIGHT OUTER JOIN $page p
			ON ar.page_id = p.page_id
			WHERE ar.page_id IS NULL";
	}

	function getOrder() {
		return ' ORDER BY p.page_namespace, p.page_title ASC';
	}

	function formatResult( $skin, $result ) {
		$title = Title::newFromId( $result->id );
		return $skin->makeLinkObj( $title );
	}
}
