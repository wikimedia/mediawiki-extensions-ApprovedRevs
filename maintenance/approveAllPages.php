<?php

/**
 * This script approves the current revision of all pages that are in an
 * approvable namespace, and do not already have an approved revision.
 *
 * Usage:
 *  php approveAllPages.php [--force] [--namespaces namespaceList] [--username username]
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
 * http://www.gnu.org/copyleft/gpl.html
 *
 * @author Jeroen De Dauw
 * @author Yaron Koren
 * @ingroup Maintenance
 */

use MediaWiki\MediaWikiServices;
use MediaWiki\Title\Title;

// Allow people to have different layouts.
if ( !isset( $IP ) ) {
	$IP = __DIR__ . '/../../../';
	if ( getenv( 'MW_INSTALL_PATH' ) ) {
		$IP = getenv( 'MW_INSTALL_PATH' );
	}
}

require_once "$IP/maintenance/Maintenance.php";

class ApproveAllPages extends Maintenance {

	public function __construct() {
		parent::__construct();

		$this->addDescription( "Approve the current revision of all pages " .
			"that do not yet have an approved revision." );
		$this->addOption(
			"force", "Approve the latest version, even if an earlier "
			. "revision of the page has already been approved."
		);
		$this->addOption( 'namespaces', 'Limit to this comma-separated list of namespace numbers.',
			false, true );

		$this->addOption(
			"username", "The username to use for all the approval actions."
		);
		if ( method_exists( $this, 'requireExtension' ) ) {
			$this->requireExtension( 'Approved Revs' );
		}
	}

	public function execute() {
		// phpcs:ignore MediaWiki.Usage.DeprecatedGlobalVariables.Deprecated$wgTitle
		global $wgTitle;
		global $wgEnotifWatchlist;

		if ( $this->hasOption( 'namespaces' ) ) {
			$allowedNamespaces = explode( ',', $this->getOption( 'namespaces' ) );
		} else {
			$allowedNamespaces = null;
		}

		// Don't send out any notifications about people's watch lists.
		$wgEnotifWatchlist = false;

		$dbr = ApprovedRevs::getReadDB();

		$pages = $dbr->select(
			'page',
			[
				'page_id',
				'page_latest'
			],
			[],
			__METHOD__
		);

		foreach ( $pages as $page ) {
			$title = Title::newFromID( $page->page_id );
			// Some extensions, like Page Forms, need $wgTitle
			// set as well for these checks.
			$wgTitle = $title;

			if ( $allowedNamespaces !== null ) {
				if ( !in_array( $title->getNamespace(), $allowedNamespaces ) ) {
					continue;
				}
			}

			if ( !ApprovedRevs::pageIsApprovable( $title ) ) {
				continue;
			}
			$approvedRevID = ApprovedRevs::getApprovedRevID( $title );
			$latestRevID = $page->page_latest;
			if ( $this->getOption( "force" ) ) {
				if ( $latestRevID == $approvedRevID ) {
					continue;
				}
			} else {
				if ( $approvedRevID != null ) {
					continue;
				}
			}

			if ( $this->hasOption( 'username' ) ) {
				$username = $this->getOption( 'username' );
				$user = MediaWikiServices::getInstance()->getUserFactory()->newFromName( $username );
				if ( $user == null || !$user->isRegistered() ) {
					print "Error: \"$username\" is not a valid username.\n";
					return;
				}
			} else {
				$user = new User();
			}

			// Let's approve the latest revision...
			ApprovedRevs::setApprovedRevID(
				$title, $latestRevID, $user, true
			);

			$this->output( wfTimestamp( TS_DB ) .
				' Approved the last revision of page "' .
				$title->getFullText() . "\".\n" );
		}

		if ( $allowedNamespaces == null ) {
			$this->output( "\n Finished setting all current " .
				"revisions to approved. \n" );
		} else {
			$this->output( "\n Finished setting specified " .
				"revisions to approved. \n" );
		}
	}

}

$maintClass = ApproveAllPages::class;
require_once RUN_MAINTENANCE_IF_MAIN;
