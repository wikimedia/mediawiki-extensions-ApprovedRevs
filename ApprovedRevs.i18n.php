<?php
/**
 * Internationalization file for the Approved Revs extension.
 *
 * @file
 * @ingroup Extensions
*/

$messages = array();

/** English
 * @author Yaron Koren
 */
$messages['en'] = array(
	// user messages
	'approvedrevs-desc' => 'Set a single revision of a page as approved',
	'approvedrevs-logname' => 'Revision approval log',
	'approvedrevs-logdesc' => 'This is the log of revisions that have been approved.',
	'approvedrevs-approve' => 'approve',
	'approvedrevs-unapprove' => 'unapprove',
	'approvedrevs-approvesuccess' => 'This revision of the page has been set as the approved version.',
	'approvedrevs-unapprovesuccess' => 'There is no longer an approved version for this page.
Instead, the most recent revision will be shown.',
	'approvedrevs-approveaction' => 'set $2 as the approved revision for "[[$1]]"',
	'approvedrevs-unapproveaction' => 'unset approved revision for "[[$1]]"',
	'approvedrevs-notlatest' => 'This is the approved revision of this page; it is not the most recent.',
	'approvedrevs-approvedandlatest' => 'This is the approved revision of this page, as well as being the most recent.',
	'approvedrevs-viewlatest' => 'View most recent revision.',
	'approvedpages' => 'Approved pages',
	'approvedrevs-approvedpages-docu' => 'The following are the pages in the wiki that have an approved revision.',
	'right-approverevisions' => 'Set a certain revision of a wiki page as approved',
	'right-viewlinktolatest' => 'View explanatory text at the top of pages that have an approved revision',
);

/** Belarusian (Taraškievica orthography) (Беларуская (тарашкевіца))
 * @author Wizardist
 */
$messages['be-tarask'] = array(
	'approvedrevs-logdesc' => 'Тут месьціцца журнал прынятых рэвізіяў.',
	'approvedrevs-approve' => 'зацьвердзіць',
	'approvedrevs-unapprove' => 'адхіліць',
);

/** Dutch (Nederlands)
 * @author Siebrand
 */
$messages['nl'] = array(
	'approvedrevs-desc' => 'Een versie van een pagina als goedgekeurd instellen',
	'approvedrevs-logname' => 'Logboek versiegoedkeuring',
	'approvedrevs-logdesc' => 'Dit is het logboek met de versies die zijn goedgekeurd.',
	'approvedrevs-approve' => 'goedkeuren',
	'approvedrevs-unapprove' => 'afkeuren',
	'approvedrevs-approvesuccess' => 'Deze versie van de pagina is ingesteld als de goedgekeurde versie.',
	'approvedrevs-unapprovesuccess' => 'Deze pagina heeft niet langer een goedgekeurde versie.
Daarom wordt de laatste versie weergegeven.',
	'approvedrevs-approveaction' => 'heeft $2 ingesteld als de goedgekeurde versie voor "[[$1]]"',
	'approvedrevs-unapproveaction' => 'heeft de goedgekeurde versie verwijderd voor "[[$1]]"',
	'approvedrevs-notlatest' => 'Dit is de goedgekeurde versie van deze pagina.
Het is niet de meeste recente versie.',
	'approvedrevs-approvedandlatest' => 'Dit is de goedgekeurde versie van deze pagina. Er is geen nieuwere versie.',
	'approvedrevs-viewlatest' => 'Laatste versie bekijken',
	'approvedpages' => "Goedgekeurde pagina's",
	'approvedrevs-approvedpages-docu' => "De volgende pagina's in de wiki hebben een goedgekeurde versie.",
	'right-approverevisions' => 'Een versie van een wikipagina markeren als goedgekeurd.',
	'right-viewlinktolatest' => "De verklarende tekst bovenaan pagina's zien die die een goedgekeurde versie hebben",
);

