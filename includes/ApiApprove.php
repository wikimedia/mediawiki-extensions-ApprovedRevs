<?php

/**
 * API module for MediaWiki's ApprovedRevs extension.
 *
 * @author Fodagus
 * @since Version 0.8
 */

use MediaWiki\MediaWikiServices;

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
		$revRecord = $rev = null;
		if ( method_exists( 'MediaWikiServices', 'getRevisionLookup' ) ) {
			// MW 1.31+
			$revRecord = MediaWikiServices::getInstance()
				->getRevisionLookup()
				->getRevisionById( $revid );
		} else {
			$rev = Revision::newFromId( $revid );
		}
		if ( $revRecord !== null ) {
			$title = Title::newFromLinkTarget( $revRecord->getPageAsLinkTarget() );
		} elseif ( $rev !== null ) {
			$title = $rev->getTitle();
		} else {
			$this->dieUsage( "Cannot find a revision with the specified ID.", 'notarget' );
		}

		// Verify that user can approve.
		if ( !ApprovedRevs::userCanApprove( $user, $title ) ) {
			$this->dieUsage( 'You (' . $user->getName() . ') can\'t approve!', 'permissiondenied' );
		}
		// Verify that page can be approved.
		if ( !ApprovedRevs::pageIsApprovable( $title ) ) {
			$this->dieUsage( "Page $title can't be approved!", 'badtarget' );
		}

		$curApprovedRev = ApprovedRevs::getApprovedRevID( $title );

		// Handle a call to approve or unapprove.
		if ( $unapprove ) {
			if ( empty( $curApprovedRev ) ) {
				// No revision - just send an empty result back.
				$this->getResult()->addValue( null, $this->getModuleName(), [ 'result' => 'This page was already unapproved!', 'title' => $title ] );
			} else {
				ApprovedRevs::unsetApproval( $title, $user );
				$this->getResult()->addValue( null, $this->getModuleName(), [ 'result' => 'Page now has no approved revision.', 'title' => $title ] );
			}
		} else { // This is a call to approve a revision.
			if ( $revid == $curApprovedRev ) {
				// This is already the approved revision - just send an empty result back.
				$this->getResult()->addValue( null, $this->getModuleName(), [ 'result' => 'This revision was already approved!', 'title' => $title ] );
			} else {
				ApprovedRevs::setApprovedRevID( $title, $revid, $user );
				$this->getResult()->addValue( null, $this->getModuleName(), [ 'result' => 'Revision was successfully approved.', 'title' => $title ] );

			}
		}
	}

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

	/**
	 * @see ApiBase::getExamplesMessages()
	 */
	protected function getExamplesMessages() {
		return [
			'action=approve&revid=12345'
				=> 'apihelp-approve-example-1',
			'action=approve&revid=12345&unapprove=1'
				=> 'apihelp-approve-example-2',
		];
	}

	public function mustBePosted() {
		return true;
	}

	public function isWriteMode() {
		return true;
	}

	/**
	 * CSRF Token must be POSTed
	 * use parameter name 'token'
	 * No need to document, this is automatically done by ApiBase
	 */
	public function needsToken() {
		return 'csrf';
	}

	public function getTokenSalt() {
		return 'e-ar';
	}
}
