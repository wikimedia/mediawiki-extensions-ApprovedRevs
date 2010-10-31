<?php
/**
 * Aliases for special pages of Approved Revs extension.
 *
 */

$specialPageAliases = array();

/** English (English) */
$specialPageAliases['en'] = array(
	'ApprovedPages' => array( 'ApprovedPages' ),
	'UnapprovedPages' => array( 'UnapprovedPages' ),
);

/** Malayalam (മലയാളം) */
$specialPageAliases['ml'] = array(
	'ApprovedPages' => array( 'അംഗീകൃതതാളുകൾ' ),
	'UnapprovedPages' => array( 'അംഗീകൃതമല്ലാത്തതാളുകൾ' ),
);

/** Dutch (Nederlands) */
$specialPageAliases['nl'] = array(
	'ApprovedPages' => array( 'GoedgekeurdePaginas', 'GoedgekeurdePagina\'s' ),
);

/** Sanskrit (संस्कृत) */
$specialPageAliases['sa'] = array(
	'ApprovedPages' => array( 'अंगीकृत_पृष्टानि' ),
);

/**
 * For backwards compatibility with MediaWiki 1.15 and earlier.
 */
$aliases =& $specialPageAliases;