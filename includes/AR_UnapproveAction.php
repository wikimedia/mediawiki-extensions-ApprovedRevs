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
		if ( ! ApprovedRevs::userCanApprove( $user, $title ) ) {
			return true;
		}

		ApprovedRevs::unsetApproval( $title );

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
			array( 'class' => 'successbox' ),
			$successMsg
		) . "\n" );
		$out->addHTML( "\t\t" . Xml::element(
			'p',
			array( 'style' => 'clear: both' )
		) . "\n" );

		// Show the revision.
		$this->page->doPurge();
		
		// This is needed to force update of AR SESP properties to SMW
		// To Do: figure out how to make it work without appending the wikitext
		$zPage = WikiPage::newFromID( $this->page->getTitle()->getArticleId() );
		if ( $zPage ) { 
		  $zContent = $zPage->getContent( Revision::RAW );
		  $zText = ContentHandler::getContentText( $zContent )."\n\n{{Approval Log|Disapproved|".date("Y/m/d h:i:s",time())."|".$user."}}";
		  $zPage->doEditContent( ContentHandler::makeContent( $zText, $zPage->getTitle() ), "[Approve] Null edit." ); 
		  $zPage->doPurge(); 
		}		
		
		$this->page->view();
	}

	/**
	 * Implement this to support MW 1.23, which has it as an abstract
	 * function.
	 */
	public function execute() { }

}
