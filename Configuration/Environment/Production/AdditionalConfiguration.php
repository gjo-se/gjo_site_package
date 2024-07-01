<?php

$GLOBALS['TYPO3_CONF_VARS']['BE']['installToolPassword'] = md5('gh%tZF6dT%tZF');

//Production on www.tiger.de
$GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default'] = array(
    'driver'   => 'mysqli',
    'host'     => '127.0.0.3',
    'port'     => 3306,
    'user'     => 'db568748_3',
    'password' => 'rk8it9V_so7BL-',
    'dbname'   => 'db568748_3',
    'charset'  => 'utf8'
);

//Testing on test.tiger.de
$GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Test'] = array(
    'driver'   => 'mysqli',
    'host'     => '127.0.0.3',
    'port'     => 3306,
    'user'     => 'db568748_2',
    'password' => '5n2:uRgBgrrk',
    'dbname'   => 'db568748_2',
    'charset'  => 'utf8'
);

$GLOBALS['TYPO3_CONF_VARS']['DB']['TableMapping'] = array(
    'fe_groups'                                => 'Test',
    'fe_users'                                 => 'Test',
    'tx_femanager_domain_model_log'            => 'Test',
    'tx_gjoshop_domain_model_billing_address'  => 'Test',
    'tx_gjoshop_domain_model_delivery_address' => 'Test',
    'tx_gjoshop_domain_model_order'            => 'Test',
    'tx_gjoshop_domain_model_orderproducts'    => 'Test',
    'tx_gjoshop_domain_model_payment_paypal'   => 'Test'
);

# Debug Settings
$GLOBALS['TYPO3_CONF_VARS']['BE']['debug']          = 0;
$GLOBALS['TYPO3_CONF_VARS']['FE']['debug']          = 0;
$GLOBALS['TYPO3_CONF_VARS']['SYS']['devIPmask']     = '';
$GLOBALS['TYPO3_CONF_VARS']['SYS']['displayErrors'] = 0;
$GLOBALS['TYPO3_CONF_VARS']['SYS']['sqlDebug']          = 0;
$GLOBALS['TYPO3_CONF_VARS']['SYS']['systemLogLevel']    = 2; // 0=info, 1=notice, 2=warning, 3=error, 4=fatal error
$GLOBALS['TYPO3_CONF_VARS']['SYS']['exceptionalErrors'] = 4096; // siehe: http://php.net/manual/de/errorfunc.constants.php
$GLOBALS['TYPO3_CONF_VARS']['SYS']['clearCacheSystem']  = 0;

# ImageHandling
$GLOBALS['TYPO3_CONF_VARS']['GFX']['processor_path']     = '/usr/bin/';
$GLOBALS['TYPO3_CONF_VARS']['GFX']['processor_path_lzw'] = '/usr/bin/';

# Email Transport
//$GLOBALS['TYPO3_CONF_VARS']['MAIL']['transport_smtp_server'] = 'dchb.datagroup-bremen.de';
//$GLOBALS['TYPO3_CONF_VARS']['MAIL']['transport_smtp_username'] = 'francksen_shop';
//$GLOBALS['TYPO3_CONF_VARS']['MAIL']['transport_smtp_password'] = 'PW4francksen!';

$GLOBALS['TYPO3_CONF_VARS']['MAIL']['transport_smtp_server'] = 'sslout.df.eu';
$GLOBALS['TYPO3_CONF_VARS']['MAIL']['transport_smtp_username'] = 'tiger@gjo-se.com';
$GLOBALS['TYPO3_CONF_VARS']['MAIL']['transport_smtp_password'] = 'mgGx1suSt@bw';

// TODO: klären
//$GLOBALS['TYPO3_CONF_VARS']['SYS']['enableDeprecationLog'] = 'file'; devlog | console
