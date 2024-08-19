<?php

declare(strict_types=1);

use GjoSe\GjoSitePackage\Utility\TcaUtility;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

(function (): void {

    $contentElement = 'carousel';

    $ext = 'gjo_site_package';
    $lll = 'LLL:EXT:' . $ext . '/Resources/Private/Language/ContentElements.xlf:';
    $table = 'tt_content';
    $column = 'tx_gjositepackage_ce_carousel_items';
    $extSignature = str_replace('_', '', $ext);
    $cType = $extSignature . '_ce_' . $contentElement;

    $GLOBALS['TCA'][$table]['columns'][$column] = [
        'label' => $lll . 'carousel_item',
        'config' => [
            'type' => 'inline',
            'foreign_table' => $column,
            'foreign_field' => 'tt_content',
            'maxitems' => 9,
            'appearance' => [
                'useSortable' => true,
                'showSynchronizationLink' => true,
                'showAllLocalizationLink' => true,
                'showPossibleLocalizationRecords' => true,
                'expandSingle' => true,
                'enabledControls' => [
                    'localize' => true,
                ],
            ],
            'behaviour' => [
                'mode' => 'select',
                'localizeChildrenAtParentLocalization' => true,
            ],
        ],
    ];

    TcaUtility::setTcaCtype($ext, $contentElement);

    $newFieldsString = '--div--;' . $lll . 'tab.carousel_items,tx_gjositepackage_ce_carousel_items';
    ExtensionManagementUtility::addToAllTCAtypes(
        $table,
        $newFieldsString,
        $cType,
        'after:pi_flexform'
    );

    ExtensionManagementUtility::addTcaSelectItem(
        'tt_content',
        'CType',
        [
            'label' => 'LLLx:' . $cType,
            'value' => $cType,
            'icon' => 'content-bootstrappackage-carousel',
            'group' => 'gjose-content-elements',
        ],
        $extSignature . '_ce_highlight',
        'after',
    );
})();
