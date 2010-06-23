<?php

if ( !defined( 'MEDIAWIKI' ) ) die();

/**
 * @file
 * @ingroup Extensions
 *
 * @author Yaron Koren
 */

define( 'APPROVED_REVS_VERSION', '0.1' );

// credits
$wgExtensionCredits['other'][] = array(
	'path'            => __FILE__,
	'name'            => 'Approved Revs',
	'version'         => APPROVED_REVS_VERSION,
	'author'          => 'Yaron Koren',
	'url'             => 'http://www.mediawiki.org/wiki/Extension:Approved_Revs',
	'descriptionmsg'  => 'approvedrevs-desc'
);

// global variables
$egApprovedRevsIP = dirname( __FILE__ ) . '/';
$egApprovedRevsExcludedNamespaces = array();

// internationalization
$wgExtensionMessagesFiles['ApprovedRevs'] = $egApprovedRevsIP . 'ApprovedRevs.i18n.php';
$wgExtensionAliasesFiles['ApprovedRevs'] = $egApprovedRevsIP . 'ApprovedRevs.alias.php';

// register all classes
$wgAutoloadClasses['ApprovedRevs'] = $egApprovedRevsIP . 'ApprovedRevs_body.php';
$wgAutoloadClasses['ApprovedRevsHooks'] = $egApprovedRevsIP . 'ApprovedRevs.hooks.php';
$wgSpecialPages['ApprovedPages'] = 'ARApprovedPages';
$wgAutoloadClasses['ARApprovedPages'] = $egApprovedRevsIP . 'AR_ApprovedPages.php';
$wgSpecialPageGroups['ApprovedPages'] = 'pages';

// hooks
$wgHooks['ParserBeforeInternalParse'][] = 'ApprovedRevsHooks::setApprovedRevForParsing';
$wgHooks['ArticleFromTitle'][] = 'ApprovedRevsHooks::showApprovedRevision';
$wgHooks['DisplayOldSubtitle'][] = 'ApprovedRevsHooks::setSubtitle';
$wgHooks['SkinTemplateNavigation'][] = 'ApprovedRevsHooks::changeEditLink';
$wgHooks['PageHistoryBeforeList'][] = 'ApprovedRevsHooks::storeApprovedRevisionForHistoryPage';
$wgHooks['PageHistoryLineEnding'][] = 'ApprovedRevsHooks::addApprovalLink';
$wgHooks['UnknownAction'][] = 'ApprovedRevsHooks::setAsApproved';
$wgHooks['UnknownAction'][] = 'ApprovedRevsHooks::unsetAsApproved';
$wgHooks['BeforeParserFetchTemplateAndtitle'][] = 'ApprovedRevsHooks::setTranscludedPageRev';
$wgHooks['ArticleDeleteComplete'][] = 'ApprovedRevsHooks::deleteRevisionApproval';
$wgHooks['AdminLinks'][] = 'ApprovedRevsHooks::addToAdminLinks';
$wgHooks['LoadExtensionSchemaUpdates'][] = 'ApprovedRevsHooks::onLoadExtensionSchemaUpdates';

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
