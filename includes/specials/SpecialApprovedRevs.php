<?php

use MediaWiki\Html\Html;
use MediaWiki\Linker\Linker;
use MediaWiki\MediaWikiServices;
use MediaWiki\Title\Title;

/**
 * Special page that displays various lists of pages that either do or do
 * not have an approved revision.
 *
 * @author Yaron Koren
 */
class SpecialApprovedRevs extends QueryPage {

	/** @var string|null */
	protected $mMode;

	public function __construct() {
		parent::__construct( 'ApprovedRevs' );
		$request = $this->getRequest();
		$this->mMode = $request->getVal( 'show' );
	}

	/**
	 * These two arrays pair mode with messages. E.g. mode "approvedpages"
	 * is used to generate a header link with query string having "show=approvedpages"
	 * and link text of "All pages with an approved revision" (in English).
	 * @var array<string,string>
	 */
	protected $mPageHeaderLinks = [
		'approvedrevs-notlatestpages'     => '',
		'approvedrevs-unapprovedpages'    => 'unapproved',
		'approvedrevs-approvedpages'      => 'all',
		'approvedrevs-invalidpages'       => 'invalid',
	];
	/** @var array<string,string> */
	protected $mFileHeaderLinks = [
		'approvedrevs-notlatestfiles'     => 'notlatestfiles',
		'approvedrevs-unapprovedfiles'    => 'unapprovedfiles',
		'approvedrevs-approvedfiles'      => 'approvedfiles',
		'approvedrevs-invalidfiles'       => 'invalidfiles',
	];

	/** @inheritDoc */
	public function isExpensive() {
		return false;
	}

	/** @inheritDoc */
	public function isSyndicated() {
		return false;
	}

	/** @inheritDoc */
	protected function getPageHeader() {
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
			$dbr = ApprovedRevs::getReadDB();
			$result = $dbr->selectField( 'approved_revs_files', 'COUNT(*)', '', __METHOD__ );
			if ( $result > 0 ) {
				foreach ( $this->mFileHeaderLinks as $msg => $mode ) {
					$navLinks[] = $this->createHeaderLink( $msg, $mode );
				}
			}
		}

		$navLine = $this->msg( 'approvedrevs-view' )->escaped() . ' ' . implode( ' | ', $navLinks );
		$header = Html::rawElement( 'p', [], $navLine ) . "\n";

