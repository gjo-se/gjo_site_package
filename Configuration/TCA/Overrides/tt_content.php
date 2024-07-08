<?php

call_user_func(function () {

    $ext   = 'gjo_site_package';
    $lll   = 'LLL:EXT:' . $ext . '/Resources/Private/Language/';
    $table = 'tt_content';

    $additionalColumns = [

        'tx_gjositepackage_additional_css' => [
            'label'  => $lll . 'ContentElements.xlf:tx_gjositepackage_additional_css',
            'config' => [
                'type' => 'input'
            ]
        ],

        'tx_gjositepackage_content_element_item' => [
            'label' => 'Content Elemente',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_gjositepackage_content_element_item',
                'foreign_field' => 'tt_content',
                'maxitems' => 1,
                'appearance' => [
                    'useSortable' => true,
                    'showSynchronizationLink' => true,
                    'showAllLocalizationLink' => true,
                    'showPossibleLocalizationRecords' => true,
                    'showRemovedLocalizationRecords' => false,
                    'expandSingle' => true,
                    'enabledControls' => [
                        'localize' => true,
                    ]
                ],
                'behaviour' => [
                    'mode' => 'select',
                    'localizeChildrenAtParentLocalization' => true,
                ]
            ]
        ]

    ];

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns($table, $additionalColumns);
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes($table, 'tx_gjositepackage_additional_css', '', 'after:layout');

    TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItemGroup(
        'tt_content',
        'CType',
        'gjo-se',
        $lll . 'ContentElements.xlf:content_group.gjose',
        'before:default'
    );

});