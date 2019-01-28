<?php

if ( version_compare( $GLOBALS['wgVersion'], '1.27c', '>' ) ) {
	wfLoadExtension( 'ApprovedRevs' );
	// Keep i18n globals so mergeMessageFileList.php doesn't break
	$GLOBALS['wgMessagesDirs']['ApprovedRevs'] = __DIR__ . '/i18n';
	$GLOBALS['wgExtensionMessagesFiles']['ApprovedRevsAlias'] = __DIR__ . '/ApprovedRevs.alias.php';
	$GLOBALS['wgExtensionMessagesFiles']['ApprovedRevsMagic'] = __DIR__ . '/ApprovedRevs.i18n.magic.php';
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

define( 'APPROVED_REVS_VERSION', '1.0' );

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

$egApprovedRevsEnabledNamespaces = array(
	NS_MAIN => true,
	NS_USER => true,
	NS_PROJECT => true,
	NS_FILE => true,
	NS_TEMPLATE => true,
	NS_HELP => true,
);

$egApprovedRevsSelfOwnedNamespaces = array();
$egApprovedRevsBlankIfUnapproved = false;
$egApprovedRevsAutomaticApprovals = true;
$egApprovedRevsShowApproveLatest = false;
$egApprovedRevsShowNotApprovedMessage = false;

// internationalization
$wgMessagesDirs['ApprovedRevs'] = __DIR__ . '/i18n';
$wgExtensionMessagesFiles['ApprovedRevsAlias'] = $egApprovedRevsIP . 'ApprovedRevs.alias.php';
$wgExtensionMessagesFiles['ApprovedRevsMagic'] = $egApprovedRevsIP . 'ApprovedRevs.i18n.magic.php';

// register all classes
$wgAutoloadClasses['ApprovedRevs'] = $egApprovedRevsIP . 'includes/ApprovedRevs_body.php';
$wgAutoloadClasses['ApprovedRevsHooks'] = $egApprovedRevsIP . 'includes/ApprovedRevs.hooks.php';
$wgSpecialPages['ApprovedRevs'] = 'SpecialApprovedRevs';
$wgAutoloadClasses['SpecialApprovedRevs'] = $egApprovedRevsIP . 'includes/SpecialApprovedRevs.php';
$wgAutoloadClasses['SpecialApprovedRevsPage'] = $egApprovedRevsIP . 'includes/SpecialApprovedRevsPage.php';
$wgAutoloadClasses['ApiApprove'] = $egApprovedRevsIP . 'includes/ApiApprove.php';
$wgAutoloadClasses['ARApproveAction'] = $egApprovedRevsIP . 'includes/AR_ApproveAction.php';
$wgAutoloadClasses['ARUnapproveAction'] = $egApprovedRevsIP . 'includes/AR_UnapproveAction.php';
$wgAutoloadClasses['ARApproveFileAction'] = $egApprovedRevsIP . 'includes/AR_ApproveFileAction.php';
$wgAutoloadClasses['ARUnapproveFileAction'] = $egApprovedRevsIP . 'includes/AR_UnapproveFileAction.php';
$wgAutoloadClasses['ARParserFunctions'] = $egApprovedRevsIP . 'includes/AR_ParserFunctions.php';

// actions
$wgActions['approve'] = 'ARApproveAction';
$wgActions['unapprove'] = 'ARUnapproveAction';
$wgActions['approvefile'] = 'ARApproveFileAction';
$wgActions['unapprovefile'] = 'ARUnapproveFileAction';

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
$wgHooks['DiffRevisionTools'][] = 'ApprovedRevsHooks::addApprovalDiffLink';
$wgHooks['BeforeParserFetchTemplateAndtitle'][] = 'ApprovedRevsHooks::setTranscludedPageRev';
$wgHooks['ArticleDeleteComplete'][] = 'ApprovedRevsHooks::deleteRevisionApproval';
$wgHooks['MagicWordwgVariableIDs'][] = 'ApprovedRevsHooks::addMagicWordVariableIDs';
$wgHooks['ParserBeforeTidy'][] = 'ApprovedRevsHooks::handleMagicWords';
$wgHooks['ParserFirstCallInit'][] = 'ApprovedRevsHooks::registerFunctions';
$wgHooks['AdminLinks'][] = 'ApprovedRevsHooks::addToAdminLinks';
$wgHooks['LoadExtensionSchemaUpdates'][] = 'ApprovedRevsHooks::describeDBSchema';
$wgHooks['EditPage::showEditForm:initial'][] = 'ApprovedRevsHooks::addWarningToEditPage';
$wgHooks['PageForms::HTMLBeforeForm'][] = 'ApprovedRevsHooks::addWarningToPFForm';
$wgHooks['ArticleViewHeader'][] = 'ApprovedRevsHooks::setArticleHeader';
$wgHooks['ArticleViewHeader'][] = 'ApprovedRevsHooks::displayNotApprovedHeader';
$wgHooks['OutputPageBodyAttributes'][] = 'ApprovedRevsHooks::addBodyClass';
$wgHooks['wgQueryPages'][] = 'ApprovedRevsHooks::onwgQueryPages';

// Approved File Revisions
$wgHooks['ImagePageFileHistoryLine'][] = 'ApprovedRevsHooks::onImagePageFileHistoryLine';
$wgHooks['BeforeParserFetchFileAndTitle'][] = 'ApprovedRevsHooks::modifyFileLinks';
$wgHooks['ImagePageFindFile'][] = 'ApprovedRevsHooks::onImagePageFindFile';
$wgHooks['FileDeleteComplete'][] = 'ApprovedRevsHooks::onFileDeleteComplete';


// logging
$wgLogTypes['approval'] = 'approval';
$wgLogNames['approval'] = 'approvedrevs-logname';
$wgLogHeaders['approval'] = 'approvedrevs-logdesc';
$wgLogActions['approval/approve'] = 'approvedrevs-approveaction';
$wgLogActions['approval/approvefile'] = 'approvedrevs-approvefileaction';
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