		return Html::rawElement(
			'div', [ 'class' => 'specialapprovedrevs-header' ], $header
		);
	}

	/**
	 * Generate links for header. For current mode, generate non-link bold
	 * text.
	 *
	 * @param string $msg
	 * @param string $mode
	 * @return string
	 */
	public function createHeaderLink( $msg, $mode ) {
		if ( $this->mMode == $mode ) {
			return Html::element( 'strong',
				[],
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
	 *
	 * @return array
	 */
	protected function linkParameters() {
		// Optionally could validate $this->mMode against the two
		// link arrays.
		return $this->mMode == '' ? [] : [ 'show' => $this->mMode ];
	}

	/** @inheritDoc */
	public function getQueryInfo() {
		// SQL for page revision approvals versus file revision approvals is
		// significantly different. Easier to follow if broken into two functions.
		if ( in_array(
			$this->mMode,
			[ 'notlatestfiles', 'unapprovedfiles', 'approvedfiles', 'invalidfiles' ]
		) ) {
			$query = ApprovedRevs::getQueryInfoFileApprovals( $this->mMode );
		} else {
			$query = ApprovedRevs::getQueryInfoPageApprovals( $this->mMode );
		}
		if ( in_array( $this->mMode, [ 'all', 'approvedfiles' ] ) ) {
			$query['tables'] = array_merge( $query['tables'], [ 'logging', 'actor' ] );
			$query['fields'] = array_merge( $query['fields'], [
				'log_user' => 'actor_user',
				'log_user_name' => 'actor_name',
				'log_timestamp' => 'MAX(log_timestamp)',
			] );
			$query['join_conds'] += [
				'logging' => [ 'LEFT OUTER JOIN', 'p.page_id=log_page' ],
				'actor' => [ 'JOIN', 'log_actor=actor_id' ],
			];
			$query['conds']['log_type'] = 'approval';
			$query['options']['GROUP BY'][] = 'page_title';
		}
		return $query;
	}

	/** @inheritDoc */
	protected function getOrderFields() {
		return [ 'p.page_namespace', 'p.page_title' ];
	}

	protected function sortDescending() {
		return false;
	}

	/** @inheritDoc */
	protected function formatResult( $skin, $result ) {
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

	/**
	 * @param Skin $skin
	 * @param stdClass $result
	 * @return string|false
	 */
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
			$additionalInfo = Html::element( 'span',
				[
					'class' => $result->rev_id == $result->latest_id ? 'approvedRevIsLatest' : 'approvedRevNotLatest'
				],
				$this->msg( 'approvedrevs-revisionnumber', $result->rev_id )->text()
			);

			if ( isset( $result->log_timestamp ) ) {
				$timestampInteger = wfTimestamp( TS_MW, $result->log_timestamp );
				$timestamp = $lang->timeanddate( $timestampInteger, true );
				$date = $lang->date( $timestampInteger, true );
				$time = $lang->time( $timestampInteger, true );
				$userLink = Linker::userLink( $result->log_user, $result->log_user_name );
				$additionalInfo .= ', ' . $this->msg( 'approvedrevs-approvedby' )
					->rawParams( $userLink )
					->params(
						$timestamp,
						$result->log_user_name,
						$date,
						$time
					)
					->escaped();
			}

			return "$pageLink ($additionalInfo)";
		} elseif ( $this->mMode == 'unapproved' ) {
			global $egApprovedRevsShowApproveLatest;

			$line = $pageLink;
			if ( $egApprovedRevsShowApproveLatest &&
				ApprovedRevs::checkPermission( $user, $title, 'approverevisions' ) ) {
				$line .= ' (' . Html::element( 'a',
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
		} else {
			// approved revision is not latest
			$diffLink = Html::element( 'a',
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

	/**
	 * @param Skin $skin
	 * @param stdClass $result
	 * @return string|void
	 */
	public function formatResultFileApprovals( $skin, $result ) {
		$title = Title::makeTitle( NS_FILE, $result->title );

		$pageLink = $this->getLinkRenderer()->makeLink( $title );

		#
		# mode: unapprovedfiles
		#
		if ( $this->mMode == 'unapprovedfiles' ) {
			global $egApprovedRevsShowApproveLatest;

			if ( $egApprovedRevsShowApproveLatest && ApprovedRevs::userCanApprove( $this->getUser(), $title ) ) {
				$approveLink = ' (' . Html::element(
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

			if ( isset( $result->log_timestamp ) ) {
				$lang = $this->getLanguage();
				$timestampInteger = wfTimestamp( TS_MW, $result->log_timestamp );
				$timestamp = $lang->timeanddate( $timestampInteger, true );
				$date = $lang->date( $timestampInteger, true );
				$time = $lang->time( $timestampInteger, true );
				$userLink = Linker::userLink( $result->log_user, $result->log_user_name );
				$additionalInfo .= ', ' . $this->msg( 'approvedrevs-approvedby' )
					->rawParams( $userLink )
					->params(
						$timestamp,
						$result->log_user_name,
						$date,
						$time
					)
					->escaped();
			}

			return "$pageLink ($additionalInfo)";

		#
		# mode: notlatestfiles
		#
		} elseif ( $this->mMode == 'notlatestfiles' ) {
			$repoGroup = MediaWikiServices::getInstance()->getRepoGroup();
			$approved_file = $repoGroup->findFileFromKey(
				$result->approved_sha1,
				[ 'time' => $result->approved_ts ]
			);
			$latest_file = $repoGroup->findFileFromKey(
				$result->latest_sha1,
				[ 'time' => $result->latest_ts ]
			);

			$approvedLink = Html::element( 'a',
				[ 'href' => $approved_file->getUrl() ],
				$this->msg( 'approvedrevs-approvedfile' )->text()
			);
			$latestLink = Html::element( 'a',
				[ 'href' => $latest_file->getUrl() ],
				$this->msg( 'approvedrevs-latestfile' )->text()
			);

			return "$pageLink ($approvedLink | $latestLink)";
		}
	}

	/** @inheritDoc */
	protected function getGroupName() {
		return 'pages';
	}

}
