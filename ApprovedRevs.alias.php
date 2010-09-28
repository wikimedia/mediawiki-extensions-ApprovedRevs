<?php
/**
 * Aliases for special pages of Approved Revs extension.
 *
 */

$specialPageAliases = array();

/** English
 */
$specialPageAliases['en'] = array(
	'ApprovedPages' => array( 'ApprovedPages' ),
	'UnapprovedPages' => array( 'UnapprovedPages' ),
);

/**
 * For backwards compatibility with MediaWiki 1.15 and earlier.
 */
$aliases =& $specialPageAliases;
