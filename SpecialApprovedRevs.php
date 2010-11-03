<?php
/**
 * Special page that displays various lists of pages that either do or do
 * not have an approved revision.
 *
 * @author Yaron Koren
 */

if ( !defined( 'MEDIAWIKI' ) ) die();

class SpecialApprovedRevs extends SpecialPage {

	/**
	 * Constructor
	 */
	function __construct() {
		parent::__construct( 'ApprovedRevs' );
		wfLoadExtensionMessages( 'ApprovedRevs' );
	}

	function execute( $query ) {
		global $wgRequest;

		ApprovedRevs::addCSS();
		$this->setHeaders();
		list( $limit, $offset ) = wfCheckLimits();
		$mode = $wgRequest->getVal( 'show' );
		$rep = new SpecialApprovedRevsPage( $mode );
		return $rep->doQuery( $offset, $limit );
	}
}

class SpecialApprovedRevsPage extends QueryPage {
	private $mMode;

	public function __construct( $mode ) {
		$this->mMode = $mode;
	}

	function getName() {
		return "ApprovedRevs";
	}

	function isExpensive() { return false; }

	function isSyndicated() { return false; }

	function getPageHeader() {
		// show the names of the three lists of pages, with the one
		// corresponding to the current "mode" not being linked
		$approvedPagesPage = SpecialPage::getPage( 'ApprovedRevs' );
		$approvedPagesTitle = SpecialPage::getPage( 'ApprovedRevs' )->getTitle();
		$navLine = wfMsg( 'approvedrevs-view' ) . ' ';
		if ( $this->mMode == '' ) {
			$navLine .= Xml::element( 'strong',
				null,
				wfMsg( 'approvedrevs-approvedpages' )
			);
		} else {
			$navLine .= Xml::element( 'a',
				array( 'href' => $approvedPagesTitle->getLocalURL() ),
				wfMsg( 'approvedrevs-approvedpages' )
			);
		}
		$navLine .= " | ";
		if ( $this->mMode == 'notlatest' ) {
			$navLine .= Xml::element( 'strong',
				null,
				wfMsg( 'approvedrevs-notlatest' )
			);
		} else {
			$navLine .= Xml::element( 'a',
				array( 'href' => $approvedPagesTitle->getLocalURL( array( 'show' => 'notlatest' ) ) ),
				wfMsg( 'approvedrevs-notlatest' )
			);
		}
		$navLine .= " | ";
		if ( $this->mMode == 'unapproved' ) {
			$navLine .= Xml::element( 'strong',
				null,
				wfMsg( 'approvedrevs-unapprovedpages' )
			);
		} else {
			$navLine .= Xml::element( 'a',
				array( 'href' => $approvedPagesTitle->getLocalURL( array( 'show' => 'unapproved' ) ) ),
				wfMsg( 'approvedrevs-unapprovedpages' )
			);
		}
		$header = Xml::tags( 'p', null, $navLine ) . "\n";
		return $header;
	}

	/**
	 * Set parameters for standard navigation links.
	 */
	function linkParameters() {
		$params = array();
		if ( $this->mMode == 'notlatest' ) {
			$params['show'] = 'notlatest';
		} elseif ( $this->mMode == 'unapproved' ) {
			$params['show'] = 'unapproved';
		} else { // all approved pages
		}
		return $params;
	}

	function getPageFooter() {
	}

	function getSQL() {
		$dbr = wfGetDB( DB_SLAVE );
		$approved_revs = $dbr->tableName( 'approved_revs' );
		$page = $dbr->tableName( 'page' );
		if ( $this->mMode == 'notlatest' ) {
			return "SELECT 'Page' AS type,
				p.page_id AS id,
				ar.rev_id AS rev_id,
				p.page_latest AS latest_id
				FROM $approved_revs ar JOIN $page p
				ON ar.page_id = p.page_id
				WHERE p.page_latest != ar.rev_id";
		} elseif ( $this->mMode == 'unapproved' ) {
			return "SELECT 'Page' AS type,
				p.page_id AS id
				FROM $approved_revs ar RIGHT OUTER JOIN $page p
				ON ar.page_id = p.page_id
				WHERE ar.page_id IS NULL";
		} else { // all approved pages
			return "SELECT 'Page' AS type,
				p.page_id AS id,
				ar.rev_id AS rev_id,
				p.page_latest AS latest_id
				FROM $approved_revs ar JOIN $page p
				ON ar.page_id = p.page_id";
		}
	}

	function getOrder() {
		return ' ORDER BY p.page_namespace, p.page_title ASC';
	}

	function formatResult( $skin, $result ) {
		$title = Title::newFromId( $result->id );
		$pageLink = $skin->makeLinkObj( $title );
		if ( $this->mMode == 'unapproved' ) {
			return $pageLink;
		} else {
			if ( $result->rev_id == $result->latest_id ) {
				$class = "approvedRevIsLatest";
			} else {
				$class = "approvedRevNotLatest";
			}
			return $pageLink . ' (' .
				Xml::element( 'span',
					array ( 'class' => $class ),
					wfMsg( 'approvedrevs-revisionnumber', $result->rev_id )
				) .
				')';
		}
	}
}
