<?php

if ( version_compare( $GLOBALS['wgVersion'], '1.27c', '>' ) ) {
	wfLoadExtension( 'ApprovedRevs' );
	// Keep i18n globals so mergeMessageFileList.php doesn't break
	$GLOBALS['wgMessagesDirs']['ApprovedRevs'] = __DIR__ . '/i18n';
	$GLOBALS['wgExtensionMessagesFiles']['ApprovedRevsAlias'] = __DIR__ . '/includes/ApprovedRevs.alias.php';
	$GLOBALS['wgExtensionMessagesFiles']['ApprovedRevsMagic'] = __DIR__ . '/includes/ApprovedRevs.i18n.magic.php';
	/* wfWarn(
		'Deprecated PHP entry point used for Approved Revs extension. ' .
		'Please use wfLoadExtension instead, ' .
		'see https://www.mediawiki.org/wiki/Extension_registration for more details.'
	); */
	return;
}

if ( !defined( 'MEDIAWIKI' ) ) die();

/**
 * @file
 * @ingroup Extensions
 *
 * @author Yaron Koren
 */

define( 'APPROVED_REVS_VERSION', '0.8' );

// credits
$wgExtensionCredits['other'][] = array(
	'path'            => __FILE__,
	'name'            => 'Approved Revs',
	'version'         => APPROVED_REVS_VERSION,
	'author'          => array( 'Yaron Koren', '...' ),
	'url'             => 'https://www.mediawiki.org/wiki/Extension:Approved_Revs',
	'descriptionmsg'  => 'approvedrevs-desc',
	'license-name'    => 'GPL-2.0-or-later'
);

// global variables
$egApprovedRevsIP = dirname( __FILE__ ) . '/';
$egApprovedRevsNamespaces = array( NS_MAIN, NS_USER, NS_PROJECT, NS_TEMPLATE, NS_HELP );
$egApprovedRevsSelfOwnedNamespaces = array();
$egApprovedRevsBlankIfUnapproved = false;
$egApprovedRevsAutomaticApprovals = true;
$egApprovedRevsShowApproveLatest = false;
$egApprovedRevsShowNotApprovedMessage = false;

// internationalization
$wgMessagesDirs['ApprovedRevs'] = __DIR__ . '/i18n';
$wgExtensionMessagesFiles['ApprovedRevsAlias'] = $egApprovedRevsIP . 'includes/ApprovedRevs.alias.php';
$wgExtensionMessagesFiles['ApprovedRevsMagic'] = $egApprovedRevsIP . 'includes/ApprovedRevs.i18n.magic.php';

// register all classes
$wgAutoloadClasses['ApprovedRevs'] = $egApprovedRevsIP . 'includes/ApprovedRevs_body.php';
$wgAutoloadClasses['ApprovedRevsHooks'] = $egApprovedRevsIP . 'includes/ApprovedRevs.hooks.php';
$wgSpecialPages['ApprovedRevs'] = 'SpecialApprovedRevs';
$wgAutoloadClasses['SpecialApprovedRevs'] = $egApprovedRevsIP . 'includes/SpecialApprovedRevs.php';
$wgAutoloadClasses['SpecialApprovedRevsPage'] = $egApprovedRevsIP . 'includes/SpecialApprovedRevsPage.php';
$wgAutoloadClasses['ApiApprove'] = $egApprovedRevsIP . 'includes/ApiApprove.php';
$wgAutoloadClasses['ARApproveAction'] = $egApprovedRevsIP . 'includes/AR_ApproveAction.php';
$wgAutoloadClasses['ARUnapproveAction'] = $egApprovedRevsIP . 'includes/AR_UnapproveAction.php';

// actions
$wgActions['approve'] = 'ARApproveAction';
$wgActions['unapprove'] = 'ARUnapproveAction';

// hooks
$wgHooks['ArticleEditUpdates'][] = 'ApprovedRevsHooks::updateLinksAfterEdit';
$wgHooks['PageContentSaveComplete'][] = 'ApprovedRevsHooks::setLatestAsApproved';
$wgHooks['PageContentSaveComplete'][] = 'ApprovedRevsHooks::setSearchText';
$wgHooks['SearchResultInitFromTitle'][] = 'ApprovedRevsHooks::setSearchRevisionID';
$wgHooks['PersonalUrls'][] = 'ApprovedRevsHooks::removeRobotsTag';
$wgHooks['ArticleFromTitle'][] = 'ApprovedRevsHooks::showApprovedRevision';
$wgHooks['ArticleAfterFetchContentObject'][] = 'ApprovedRevsHooks::showBlankIfUnapproved';
$wgHooks['DisplayOldSubtitle'][] = 'ApprovedRevsHooks::setSubtitle';
$wgHooks['SkinTemplateNavigation'][] = 'ApprovedRevsHooks::changeEditLink';
$wgHooks['PageHistoryBeforeList'][] = 'ApprovedRevsHooks::storeApprovedRevisionForHistoryPage';
$wgHooks['PageHistoryLineEnding'][] = 'ApprovedRevsHooks::addApprovalLink';
$wgHooks['BeforeParserFetchTemplateAndtitle'][] = 'ApprovedRevsHooks::setTranscludedPageRev';
$wgHooks['ArticleDeleteComplete'][] = 'ApprovedRevsHooks::deleteRevisionApproval';
$wgHooks['MagicWordwgVariableIDs'][] = 'ApprovedRevsHooks::addMagicWordVariableIDs';
$wgHooks['ParserBeforeTidy'][] = 'ApprovedRevsHooks::handleMagicWords';
$wgHooks['AdminLinks'][] = 'ApprovedRevsHooks::addToAdminLinks';
$wgHooks['LoadExtensionSchemaUpdates'][] = 'ApprovedRevsHooks::describeDBSchema';
$wgHooks['EditPage::showEditForm:initial'][] = 'ApprovedRevsHooks::addWarningToEditPage';
$wgHooks['PageForms::HTMLBeforeForm'][] = 'ApprovedRevsHooks::addWarningToPFForm';
$wgHooks['ArticleViewHeader'][] = 'ApprovedRevsHooks::setArticleHeader';
$wgHooks['ArticleViewHeader'][] = 'ApprovedRevsHooks::displayNotApprovedHeader';
$wgHooks['OutputPageBodyAttributes'][] = 'ApprovedRevsHooks::addBodyClass';
$wgHooks['wgQueryPages'][] = 'ApprovedRevsHooks::onwgQueryPages';

// logging
$wgLogTypes['approval'] = 'approval';
$wgLogNames['approval'] = 'approvedrevs-logname';
$wgLogHeaders['approval'] = 'approvedrevs-logdesc';
$wgLogActions['approval/approve'] = 'approvedrevs-approveaction';
$wgLogActions['approval/unapprove'] = 'approvedrevs-unapproveaction';

// user rights
$wgAvailableRights[] = 'approverevisions';
$wgGroupPermissions['sysop']['approverevisions'] = true;
$wgAvailableRights[] = 'viewlinktolatest';
$wgGroupPermissions['*']['viewlinktolatest'] = true;
$wgAvailableRights[] = 'viewapprover';
$wgGroupPermissions['sysop']['viewapprover'] = true;

// ResourceLoader modules
$wgResourceModules['ext.ApprovedRevs'] = array(
	'styles' => 'resources/ApprovedRevs.css',
	'localBasePath' => __DIR__,
	'remoteExtPath' => 'ApprovedRevs',
);

// API action modules
$wgAPIModules['approve'] = 'ApiApprove';
