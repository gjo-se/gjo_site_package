<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

call_user_func(function()
{
    $extensionKey = 'gjo_site_package';

    ExtensionManagementUtility::addStaticFile(
        $extensionKey,
        'Configuration/TypoScript',
        'Gjo Site Package'
    );
});