<?php

//$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['news_pi1'] = 'pi_flexform';
//\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue('news_pi1',
//    'FILE:EXT:gjo_site_package/Configuration/FlexForms/flexform_news.xml');


call_user_func(function () {

    $ext   = 'gjo_site_package';
    $lll   = 'LLL:EXT:' . $ext . '/Resources/Private/Language/';
    $table = 'tt_content';

    $additionalColumns = [

        'tx_gjointroduction_additional_css' => [
            'label'  => $lll . 'ContentElements.xlf:tx_gjointroduction_additional_css',
            'config' => [
                'type' => 'input'
            ]
        ],

        'tx_gjointroduction_content_element_item' => [
            'label' => 'Content Elemente',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_gjointroduction_content_element_item',
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
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes($table, 'tx_gjointroduction_additional_css', '', 'after:layout');

    // TODO: überprüfen: wird mE nicht mehr benutzt
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
        'tt_content',
        'CType',
        [
            $lll . 'ContentElements.xlf:content_group.gjose',
            '--div--'
        ],
        '--div--',
        'before'
    );


});