<?php

/**
 * Handles the 'approvefile' action.
 *
 * @author James Montalvo
 * @ingroup ApprovedRevs
 */

use MediaWiki\Html\Html;

class ARApproveFileAction extends Action {

	/**
	 * Return the name of the action this object responds to
	 * @return string lowercase
	 */
	public function getName() {
		return 'approvefile';
	}

	/**
	 * The main action entry point. Do all output for display and send it
	 * to the context output.
	 * $this->getOutput(), etc.
	 *
	 * @return true|void
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

		ApprovedRevs::setApprovedFileInDB(
			$title, $request->getVal( 'ts' ), $request->getVal( 'sha1' ), $this->getUser()
		);

		$out = $this->getOutput();
		$out->addHTML( Html::successBox( wfMessage( 'approvedrevs-approvesuccess' )->escaped() ) );

		// Show the revision, instead of the history page.
		$this->getWikiPage()->doPurge();
		$this->getArticle()->view();
	}

}
