<?php
/**
 * Handles the 'approve' action.
 *
 * @author Yaron Koren
 * @ingroup ApprovedRevs
 */

class ARApproveAction extends Action {

	/**
	 * Return the name of the action this object responds to
	 * @return String lowercase
	 */
	public function getName() {
		return 'approve';
	}

	/**
	 * The main action entry point. Do all output for display and send it
	 * to the context output.
	 * $this->getOutput(), etc.
	 */
	public function show() {
		$title = $this->getTitle();
		if ( ! ApprovedRevs::pageIsApprovable( $title ) ) {
			return true;
		}

		$user = $this->getUser();
		if ( ! ApprovedRevs::userCanApprove( $user, $title ) ) {
			return true;
		}
		$request = $this->getRequest();
		if ( ! $request->getCheck( 'oldid' ) ) {
			return true;
		}
		$revisionID = $request->getVal( 'oldid' );
		ApprovedRevs::setApprovedRevID( $title, $revisionID );

		$out = $this->getOutput();
		$out->addHTML( "\t\t" . Xml::element(
			'div',
			array( 'class' => 'successbox' ),
			wfMessage( 'approvedrevs-approvesuccess' )->text()
		) . "\n" );
		$out->addHTML( "\t\t" . Xml::element(
			'p',
			array( 'style' => 'clear: both' )
		) . "\n" );

		// Seems to be needed when the latest version is approved -
		// at least when the Cargo extension is being used.
		$this->page->doPurge();

		// This is needed to force update of AR SESP properties to SMW
		// To Do: figure out how to make it work without appending the wikitext
		$zPage = WikiPage::newFromID( $this->page->getTitle()->getArticleId() );
		if ( $zPage ) { 
		  $zContent = $zPage->getContent( Revision::RAW );
		  $zText = ContentHandler::getContentText( $zContent )."\n\n{{Approval Log|Approved|".date("Y/m/d h:i:s",time())."|".$user."}}";
		  $zPage->doEditContent( ContentHandler::makeContent( $zText, $zPage->getTitle() ), "[Approve] Null edit." ); 
		  $zPage->doPurge(); 
		}
		
		// Show the revision.
                $this->page->view();
	}

	/**
	 * Implement this to support MW 1.23, which has it as an abstract
	 * function.
	 */
	public function execute() { }

}
