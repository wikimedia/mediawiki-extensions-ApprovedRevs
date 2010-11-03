<?php
/**
 * Aliases for special pages of Approved Revs extension.
 *
 */

$specialPageAliases = array();

/** English (English) */
$specialPageAliases['en'] = array(
	'ApprovedRevs' => array( 'ApprovedRevs', 'ApprovedPages', 'UnapprovedPages' ),
);

/** Malayalam (മലയാളം) */
$specialPageAliases['ml'] = array(
	'ApprovedRevs' => array( 'അംഗീകൃതതാളുകൾ', 'അംഗീകൃതമല്ലാത്തതാളുകൾ' ),
);

/** Dutch (Nederlands) */
$specialPageAliases['nl'] = array(
	'ApprovedRevs' => array( 'GoedgekeurdePaginas', 'GoedgekeurdePagina\'s' ),
);

/** Sanskrit (संस्कृत) */
$specialPageAliases['sa'] = array(
	'ApprovedRevs' => array( 'अंगीकृत_पृष्टानि' ),
);

/**
 * For backwards compatibility with MediaWiki 1.15 and earlier.
 */
$aliases =& $specialPageAliases;
