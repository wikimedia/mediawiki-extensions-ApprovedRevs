CREATE TABLE /*_*/approved_revs (
	page_id int(8) default NULL,
	rev_id int(8) default NULL
) /*$wgDBTableOptions*/;

CREATE UNIQUE INDEX approved_revs_page_id ON /*_*/approved_revs (page_id);
