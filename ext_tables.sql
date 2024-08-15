CREATE TABLE tt_content
(
	gjo_site_package_tca_col_additional_css varchar(150) NOT NULL DEFAULT '',
	tx_gjositepackage_ce_carousel_items      int(11) unsigned      DEFAULT '0'
);

CREATE TABLE tx_gjositepackage_ce_carousel_items
(
	tt_content          int(11) unsigned      DEFAULT '0',

	image               int(11) unsigned      DEFAULT '0',
	mask_css_class      varchar(150) NOT NULL DEFAULT '',
	is_background_image int(11)      NOT NULL DEFAULT '0',
	header              varchar(255)          DEFAULT '' NOT NULL,
	header_layout       int(11)               DEFAULT '0' NOT NULL,
	bodytext            text,
	button_text         varchar(50)  NOT NULL DEFAULT '',
	button_link         varchar(1024)         DEFAULT '' NOT NULL,
	element_tag         varchar(255) NOT NULL DEFAULT '',
	additional_css      varchar(255) NOT NULL DEFAULT '',
	link                varchar(1024)         DEFAULT '' NOT NULL
);
