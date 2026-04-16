<?php

/**
 * This script removes approvals from pages and/or files that are no longer
 * approvable.
 *
 * Usage:
 *  php removeInvalidApprovals.php [--namespace namespaceList] [--dry-run]
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
 * @author Naresh Kumar Babu
 * @ingroup Maintenance
 */

use MediaWiki\Title\Title;

// Allow people to have different layouts.
if ( !isset( $IP ) ) {
	$IP = __DIR__ . '/../../../';
	if ( getenv( 'MW_INSTALL_PATH' ) ) {
		$IP = getenv( 'MW_INSTALL_PATH' );
	}
}

require_once "$IP/maintenance/Maintenance.php";

class RemoveInvalidApprovals extends Maintenance {

	public function __construct() {
		parent::__construct();

		$this->addDescription(
			"Remove approvals from pages and files that are no longer " .
			"approvable."
		);
		$this->addOption(
			'namespace',
			'Limit to this comma-separated list of namespace numbers.' .
			'If not specified, all namespaces are processed.',
			false,
			true
		);
		$this->addOption(
			'dry-run',
			'List the Pages/Files for which approvals would be removed. But do not actually remove approvals.'
		);

		if ( method_exists( $this, 'requireExtension' ) ) {
			$this->requireExtension( 'Approved Revs' );
		}
	}

	public function execute() {
		$isDryRun = $this->hasOption( 'dry-run' );

		$namespaces = null;
		if ( $this->hasOption( 'namespace' ) ) {
			$namespaces = array_map(
				'intval',
				explode( ',', $this->getOption( 'namespace' ) )
			);
		}

		$pagesRemoved = $this->removeInvalidPageApprovals( $isDryRun, $namespaces );
		$filesRemoved = $this->removeInvalidFileApprovals( $isDryRun, $namespaces );

		$total = $pagesRemoved + $filesRemoved;

		if ( $isDryRun ) {
			$this->output( "\nDry run complete. " .
				"$total approval(s) would be removed " .
				"($pagesRemoved page(s), $filesRemoved file(s)).\n" );
		} else {
			$this->output( "\nDone. Removed $total invalid approval(s) " .
				"($pagesRemoved page(s), $filesRemoved file(s)).\n" );
		}
	}

	/**
	 * Remove approvals from pages that are no longer approvable.
	 *
	 * @param bool $isDryRun
	 * @param int[]|null $namespaces
	 * @return int Number of approvals removed (or that would be removed).
	 */
	private function removeInvalidPageApprovals( bool $isDryRun, ?array $namespaces ): int {
		$dbr = ApprovedRevs::getReadDB();

		$conds = [];
		if ( $namespaces !== null ) {
			$pageNamespaces = array_filter(
				$namespaces,
				static fn ( $ns ) => $ns !== NS_FILE
			);
			if ( $pageNamespaces === [] ) {
				return 0;
			}
			$conds['p.page_namespace'] = $pageNamespaces;
		} else {
			// Exclude NS_FILE pages
			$conds[] = 'p.page_namespace != ' . NS_FILE;
		}

		$rows = $dbr->newSelectQueryBuilder()
			->from( 'approved_revs', 'ar' )
			->join( 'page', 'p', 'ar.page_id = p.page_id' )
			->fields( [ 'p.page_id', 'p.page_namespace', 'p.page_title' ] )
			->where( $conds )
			->caller( __METHOD__ )
			->fetchResultSet();

		$count = 0;
		foreach ( $rows as $row ) {
			$title = Title::newFromID( $row->page_id );
			if ( $title === null ) {
				$this->output( wfTimestamp( TS_DB ) .
					" Removing approval for deleted page (ID {$row->page_id}).\n" );
				if ( !$isDryRun ) {
					ApprovedRevs::unsetApprovalInDB(
						Title::makeTitle( $row->page_namespace, $row->page_title )
					);
				}
				$count++;
				continue;
			}

			if ( ApprovedRevs::pageIsApprovable( $title ) ) {
				continue;
			}

			$this->output( wfTimestamp( TS_DB ) .
				' ' . ( $isDryRun ? '[dry-run] Would remove' : 'Removing' ) .
				' invalid approval from page "' . $title->getFullText() . "\".\n" );

			if ( !$isDryRun ) {
				ApprovedRevs::unsetApprovalInDB( $title );
			}
			$count++;
		}

		return $count;
	}

	/**
	 * Remove approvals from files that are no longer approvable.
	 *
	 * @param bool $isDryRun
	 * @param int[]|null $namespaces
	 * @return int Number of approvals removed (or that would be removed).
	 */
	private function removeInvalidFileApprovals( bool $isDryRun, ?array $namespaces ): int {
		if ( $namespaces !== null && !in_array( NS_FILE, $namespaces ) ) {
			return 0;
		}

		$dbr = ApprovedRevs::getReadDB();

		$rows = $dbr->newSelectQueryBuilder()
			->from( 'approved_revs_files', 'ar' )
			->leftJoin( 'page', 'p', 'ar.file_title = p.page_title AND p.page_namespace = ' . NS_FILE )
			->fields( [ 'p.page_id', 'ar.file_title' ] )
			->caller( __METHOD__ )
			->fetchResultSet();

		$count = 0;
		foreach ( $rows as $row ) {
			$title = Title::newFromID( $row->page_id );
			if ( $title === null ) {
				$title = Title::makeTitle( NS_FILE, $row->file_title );
				$this->output( wfTimestamp( TS_DB ) .
					" Removing approval for deleted file \"{$row->file_title}\".\n" );
				if ( !$isDryRun ) {
					ApprovedRevs::unsetApprovedFileInDB( $title, new User() );
				}
				$count++;
				continue;
			}

			if ( ApprovedRevs::fileIsApprovable( $title ) ) {
				continue;
			}

			$this->output( wfTimestamp( TS_DB ) .
				' ' . ( $isDryRun ? '[dry-run] Would remove' : 'Removing' ) .
				' invalid approval from file "' . $title->getFullText() . "\".\n" );

			if ( !$isDryRun ) {
				ApprovedRevs::unsetApprovedFileInDB( $title, new User() );
			}
			$count++;
		}

		return $count;
	}

}

$maintClass = RemoveInvalidApprovals::class;
require_once RUN_MAINTENANCE_IF_MAIN;
