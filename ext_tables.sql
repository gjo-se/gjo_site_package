CREATE TABLE tt_content (
    tx_gjointroduction_additional_css VARCHAR(150) NOT NULL DEFAULT '',
    tx_gjointroduction_carousel_item int(11) unsigned DEFAULT '0',
    tx_gjointroduction_content_element_item int(11) unsigned DEFAULT '0',

);

CREATE TABLE tx_gjointroduction_carousel_item (
    uid int(11) NOT NULL auto_increment,
    pid int(11) DEFAULT '0' NOT NULL,

    tt_content int(11) unsigned DEFAULT '0',
    image int(11) unsigned DEFAULT '0',
    mask_css_class VARCHAR(150) NOT NULL DEFAULT '',

    is_background_image TINYINT(4) NOT NULL DEFAULT '0',

    header varchar(255) DEFAULT '' NOT NULL,
    header_layout tinyint(3) unsigned DEFAULT '1' NOT NULL,

    bodytext text,

    button_text VARCHAR(50) NOT NULL DEFAULT '',
    button_link VARCHAR(1024) DEFAULT '' NOT NULL,

    element_tag VARCHAR(255) NOT NULL DEFAULT '',
    additional_css VARCHAR(255) NOT NULL DEFAULT '',
    link varchar(1024) DEFAULT '' NOT NULL,

    tstamp int(11) unsigned DEFAULT '0' NOT NULL,
    crdate int(11) unsigned DEFAULT '0' NOT NULL,
    cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
    deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
    hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
    starttime int(11) unsigned DEFAULT '0' NOT NULL,
    endtime int(11) unsigned DEFAULT '0' NOT NULL,

    sorting int(11) DEFAULT '0' NOT NULL,
    t3_origuid int(11) DEFAULT '0' NOT NULL,
    sys_language_uid int(11) DEFAULT '0' NOT NULL,
    l10n_parent int(11) DEFAULT '0' NOT NULL,
    l10n_diffsource mediumblob NOT NULL,

    PRIMARY KEY (uid),
    KEY parent (pid),
    KEY language (l10n_parent,sys_language_uid)
);

CREATE TABLE tx_gjointroduction_content_element_item (
    uid int(11) NOT NULL auto_increment,
    pid int(11) DEFAULT '0' NOT NULL,

    tt_content int(11) unsigned DEFAULT '0',
    item_type varchar(255) DEFAULT '' NOT NULL,

    image int(11) unsigned DEFAULT '0',
    image_mask_css_class VARCHAR(150) NOT NULL DEFAULT '',
    background_image int(11) unsigned DEFAULT '0',

    header_text varchar(255) DEFAULT '' NOT NULL,
    body_text text,
    button_text VARCHAR(50) NOT NULL DEFAULT '',
    button_link VARCHAR(1024) DEFAULT '' NOT NULL,

    tstamp int(11) unsigned DEFAULT '0' NOT NULL,
    crdate int(11) unsigned DEFAULT '0' NOT NULL,
    cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
    deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
    hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
    starttime int(11) unsigned DEFAULT '0' NOT NULL,
    endtime int(11) unsigned DEFAULT '0' NOT NULL,

    sorting int(11) DEFAULT '0' NOT NULL,
    t3_origuid int(11) DEFAULT '0' NOT NULL,
    sys_language_uid int(11) DEFAULT '0' NOT NULL,
    l10n_parent int(11) DEFAULT '0' NOT NULL,
    l10n_diffsource mediumblob NOT NULL,

    PRIMARY KEY (uid),
    KEY parent (pid),
    KEY language (l10n_parent,sys_language_uid)
);

