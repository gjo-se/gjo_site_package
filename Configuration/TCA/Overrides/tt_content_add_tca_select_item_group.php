<?php

declare(strict_types=1);

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

(function (): void {

    $ext   = 'gjo_site_package';
    $lll   = 'LLL:EXT:' . $ext . '/Resources/Private/Language/';

    ExtensionManagementUtility::addTcaSelectItemGroup(
        'tt_content',
        'CType',
        'gjose-content-elements',
        $lll . 'ContentElements.xlf:content_element.group.gjose-content-elements',
        'after:container'
    );
})();
