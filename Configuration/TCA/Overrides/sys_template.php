<?php

declare(strict_types=1);

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

(function (): void {
    $extensionKey = 'gjo_site_package';

    ExtensionManagementUtility::addStaticFile(
        $extensionKey,
        'Configuration/TypoScript',
        'GjoSe Site Package'
    );
})();
