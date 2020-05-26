<?php

use MediaWiki\MediaWikiServices;

/**
 * Special page that displays various lists of pages that either do or do
 * not have an approved revision.
 *
 * @author Yaron Koren
 */
class SpecialApprovedRevs extends QueryPage {

	protected $mMode;

	function __construct() {
		parent::__construct( 'ApprovedRevs' );
		$request = $this->getRequest();
		$this->mMode = $request->getVal( 'show' );
	}

	// These two arrays pair mode with messages. E.g. mode "approvedpages"
	// is used to generate a header link with query string having "show=approvedpages"
	// and link text of "All pages with an approved revision" (in English).
	protected $mPageHeaderLinks = [
		'approvedrevs-notlatestpages'     => '',
		'approvedrevs-unapprovedpages'    => 'unapproved',
		'approvedrevs-approvedpages'      => 'all',
		'approvedrevs-invalidpages'       => 'invalid',
	];
	protected $mFileHeaderLinks = [
		'approvedrevs-notlatestfiles'     => 'notlatestfiles',
		'approvedrevs-unapprovedfiles'    => 'unapprovedfiles',
		'approvedrevs-approvedfiles'      => 'approvedfiles',
		'approvedrevs-invalidfiles'       => 'invalidfiles',
	];

	protected static $repo;

	function isExpensive() {
		return false;
	}

	function isSyndicated() {
		return false;
	}

	function getPageHeader() {
		global $egApprovedRevsEnabledNamespaces;

		// Show the page approval links, with the one
		// corresponding to the current "mode" not being linked.
		$navLinks = [];
		foreach ( $this->mPageHeaderLinks as $msg => $mode ) {
			$navLinks[] = $this->createHeaderLink( $msg, $mode );
		}
		// Also add the file approval links, but only if there have
		// been any file approvals.
		if (
			isset( $egApprovedRevsEnabledNamespaces[NS_FILE] )
			&& $egApprovedRevsEnabledNamespaces[NS_FILE]
		) {
			$dbr = wfGetDB( DB_REPLICA );
			$result = $dbr->selectField( 'approved_revs_files', 'COUNT(*)' );
			if ( $result > 0 ) {
				foreach ( $this->mFileHeaderLinks as $msg => $mode ) {
					$navLinks[] = $this->createHeaderLink( $msg, $mode );
				}
			}
		}

		$navLine = $this->msg( 'approvedrevs-view' )->text() . ' ' . implode( ' | ', $navLinks );
		$header = Xml::tags( 'p', null, $navLine ) . "\n";

		return Xml::tags(
			'div', [ 'class' => 'specialapprovedrevs-header' ], $header
		);
	}

	/**
	 * Generate links for header. For current mode, generate non-link bold
	 * text.
	 */
	public function createHeaderLink( $msg, $mode ) {
		if ( $this->mMode == $mode ) {
			return Html::element( 'strong',
				null,
				$this->msg( $msg )->text()
			);
		} else {
			$approvedPagesTitle = SpecialPage::getTitleFor( $this->getName() );
			$show = ( $mode == '' ) ? [] : [ 'show' => $mode ];
			return Html::element( 'a',
				[ 'href' => $approvedPagesTitle->getLocalURL( $show ) ],
				$this->msg( $msg )->text()
			);
		}
	}

	/**
	 * Set parameters for standard navigation links.
	 * i.e. Applies mode to next/prev links when paging through list, etc.
	 */
	function linkParameters() {
		// Optionally could validate $this->mMode against the two
		// link arrays.
		return $this->mMode == '' ? [] : [ 'show' => $this->mMode ];
	}

	function getPageFooter() {
	}

	public static function getNsConditionPart( $ns ) {
		return 'p.page_namespace = ' . $ns;
	}

	function getQueryInfo() {
		// SQL for page revision approvals versus file revision approvals is
		// significantly different. Easier to follow if broken into two functions.
		if ( in_array(
			$this->mMode,
			[ 'notlatestfiles', 'unapprovedfiles', 'approvedfiles', 'invalidfiles' ]
		) ) {
			return ApprovedRevs::getQueryInfoFileApprovals( $this->mMode );
		} else {
			return ApprovedRevs::getQueryInfoPageApprovals( $this->mMode );
		}
	}

