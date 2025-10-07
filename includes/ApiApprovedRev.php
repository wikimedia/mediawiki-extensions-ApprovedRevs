<?php

/**
 * API module for the MediaWiki Approved Revs extension - gets the approved
 * revision ID (if any) for the specified page.
 *
 * @since Version 2.3
 */

use MediaWiki\Title\Title;

class ApiApprovedRev extends ApiBase {
	public function execute() {
		$params = $this->extractRequestParams();
		$pageID = (int)$params['pageid'];
		$title = Title::newFromID( $pageID );
		if ( $title == null || !$title->exists() ) {
			$this->dieWithError( "No page was found with this ID.", 'notarget' );
		}
		$curApprovedRev = ApprovedRevs::getApprovedRevID( $title );
		$this->getResult()->addValue( null, $this->getModuleName(),
			[ 'id' => $curApprovedRev, 'title' => $title->getFullText() ] );
	}

	/** @inheritDoc */
	public function getAllowedParams() {
		return [
			'pageid' => [
				ApiBase::PARAM_REQUIRED => true,
				ApiBase::PARAM_TYPE => 'integer'
			]
		];
	}

	/** @inheritDoc */
	protected function getExamplesMessages() {
		return [
			'action=approvedrev&pageid=12345'
				=> 'apihelp-approvedrev-example-1'
		];
	}
}
