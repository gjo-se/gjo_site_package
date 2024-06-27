<?php
defined('TYPO3') or die('Access denied.');
call_user_func(function()
{
    /**
     * Temporary variables
     */
    $extensionKey = 'mysitepacke';

    /**
     * Default TypoScript for Mysitepacke
     */
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
        $extensionKey,
        'Configuration/TypoScript',
        'mySitepacke'
    );
});

//\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('tea', 'Configuration/TypoScript', 'Tea');
//\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
//    'tea',
//    'Configuration/TypoScript/Frontend/',
//    'Tea frontend (optional)'
//);