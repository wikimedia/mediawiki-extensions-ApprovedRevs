<?php

/**
 * Parser functions for Approved Revs.
 *
 * @file
 * @ingroup AR
 *
 * The following parser functions are defined: #approvable_by
 *
 * '#approvable_by' is called as:
 * {{#approvable_by: users = Alice Jones, Bob Smith | groups = bureaucrat }}
 *
 * This function sets the usernames and user groups able to approve the page
 * Usernames are specified without the "User:" prefix.
 *
 * @author James Montalvo
 * @since 1.0
 */

class ARParserFunctions {

	/**
	 * Render #approvable_by parser function
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
				continue; // no equals-sign, not a valid arg
			}
			$argName = strtolower( trim( $argInfo[0] ) );
			$argValue = trim( $argInfo[1] );

			if ( $argValue === '' ) {
				continue; // no value = nothing to do
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

}
