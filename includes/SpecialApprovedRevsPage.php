<?php

/**
 * Special page that displays various lists of pages that either do or do
 * not have an approved revision.
 *
 * @author Yaron Koren
 */
class SpecialApprovedRevsPage extends QueryPage {

	protected $mMode;

	/**
	 * @var Array $mHeaderLinks: pairs mode with messages. E.g. mode "approvedfiles"
	 *      used to generate a header link with query string having "show=approvedfiles"
	 *      and link text of "All files with an approved revision" (in English).
	 */
	protected $mHeaderLinks = array(

		// for approved page revs
		'approvedrevs-notlatestpages'     => '',
		'approvedrevs-unapprovedpages'    => 'unapproved',
		'approvedrevs-approvedpages'      => 'all',
		'approvedrevs-invalidpages'       => 'invalid',

		// for approved file revs
		'approvedrevs-notlatestfiles'     => 'notlatestfiles',
		'approvedrevs-unapprovedfiles'    => 'unapprovedfiles',
		'approvedrevs-approvedfiles'      => 'approvedfiles',
		'approvedrevs-invalidfiles'       => 'invalidfiles',
	);
	protected static $repo;


	public function __construct( $mode ) {
		if ( $this instanceof SpecialPage ) {
			parent::__construct( 'ApprovedRevs' );
		}
		$this->mMode = $mode;
	}

	function getName() {
		return 'ApprovedRevs';
	}

	function isExpensive() { return false; }

	function isSyndicated() { return false; }

	function getPageHeader() {

		// show the names of the four lists of pages, with the one
		// corresponding to the current "mode" not being linked
		$navLinks = array();
		foreach ( $this->mHeaderLinks as $msg => $queryParam ) {
			$navLinks[] = $this->createHeaderLink( $msg, $queryParam );
		}

		$navLine = wfMessage( 'approvedrevs-view' )->text() . ' ' . implode(' | ', $navLinks);
		$header = Xml::tags( 'p', null, $navLine ) . "\n";

		return Xml::tags(
			'div', array( 'class' => 'specialapprovedrevs-header' ), $header
		);

	}

	/**
	 * Generate links for header. For current mode, generate non-link bold text.
	 */
	public function createHeaderLink( $msg, $queryParam ) {
		$approvedPagesTitle = SpecialPage::getTitleFor( $this->getName() );
		if ( $this->mMode == $queryParam ) {
			return Xml::element( 'strong',
				null,
				wfMessage( $msg )->text()
			);
		} else {
			$show = ( $queryParam == '' ) ? array() : array( 'show' => $queryParam );
			return Xml::element( 'a',
				array( 'href' => $approvedPagesTitle->getLocalURL( $show ) ),
				wfMessage( $msg )->text()
			);
		}
	}

