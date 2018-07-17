CREATE TABLE /*_*/approved_revs_files (
	file_title varbinary(255) NOT NULL,
	approved_timestamp binary(14) NOT NULL,
	approved_sha1 varbinary(32) NOT NULL
) /*$wgDBTableOptions*/;

CREATE UNIQUE INDEX approved_revs_file_title ON /*_*/approved_revs_files (file_title);
