<?php

$GLOBALS['TYPO3_CONF_VARS']['BE']['installToolPassword'] = md5('gregory');

$GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default'] = array(
    'charset'  => 'utf8',
    'dbname'   => 'tiger_de',
    'driver'   => 'mysqli',
    'host'     => '127.0.0.1',
    'password' => 'FkNX1tEf.',
    'port'     => 3306,
    'user'     => 'toor',
);

//$GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Restoretest'] = array(
//    'charset'  => 'utf8',
//    'dbname'   => 'tiger_de_prod',
//    'driver'   => 'mysqli',
//    'host'     => '127.0.0.1',
//    'password' => 'FkNX1tEf.',
//    'port'     => 3306,
//    'user'     => 'toor',
//);

# Debug Settings
$GLOBALS['TYPO3_CONF_VARS']['BE']['debug']                 = 1;
$GLOBALS['TYPO3_CONF_VARS']['FE']['debug']                 = 1;
$GLOBALS['TYPO3_CONF_VARS']['SYS']['devIPmask']            = '*';
$GLOBALS['TYPO3_CONF_VARS']['SYS']['displayErrors']        = 1;
$GLOBALS['TYPO3_CONF_VARS']['SYS']['enableDeprecationLog'] = 'file';
$GLOBALS['TYPO3_CONF_VARS']['SYS']['sqlDebug']             = 1;
$GLOBALS['TYPO3_CONF_VARS']['SYS']['systemLogLevel']       = 0;
$GLOBALS['TYPO3_CONF_VARS']['SYS']['clearCacheSystem']     = 1;
$GLOBALS['TYPO3_CONF_VARS']['SYS']['exceptionalErrors']     = 28674;

debug("TEST");exit;

# Email Transport
//$GLOBALS['TYPO3_CONF_VARS']['MAIL']['transport_smtp_server'] = 'sslout.df.eu';
//$GLOBALS['TYPO3_CONF_VARS']['MAIL']['transport_smtp_username'] = 'tiger@gjo-se.com';
//$GLOBALS['TYPO3_CONF_VARS']['MAIL']['transport_smtp_password'] = 'mgGx1suSt@bw';

# REALURL-Config
// - kann aber auch in ext_tables gehören??, oder die ext_localconf - weil, ist ja für alle ENV
// https://github.com/dmitryd/typo3-realurl/wiki/Notes-for-Developers
//$GLOBALS['TYPO3_CONF_VARS']['FE']['cacheHash']['excludedParameters'][] = 'XYZ';

# var_dumps Helper
//    \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($GLOBALS['TYPO3_CONF_VARS']['MAIL']);
//    \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($_SERVER);
//    \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump(get_defined_vars());
//    \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump(get_defined_constants());
//    exit;