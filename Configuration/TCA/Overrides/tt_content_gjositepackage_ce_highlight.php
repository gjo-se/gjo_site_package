<?php

declare(strict_types=1);

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use GjoSe\GjoSitePackage\Utility\TcaUtility;

(function (): void {

    $contentElement = 'highlight';

    $ext = 'gjo_site_package';
    $lll = 'LLL:EXT:' . $ext . '/Resources/Private/Language/locallang_db.xlf:';
    $table = 'tt_content';
    $column = '';
    $extSignature = str_replace('_', '', $ext);
    $cType = $extSignature . '_ce_' . $contentElement;

    TcaUtility::setTcaCtype($ext, $contentElement);

    ExtensionManagementUtility::addTcaSelectItem(
        'tt_content',
        'CType',
        [
            'label' => 'LLLx:' . $cType,
            'value' => $cType,
            'icon' => $cType,
            'group' => 'gjose-content-elements',
        ],
        '--div--',
        'after',
    );
})();
