<?php
/**
 * Handles the 'approvefile' action.
 *
 * @author James Montalvo
 * @ingroup ApprovedRevs
 */

class ARApproveFileAction extends Action {

	/**
	 * Return the name of the action this object responds to
	 * @return String lowercase
	 */
	public function getName() {
		return 'approvefile';
	}

	/**
	 * The main action entry point. Do all output for display and send it
	 * to the context output.
	 * $this->getOutput(), etc.
	 */
	public function show() {
		$title = $this->getTitle();
		if ( !ApprovedRevs::fileIsApprovable( $title ) ) {
			return true;
		}
		if ( !ApprovedRevs::userCanApprove( $this->getUser(), $title ) ) {
			return true;
		}

		$request = $this->getRequest();
		if ( !$request->getCheck( 'ts' ) || !$request->getCheck( 'sha1' ) ) {
			throw new MWException( 'Setting a file revision as approved requires timestamp and sha1' );
		}

		$revisionID = $request->getVal( 'ts' );
		ApprovedRevs::setApprovedFileInDB(
			$title, $request->getVal( 'ts' ), $request->getVal( 'sha1' ), $this->getUser()
		);

		$out = $this->getOutput();
		$out->addHTML( "\t\t" . Xml::element(
			'div',
			[ 'class' => 'successbox' ],
			wfMessage( 'approvedrevs-approvesuccess' )->text()
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
