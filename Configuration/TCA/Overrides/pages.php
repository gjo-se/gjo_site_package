<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

call_user_func(function()
{
    $extensionKey = 'gjo_site_package';

    ExtensionManagementUtility::registerPageTSConfigFile(
        $extensionKey,
        'Configuration/TsConfig/Page/Page.tsconfig',
        'GjoSe Site Package'
    );
});
