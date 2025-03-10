<?php

/**
 * Handles the 'unapprove' action.
 *
 * @author Yaron Koren
 * @ingroup ApprovedRevs
 */

use MediaWiki\Html\Html;

class ARUnapproveAction extends Action {

	/**
	 * Return the name of the action this object responds to
	 * @return string lowercase
	 */
	public function getName() {
		return 'unapprove';
	}

	/**
	 * The main action entry point. Do all output for display and send it
	 * to the context output.
	 * $this->getOutput(), etc.
	 *
	 * @return true|void
	 */
	public function show() {
		$user = $this->getUser();
		$title = $this->getTitle();
		if ( !ApprovedRevs::userCanApprove( $user, $title ) ) {
			return true;
		}

		ApprovedRevs::unsetApproval( $title, $user );

		// the message depends on whether the page should display
		// a blank right now or not
		global $egApprovedRevsBlankIfUnapproved;
		if ( $egApprovedRevsBlankIfUnapproved ) {
			$successMsg = wfMessage( 'approvedrevs-unapprovesuccess2' )->escaped();
		} else {
			$successMsg = wfMessage( 'approvedrevs-unapprovesuccess' )->escaped();
		}

		$out = $this->getOutput();
		$out->addHTML( Html::successBox( $successMsg ) );

		// Show the revision.
		$this->getWikiPage()->doPurge();
		$this->getArticle()->view();
	}

}
