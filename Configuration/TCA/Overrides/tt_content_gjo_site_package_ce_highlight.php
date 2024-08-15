<?php

declare(strict_types=1);



use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use GjoSe\GjoSitePackage\Utility\TcaUtility;

call_user_func(function (): void {

    $contentElement = 'highlight';

    $ext = 'gjo_site_package';
    $lll = 'LLL:EXT:' . '/Resources/Private/Language/locallang_db.xlf:';
    $table = 'tt_content';
    $column = '';
    $cType = $ext . '_ce_' . $contentElement;

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
});
