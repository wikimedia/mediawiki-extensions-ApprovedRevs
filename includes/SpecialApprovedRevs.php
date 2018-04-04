<?php

/**
 * Special page that displays various lists of pages that either do or do
 * not have an approved revision.
 *
 * @author Yaron Koren
 */
class SpecialApprovedRevs extends SpecialPage {

	/**
	 * Constructor
	 */
	function __construct() {
		parent::__construct( 'ApprovedRevs' );
	}

	function execute( $query ) {
		$request = $this->getRequest();

		ApprovedRevs::addCSS();
		$this->setHeaders();
		list( $limit, $offset ) = $request->getLimitOffset();

		$mode = $request->getVal( 'show' );
		$rep = new SpecialApprovedRevsPage( $mode );

		if ( method_exists( $rep, 'execute' ) ) {
			return $rep->execute( $query );
		} else {
			return $rep->doQuery( $offset, $limit );
		}
	}

	protected function getGroupName() {
		return 'pages';
	}
}

