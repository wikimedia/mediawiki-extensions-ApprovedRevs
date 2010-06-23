CREATE TABLE approved_revs (
	page_id int(8) default NULL,
	rev_id int(8) default NULL
)

CREATE UNIQUE INDEX approved_revs_page_id ON approved_revs (page_id);