	/**
	 * Set parameters for standard navigation links.
	 * i.e. Applies mode to next/prev links when paging through list, etc.
	 */
	function linkParameters() {
		// optionally could validate $this->mMode against $this->mHeaderLinks
		return $this->mMode == '' ? array() : array( 'show' => $this->mMode );
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
			array( 'notlatestfiles', 'unapprovedfiles', 'approvedfiles', 'invalidfiles' )
		) ) {
			return ApprovedRevs::getQueryInfoFileApprovals( $this->mMode );
		}
		else {
			return ApprovedRevs::getQueryInfoPageApprovals( $this->mMode );
		}
	}

	function getOrder() {
		return ' ORDER BY p.page_namespace, p.page_title ASC';
	}

	function getOrderFields() {
		return array( 'p.page_namespace', 'p.page_title' );
	}

	function sortDescending() {
		return false;
	}

	function formatResult( $skin, $result ) {
		// SQL for page revision approvals versus file revision approvals is
		// significantly different. Easier to follow if broken into two functions.
		if ( in_array(
			$this->mMode,
			array( 'notlatestfiles', 'unapprovedfiles', 'approvedfiles', 'invalidfiles' )
		) ) {
			return $this->formatResultFileApprovals( $skin, $result );
		}
		else {
			return $this->formatResultPageApprovals( $skin, $result );
		}
	}

	function formatResultPageApprovals( $skin, $result ) {
		$title = Title::newFromId( $result->id );
		if ( is_null( $title ) ) {
			echo " nulltitle ";
			return false;
		}

		if( !ApprovedRevs::pageIsApprovable( $title ) && $this->mMode !== 'invalid' ) {
			return false;
		}

		$context = $skin->getContext();
		$user = $context->getUser();
		$out = $context->getOutput();
		$lang = $context->getLanguage();

		if ( method_exists( $this, 'getLinkRenderer' ) ) {
			$linkRenderer = $this->getLinkRenderer();
		} else {
			$linkRenderer = null;
		}

		// Create page link - special handling for redirects.
		$params = array();
		if ( $title->isRedirect() ) {
			$params['redirect'] = 'no';
		}
		$pageLink = ApprovedRevs::makeLink( $linkRenderer, $title, null, array(), $params );
		if ( $title->isRedirect() ) {
			$pageLink = "<em>$pageLink</em>";
		}

		if ( $this->mMode == 'all' ) {
			$additionalInfo = Xml::element( 'span',
				array (
					'class' => $result->rev_id == $result->latest_id ? 'approvedRevIsLatest' : 'approvedRevNotLatest'
				),
				wfMessage( 'approvedrevs-revisionnumber', $result->rev_id )->text()
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
				$additionalInfo .= ', ' . wfMessage(
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
					array( 'href' => $title->getLocalUrl(
						array(
							'action' => 'approve',
							'oldid' => $result->latest_id
						)
					) ),
					wfMessage( 'approvedrevs-approvelatest' )->text()
				) . ')';
			}

			return $line;
		} elseif ( $this->mMode == 'invalid' ) {
			return $pageLink;
		} else { // approved revision is not latest
			$diffLink = Xml::element( 'a',
				array( 'href' => $title->getLocalUrl(
					array(
						'diff' => $result->latest_id,
						'oldid' => $result->rev_id
					)
				) ),
				wfMessage( 'approvedrevs-difffromlatest' )->text()
			);

			return "$pageLink ($diffLink)";
		}
	}

	public function formatResultFileApprovals( $skin, $result ) {

		$title = Title::makeTitle( NS_FILE, $result->title );

		if ( ! self::$repo ) {
			self::$repo = RepoGroup::singleton();
		}

		$pageLink = Linker::link( $title );

		#
		# mode: unapprovedfiles
		#
		if ( $this->mMode == 'unapprovedfiles' ) {
			global $egApprovedRevsShowApproveLatest;

			if ( $egApprovedRevsShowApproveLatest && ApprovedRevs::userCanApprove( $this->getUser(), $title ) ) {
				$approveLink = ' (' . Xml::element(
					'a',
					array(
						'href' => $title->getLocalUrl(
							array(
								'action' => 'approvefile',
								'ts' => $result->latest_ts,
								'sha1' => $result->latest_sha1
							)
						)
					),
					wfMessage( 'approvedrevs-approve' )->text()
				) . ')';
			}
			else {
				$approveLink = '';
			}

			return "$pageLink$approveLink";

		#
		# mode: invalidfiles
		#
		} elseif ( $this->mMode == 'invalidfiles' ) {

			if ( ! ApprovedRevs::fileIsApprovable( $title ) ) {
				// if showing invalid files only, don't show files
				// that have real approvability
				return '';
			}

			return $pageLink;

		#
		# mode: approvedfiles
		#
		} elseif ( $this->mMode == 'approvedfiles' ) {
			global $wgUser, $wgOut, $wgLang;

			$additionalInfo = Html::rawElement( 'span',
				array(
					'class' =>
						( $result->approved_sha1 == $result->latest_sha1
							&& $result->approved_ts == $result->latest_ts
						) ? 'approvedRevIsLatest' : 'approvedRevNotLatest'
				),
				wfMessage(
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


			if ( ! empty( $row ) ) {
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
				$additionalInfo .= ', ' . wfMessage(
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
				array( 'time' => $result->approved_ts )
			);
			$latest_file = self::$repo->findFileFromKey(
				$result->latest_sha1,
				array( 'time' => $result->latest_ts )
			);

			$approvedLink = Xml::element( 'a',
				array( 'href' => $approved_file->getUrl() ),
				wfMessage( 'approvedrevs-approvedfile' )->text()
			);
			$latestLink = Xml::element( 'a',
				array( 'href' => $latest_file->getUrl() ),
				wfMessage( 'approvedrevs-latestfile' )->text()
			);

			return "$pageLink ($approvedLink | $latestLink)";
		}

	}

}
