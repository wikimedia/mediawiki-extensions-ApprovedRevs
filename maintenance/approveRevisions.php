<?php

/**
 * This script approves all current revisions.
 *
 * Usage:
 *  no parameters
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
 * @ingroup Maintenance
 */

require_once( dirname( __FILE__ ) . '/../../maintenance/Maintenance.php' );

class ApproveRevisions extends Maintenance {
	
	public function __construct() {
		parent::__construct();
		
		$this->mDescription = "Approve all current revisions";
	}
	
	public function execute() {
		
		$dbr = wfGetDB( DB_SLAVE );
		
		$pages = $dbr->select(
			'page',
			array(
				'page_id',
				'page_latest'
			)
		); 
		
		while ( $page = $pages->fetchObject() ) {
			$title = Title::newFromID( $page->page_id );
			ApprovedRevs::setApprovedRevID( $title, $page->page_latest );
			$this->output( "\n" . wfTimestamp( TS_DB ) . ' Page ' . $title->getFullText() . ' now has ' . $page->page_latest . ' as approved revision.' );
		}
		
		
		$this->output( "\n Finished setting all current revisions to approved. \n" );
	}
	
}

$maintClass = "ApproveRevisions";
require_once( DO_MAINTENANCE );