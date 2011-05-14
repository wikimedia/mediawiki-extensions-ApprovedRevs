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

/** Arabic (العربية) */
$specialPageAliases['ar'] = array(
	'ApprovedRevs' => array( 'مراجعات_موفقة', 'صفحات_موفقة', 'صفحات_غير_موفقة' ),
);

/** Esperanto (Esperanto) */
$specialPageAliases['eo'] = array(
	'ApprovedRevs' => array( 'Aprobitaj_revizioj' ),
);

/** 湘语 (湘语) */
$specialPageAliases['hsn'] = array(
	'ApprovedRevs' => array( '受认定版本', '受认定页面', '冇认定个页面' ),
);

/** Haitian (Kreyòl ayisyen) */
$specialPageAliases['ht'] = array(
	'ApprovedRevs' => array( 'RevAprouve', 'PajAprouve', 'PajPaAprouve' ),
);

/** Macedonian (Македонски) */
$specialPageAliases['mk'] = array(
	'ApprovedRevs' => array( 'ОдобрениРевизии' ),
);

/** Malayalam (മലയാളം) */
$specialPageAliases['ml'] = array(
	'ApprovedRevs' => array( 'അംഗീകൃതതാളുകൾ', 'അംഗീകൃതമല്ലാത്തതാളുകൾ' ),
);

/** Dutch (Nederlands) */
$specialPageAliases['nl'] = array(
	'ApprovedRevs' => array( 'GoedgekeurdePaginas', 'GoedgekeurdePagina\'s' ),
);

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬) */
$specialPageAliases['no'] = array(
	'ApprovedRevs' => array( 'Godkjente_revisjoner' ),
);

/** Sanskrit (संस्कृत) */
$specialPageAliases['sa'] = array(
	'ApprovedRevs' => array( 'अंगीकृत_पृष्टानि' ),
);

/** Turkish (Türkçe) */
$specialPageAliases['tr'] = array(
	'ApprovedRevs' => array( 'OnaylanmışRevizyonlar', 'OnaylanmışSayfalar', 'OnaylanmamışSayfalar' ),
);

/**
 * For backwards compatibility with MediaWiki 1.15 and earlier.
 */
$aliases =& $specialPageAliases;