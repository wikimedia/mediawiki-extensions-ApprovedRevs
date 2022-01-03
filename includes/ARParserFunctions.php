<?php

/**
 * Parser functions for Approved Revs.
 *
 * @file
 * @ingroup AR
 *
 * The following parser functions are defined:
 *
 * #approvable_by - called as:
 * {{#approvable_by: users = Alice Jones, Bob Smith | groups = bureaucrat }}
 *
 * This function sets the usernames and user groups able to approve the page
 * Usernames are specified without the "User:" prefix.
 *
 * APPROVALYEAR - called as:
 * {{APPROVALYEAR:MyPage}}
 *
 * This function displays the year the page's current approved revision was
 * approved; or blank, if there is no approved revision.
 *
 * APPROVALMONTH, APPROVALDAY, APPROVALTIMESTAMP, APPROVALUSER - all
 * called in the same way as APPROVALYEAR, with a (hopefully) obvious output
 * for each.
 */

class ARParserFunctions {

	private static $mAllApprovalInfo = [];

	/**
	 * Render #approvable_by parser function
	 *
	 * @author James Montalvo
	 * @since 1.0
	 *
	 * @param Parser &$parser
	 * @param PPFrame $frame
	 * @param array $args
	 * @return bool
	 */
	public static function renderApprovableBy( Parser &$parser, PPFrame $frame, array $args ) {
		$parserOutput = $parser->getOutput();
		$output = '';
		foreach ( $args as $arg ) {
			$argInfo = explode( '=', $frame->expand( $arg ), 2 );
			if ( count( $argInfo ) < 2 ) {
				// no equals-sign, not a valid arg
				continue;
			}
			$argName = strtolower( trim( $argInfo[0] ) );
			$argValue = trim( $argInfo[1] );

			if ( $argValue === '' ) {
				// no value = nothing to do
				continue;
			} else {
				// sanitize $argValue: explode on comma, trim each element, implode on comma again
				$argValue = implode( ',', array_map( 'trim', explode( ',', $argValue ) ) );
			}

			if ( $argName === 'user' || $argName === 'users' ) {
				// Note: comma is a valid username character, but we're
				// accepting it as a delimiter anyway since characters invalid
				// in usernames are not ideal.
				$parserOutput->setProperty( 'approvedrevs-approver-users', $argValue );
			} elseif ( $argName === 'group' || $argName === 'groups' ) {
				$parserOutput->setProperty( 'approvedrevs-approver-groups', $argValue );
			} else {
				$output .= "$argName is not a valid argument. ";
			}
		}

		// typically no output...allow users to stylize output themselves
		return $output;
	}

	/**
	 * Helper function for all the display parser functions.
	 */
	public static function getApprovalInfo( $title ) {
		$pageID = $title->getArticleID();
		if ( array_key_exists( $pageID, self::$mAllApprovalInfo ) ) {
			return self::$mAllApprovalInfo[$pageID];
		}

		$dbr = wfGetDB( DB_REPLICA );

		// There is no consistency between the structures of these two
		// DB tables, unfortunately.
		if ( $title->getNamespace() == NS_FILE ) {
			$pageName = $title->getText();
			$res = $dbr->select( 'approved_revs_files', [ 'approved_timestamp' ], [ 'file_title' => $pageName ] );
		} else {
			$res = $dbr->select( 'approved_revs', [ 'approver_id', 'approval_date' ], [ 'page_id' => $pageID ] );
		}

		if ( $res->numRows() == 0 ) {
			return null;
		}
		$row = $res->fetchRow();
		if ( $title->getNamespace() == NS_FILE ) {
			self::$mAllApprovalInfo[$pageID] = [ strtotime( $row['approved_timestamp'] ), null ];
		} else {
			self::$mAllApprovalInfo[$pageID] = [ strtotime( $row['approval_date'] ), $row['approver_id'] ];
		}
		return self::$mAllApprovalInfo[$pageID];
	}

	public static function formatApprovalDate( Parser &$parser, string $pageName, $formatString ) {
		if ( $pageName !== null && $pageName !== '' ) {
			$title = Title::newFromText( $pageName );
		} else {
			$title = $parser->getTitle();
		}

		$approvalInfo = self::getApprovalInfo( $title );
		if ( $approvalInfo == null ) {
			return null;
		}
		if ( $approvalInfo[0] == null ) {
			return null;
		}
		return date( $formatString, $approvalInfo[0] );
	}

	public static function renderApprovalYear( Parser &$parser, string $pageName = null ) {
		return self::formatApprovalDate( $parser, $pageName, 'Y' );
	}

	public static function renderApprovalMonth( Parser &$parser, string $pageName = null ) {
		return self::formatApprovalDate( $parser, $pageName, 'm' );
	}

	public static function renderApprovalDay( Parser &$parser, string $pageName = null ) {
		return self::formatApprovalDate( $parser, $pageName, 'd' );
	}

	public static function renderApprovalTimestamp( Parser &$parser, string $pageName = null ) {
		return self::formatApprovalDate( $parser, $pageName, 'YmdHis' );
	}

	public static function renderApprovalUser( Parser &$parser, string $pageName = null ) {
		if ( $pageName !== null && $pageName !== '' ) {
			$title = Title::newFromText( $pageName );
		} else {
			$title = $parser->getTitle();
		}

		$approvalInfo = self::getApprovalInfo( $title );
		if ( $approvalInfo == null ) {
			return null;
		}
		if ( $approvalInfo[1] == null ) {
			return null;
		}
		$userID = $approvalInfo[1];
		$user = User::newFromID( $userID );
		return $user->getName();
	}

}