	function getOrder() {
		return ' ORDER BY p.page_namespace, p.page_title ASC';
	}

	function getOrderFields() {
		return [ 'p.page_namespace', 'p.page_title' ];
	}

	function sortDescending() {
		return false;
	}

	function formatResult( $skin, $result ) {
		// SQL for page revision approvals versus file revision approvals is
		// significantly different. Easier to follow if broken into two functions.
		if ( in_array(
			$this->mMode,
			[ 'notlatestfiles', 'unapprovedfiles', 'approvedfiles', 'invalidfiles' ]
		) ) {
			return $this->formatResultFileApprovals( $skin, $result );
		} else {
			return $this->formatResultPageApprovals( $skin, $result );
		}
	}

	public function formatResultPageApprovals( $skin, $result ) {
		$title = Title::newFromId( $result->id );
		if ( $title === null ) {
			return false;
		}

		if ( !ApprovedRevs::pageIsApprovable( $title ) && $this->mMode !== 'invalid' ) {
			return false;
		}

		$context = $skin->getContext();
		$user = $context->getUser();
		$out = $context->getOutput();
		$lang = $context->getLanguage();
		$linkRenderer = $this->getLinkRenderer();

		// Create page link - special handling for redirects.
		$params = [];
		if ( $title->isRedirect() ) {
			$params['redirect'] = 'no';
		}
		$pageLink = $linkRenderer->makeLink( $title, null, [], $params );
		if ( $title->isRedirect() ) {
			$pageLink = "<em>$pageLink</em>";
		}

		if ( $this->mMode == 'all' ) {
			$additionalInfo = Xml::element( 'span',
				[
					'class' => $result->rev_id == $result->latest_id ? 'approvedRevIsLatest' : 'approvedRevNotLatest'
				],
				$this->msg( 'approvedrevs-revisionnumber', $result->rev_id )->text()
			);

			// Get data on the most recent approval from the
			// 'approval' log, and display it if it's there.
			$loglist = new LogEventsList( $out->getSkin(), $out );
			$pager = new LogPager( $loglist, 'approval', '', $title->getText() );
			$pager->mLimit = 1;
			$pager->doQuery();
			$row = $pager->mResult->fetchObject();

			if ( !empty( $row ) ) {
				$timestamp = $lang->timeanddate( wfTimestamp( TS_MW, $row->log_timestamp ), true );
				$date = $lang->date( wfTimestamp( TS_MW, $row->log_timestamp ), true );
				$time = $lang->time( wfTimestamp( TS_MW, $row->log_timestamp ), true );
				$userLink = Linker::userLink( $row->log_user, $row->user_name );
				$additionalInfo .= ', ' . $this->msg(
					'approvedrevs-approvedby',
					$userLink,
					$timestamp,
					$row->user_name,
					$date,
					$time
				)->text();
			}

			return "$pageLink ($additionalInfo)";
		} elseif ( $this->mMode == 'unapproved' ) {
			global $egApprovedRevsShowApproveLatest;

			$line = $pageLink;
			if ( $egApprovedRevsShowApproveLatest &&
				ApprovedRevs::checkPermission( $user, $title, 'approverevisions' ) ) {
				$line .= ' (' . Xml::element( 'a',
					[ 'href' => $title->getLocalUrl(
						[
							'action' => 'approve',
							'oldid' => $result->latest_id
						]
					) ],
					$this->msg( 'approvedrevs-approvelatest' )->text()
				) . ')';
			}

			return $line;
		} elseif ( $this->mMode == 'invalid' ) {
			return $pageLink;
		} else { // approved revision is not latest
			$diffLink = Xml::element( 'a',
				[ 'href' => $title->getLocalUrl(
					[
						'diff' => $result->latest_id,
						'oldid' => $result->rev_id
					]
				) ],
				$this->msg( 'approvedrevs-difffromlatest' )->text()
			);

			return "$pageLink ($diffLink)";
		}
	}

