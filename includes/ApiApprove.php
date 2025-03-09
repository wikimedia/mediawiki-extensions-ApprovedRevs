<?php

/**
 * API module for MediaWiki's ApprovedRevs extension.
 *
 * @author Fodagus
 * @since Version 0.8
 */

use MediaWiki\MediaWikiServices;
use MediaWiki\Title\Title;

/**
 * API module to review revisions
 */
class ApiApprove extends ApiBase {

	public function execute() {
		$params = $this->extractRequestParams();
		$revid = (int)$params['revid'];
		$unapprove = (bool)$params['unapprove'];
		$user = $this->getUser();

		// Get target rev and title.
		$revRecord = MediaWikiServices::getInstance()->getRevisionLookup()->getRevisionById( $revid );
		if ( $revRecord !== null ) {
			$title = Title::newFromLinkTarget( $revRecord->getPageAsLinkTarget() );
		} else {
			$this->dieWithError( "Cannot find a revision with the specified ID.", 'notarget' );
		}

		// Verify that user can approve.
		if ( !ApprovedRevs::userCanApprove( $user, $title ) ) {
			$this->dieWithError( 'You (' . $user->getName() . ') can\'t approve!', 'permissiondenied' );
		}
		// Verify that page can be approved.
		if ( !ApprovedRevs::pageIsApprovable( $title ) ) {
			$this->dieWithError( "Page $title can't be approved!", 'badtarget' );
		}

		$curApprovedRev = ApprovedRevs::getApprovedRevID( $title );

		// Handle a call to approve or unapprove.
		if ( $unapprove ) {
			if ( empty( $curApprovedRev ) ) {
				// No revision - just send an empty result back.
				$resultText = 'This page was already unapproved!';
			} else {
				ApprovedRevs::unsetApproval( $title, $user );
				$resultText = 'Page now has no approved revision.';
			}
		} else {
			// This is a call to approve a revision.
			if ( $revid == $curApprovedRev ) {
				// This is already the approved revision - just send an empty result back.
				$resultText = 'This revision was already approved!';
			} else {
				ApprovedRevs::setApprovedRevID( $title, $revid, $user );
				$resultText = 'Revision was successfully approved.';
			}
		}
		$this->getResult()->addValue( null, $this->getModuleName(),
			[ 'result' => $resultText, 'title' => $title ] );
	}

	/** @inheritDoc */
	public function getAllowedParams() {
		return [
			'revid' => [
				ApiBase::PARAM_REQUIRED => true,
				ApiBase::PARAM_TYPE => 'integer'
			],
			'unapprove' => [
				ApiBase::PARAM_REQUIRED => false,
				ApiBase::PARAM_TYPE => 'boolean'
			]
		];
	}

	/** @inheritDoc */
	protected function getExamplesMessages() {
		return [
			'action=approve&revid=12345'
				=> 'apihelp-approve-example-1',
			'action=approve&revid=12345&unapprove=1'
				=> 'apihelp-approve-example-2',
		];
	}

	/** @inheritDoc */
	public function mustBePosted() {
		return true;
	}

	/** @inheritDoc */
	public function isWriteMode() {
		return true;
	}

	/**
	 * CSRF Token must be POSTed
	 * use parameter name 'token'
	 *
	 * @inheritDoc
	 */
	public function needsToken() {
		return 'csrf';
	}

}
