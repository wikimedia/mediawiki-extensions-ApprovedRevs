<?php

/**
 * This script approves the current revision of all files in the wiki
 * that do not already have an approved revision.
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
 * @author Yaron Koren
 * @ingroup Maintenance
 */

use MediaWiki\MediaWikiServices;

// Allow people to have different layouts.
if ( !isset( $IP ) ) {
	$IP = __DIR__ . '/../../../';
	if ( getenv( 'MW_INSTALL_PATH' ) ) {
		$IP = getenv( 'MW_INSTALL_PATH' );
	}
}

require_once "$IP/maintenance/Maintenance.php";

class ApproveAllFiles extends Maintenance {

	public function __construct() {
		parent::__construct();

		$this->addDescription( "Approve the current revision of all files " .
			"that do not yet have an approved revision." );
		$this->addOption(
			"force", "Approve the latest version, even if an earlier "
			. "revision of the file has already been approved."
		);

		if ( method_exists( $this, 'requireExtension' ) ) {
			$this->requireExtension( 'Approved Revs' );
		}
	}

	public function execute() {
		global $wgEnotifWatchlist;
		global $egApprovedRevsEnabledNamespaces;

		// Exit quickly if NS_FILE is not approvable.
		if ( $egApprovedRevsEnabledNamespaces[NS_FILE] !== true ) {
			print "Approved Revs is not enabled for files on this wiki; exiting.\n";
			return;
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
			[ 'page_namespace = ' . NS_FILE ],
			__METHOD__
		);

		foreach ( $pages as $page ) {
			$title = Title::newFromID( $page->page_id );
			if ( !ApprovedRevs::fileIsApprovable( $title ) ) {
				continue;
			}
			$file = MediaWikiServices::getInstance()->getRepoGroup()->getLocalRepo()->newFile( $title );
			if ( !$file->exists() ) {
				continue;
			}

			[ $approvedTimestamp, $approvedSha1 ] = ApprovedRevs::getApprovedFileInfo( $title );
			$fileTimestamp = $file->getTimestamp();
			$fileSha1 = $file->getSha1();
			if ( $this->getOption( "force" ) ) {
				if ( $fileTimestamp == $approvedTimestamp ) {
					continue;
				}
			} else {
				if ( $approvedTimestamp != null ) {
					continue;
				}
			}

			// Let's approve the latest revision...
			// fixme: the user here is empty - use a system user?
			ApprovedRevs::setApprovedFileInDB(
				$title, $fileTimestamp, $fileSha1, new User()
			);

			$this->output( wfTimestamp( TS_DB ) .
				' Approved the last revision of the file "' .
				$title->getFullText() . "\".\n" );
		}

		$this->output( "\n Finished setting all current " .
			"revisions to approved. \n" );
	}

}

$maintClass = ApproveAllFiles::class;
require_once RUN_MAINTENANCE_IF_MAIN;
