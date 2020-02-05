<?php
/**
 * Handles the 'unapprove' action.
 *
 * @author Yaron Koren
 * @ingroup ApprovedRevs
 */

class ARUnapproveAction extends Action {

	/**
	 * Return the name of the action this object responds to
	 * @return String lowercase
	 */
	public function getName() {
		return 'unapprove';
	}

	/**
	 * The main action entry point. Do all output for display and send it
	 * to the context output.
	 * $this->getOutput(), etc.
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
			$successMsg = wfMessage( 'approvedrevs-unapprovesuccess2' )->text();
		} else {
			$successMsg = wfMessage( 'approvedrevs-unapprovesuccess' )->text();
		}

		$out = $this->getOutput();
		$out->addHTML( "\t\t" . Xml::element(
			'div',
			[ 'class' => 'successbox' ],
			$successMsg
		) . "\n" );
		$out->addHTML( "\t\t" . Xml::element(
			'p',
			[ 'style' => 'clear: both' ]
		) . "\n" );

		// Show the revision.
		$this->page->doPurge();
		$this->page->view();
	}

}
