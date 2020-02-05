<?php
/**
 * Handles the 'unapprovefile' action.
 *
 * @author James Montalvo
 * @ingroup ApprovedRevs
 */

class ARUnapproveFileAction extends Action {

	/**
	 * Return the name of the action this object responds to
	 * @return String lowercase
	 */
	public function getName() {
		return 'unapprovefile';
	}

	/**
	 * The main action entry point. Do all output for display and send it
	 * to the context output.
	 * $this->getOutput(), etc.
	 */
	public function show() {
		$title = $this->getTitle();
		if ( !ApprovedRevs::userCanApprove( $this->getUser(), $title ) ) {
			return true;
		}

		ApprovedRevs::unsetApprovedFileInDB( $title, $this->getUser() );

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

		// show the revision, instead of the history page
		$this->page->doPurge();
		$this->page->view();
	}

}
