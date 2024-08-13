<?php

declare(strict_types=1);

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

call_user_func(function (): void {

    $ext   = 'gjo_site_package';
    $lll   = 'LLL:EXT:' . $ext . '/Resources/Private/Language/';
    $table = 'tt_content';
    $column = 'tx_gjositepackage_additional_css';

    $additionalColumn = [

        $column => [
            'label'  => $lll . 'ContentElements.xlf:tx_gjositepackage_additional_css',
            'config' => [
                'type' => 'input',
            ],
        ],
    ];

    ExtensionManagementUtility::addTCAcolumns($table, $additionalColumn);
    ExtensionManagementUtility::addToAllTCAtypes($table, $column, '', 'after:layout');
});
