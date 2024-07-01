<?php

$GLOBALS['TYPO3_CONF_VARS']['BE']['installToolPassword'] = md5('gh%tZF6dT%tZF');

//Testing on test.tiger.de
$GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default'] = array(
    'driver'   => 'mysqli',
    'host'     => '127.0.0.3',
    'port'     => 3306,
    'user'     => 'db568748_2',
    'password' => '5n2:uRgBgrrk',
    'dbname'   => 'db568748_2',
    'charset'  => 'utf8'
);

//Production on www.tiger.de
$GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Production'] = array(
    'driver'   => 'mysqli',
    'host'     => '127.0.0.3',
    'port'     => 3306,
    'user'     => 'db568748_3',
    'password' => 'rk8it9V_so7BL-',
    'dbname'   => 'db568748_3',
    'charset'  => 'utf8'
);

# Debug Settings
$GLOBALS['TYPO3_CONF_VARS']['BE']['debug']                 = 1;
$GLOBALS['TYPO3_CONF_VARS']['FE']['debug']                 = 1;
$GLOBALS['TYPO3_CONF_VARS']['SYS']['devIPmask']            = '*';
$GLOBALS['TYPO3_CONF_VARS']['SYS']['displayErrors']        = 1;
$GLOBALS['TYPO3_CONF_VARS']['SYS']['enableDeprecationLog'] = 'file';
$GLOBALS['TYPO3_CONF_VARS']['SYS']['sqlDebug']             = 1;
$GLOBALS['TYPO3_CONF_VARS']['SYS']['systemLogLevel']       = 0;
$GLOBALS['TYPO3_CONF_VARS']['SYS']['clearCacheSystem']     = 1;

# ImageHandling
$GLOBALS['TYPO3_CONF_VARS']['GFX']['processor_path']     = '/usr/bin/';
$GLOBALS['TYPO3_CONF_VARS']['GFX']['processor_path_lzw'] = '/usr/bin/';

# Email Transport
//$GLOBALS['TYPO3_CONF_VARS']['MAIL']['transport_smtp_server'] = 'dchb.datagroup-bremen.de';
//$GLOBALS['TYPO3_CONF_VARS']['MAIL']['transport_smtp_username'] = 'francksen_shop';
//$GLOBALS['TYPO3_CONF_VARS']['MAIL']['transport_smtp_password'] = 'PW4francksen!';

$GLOBALS['TYPO3_CONF_VARS']['MAIL']['transport_smtp_server']   = 'sslout.df.eu';
$GLOBALS['TYPO3_CONF_VARS']['MAIL']['transport_smtp_username'] = 'tiger@gjo-se.com';
$GLOBALS['TYPO3_CONF_VARS']['MAIL']['transport_smtp_password'] = 'mgGx1suSt@bw';