	public function formatResultFileApprovals( $skin, $result ) {
		$title = Title::makeTitle( NS_FILE, $result->title );

		if ( !self::$repo ) {
			if ( method_exists( MediaWikiServices::class, 'getRepoGroup' ) ) {
				// MediaWiki 1.34+
				self::$repo = MediaWikiServices::getInstance()->getRepoGroup();
			} else {
				self::$repo = RepoGroup::singleton();
			}
		}

		$pageLink = $this->getLinkRenderer()->makeLink( $title );

		#
		# mode: unapprovedfiles
		#
		if ( $this->mMode == 'unapprovedfiles' ) {
			global $egApprovedRevsShowApproveLatest;

			if ( $egApprovedRevsShowApproveLatest && ApprovedRevs::userCanApprove( $this->getUser(), $title ) ) {
				$approveLink = ' (' . Xml::element(
					'a',
					[
						'href' => $title->getLocalUrl(
							[
								'action' => 'approvefile',
								'ts' => $result->latest_ts,
								'sha1' => $result->latest_sha1
							]
						)
					],
					$this->msg( 'approvedrevs-approve' )->text()
				) . ')';
			} else {
				$approveLink = '';
			}

			return "$pageLink$approveLink";

		#
		# mode: invalidfiles
		#
		} elseif ( $this->mMode == 'invalidfiles' ) {

			if ( !ApprovedRevs::fileIsApprovable( $title ) ) {
				// if showing invalid files only, don't show files
				// that have real approvability
				return '';
			}

			return $pageLink;

		#
		# mode: approvedfiles
		#
		} elseif ( $this->mMode == 'approvedfiles' ) {
			global $wgOut, $wgLang;

			$additionalInfo = Html::rawElement( 'span',
				[
					'class' =>
						( $result->approved_sha1 == $result->latest_sha1
							&& $result->approved_ts == $result->latest_ts
						) ? 'approvedRevIsLatest' : 'approvedRevNotLatest'
				],
				$this->msg(
					'approvedrevs-uploaddate',
					wfTimestamp( TS_RFC2822, $result->approved_ts )
				)->parse()
			);

			// Get data on the most recent approval from the
			// 'approval' log, and display it if it's there.
			$loglist = new LogEventsList( $skin, $wgOut );
			$pager = new LogPager( $loglist, 'approval', '', $title );
			$pager->mLimit = 1;
			$pager->doQuery();

			$result = $pager->getResult();
			$row = $result->fetchObject();

			if ( !empty( $row ) ) {
				$timestamp = $wgLang->timeanddate(
					wfTimestamp( TS_MW, $row->log_timestamp ), true
				);
				$date = $wgLang->date(
					wfTimestamp( TS_MW, $row->log_timestamp ), true
				);
				$time = $wgLang->time(
					wfTimestamp( TS_MW, $row->log_timestamp ), true
				);
				$userLink = Linker::userLink( $row->log_user, $row->user_name );
				$additionalInfo .= ', ' . $this->msg(
					'approvedrevs-approvedby',
					$userLink,
					$timestamp,
					$row->user_name,
					$date,
					$time
				)->text();
			}

			return "$pageLink ($additionalInfo)";

		#
		# mode: notlatestfiles
		#
		} elseif ( $this->mMode == 'notlatestfiles' ) {

			$approved_file = self::$repo->findFileFromKey(
				$result->approved_sha1,
				[ 'time' => $result->approved_ts ]
			);
			$latest_file = self::$repo->findFileFromKey(
				$result->latest_sha1,
				[ 'time' => $result->latest_ts ]
			);

			$approvedLink = Xml::element( 'a',
				[ 'href' => $approved_file->getUrl() ],
				$this->msg( 'approvedrevs-approvedfile' )->text()
			);
			$latestLink = Xml::element( 'a',
				[ 'href' => $latest_file->getUrl() ],
				$this->msg( 'approvedrevs-latestfile' )->text()
			);

			return "$pageLink ($approvedLink | $latestLink)";
		}
	}

	protected function getGroupName() {
		return 'pages';
	}

}
