<?php

call_user_func(function (): void {

    $ext = 'gjo_site_package';
    $path = '/Resources/Private/Language/';
    $file = 'ContentElements.xlf:';
    $lll = 'LLL:EXT:' . $ext . $path . $file;

    $table = 'tt_content';
    $column = 'carousel';
    $contentTypeName = $ext . '_' . $column;

    if (!is_array($GLOBALS['TCA']['tt_content']['types'][$contentTypeName] ?? false)) {
        $GLOBALS['TCA']['tt_content']['types'][$contentTypeName] = [];
    }

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
        '*',
        'FILE:EXT:gjo_site_package/Configuration/FlexForms/ContentElement/Carousel.xml',
        $contentTypeName
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
        'tt_content',
        'CType',
        [
            'label' => $lll . $column,
            'value' => $contentTypeName,
            'icon' => 'content-bootstrappackage-carousel',
            'group' => 'gjo-se',
            'description' => 'Beschreibung aus addTcaSelectItem()',
        ],
        '--div--',
        'after',
    );

    $GLOBALS['TCA'][$table]['ctrl']['typeicon_classes'][$contentTypeName] = 'content-bootstrappackage-carousel';

    $GLOBALS['TCA']['tt_content']['types'][$contentTypeName] = array_replace_recursive(
        $GLOBALS['TCA']['tt_content']['types'][$contentTypeName],
        [
            'showitem' => '
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.headers;headers,
                pi_flexform;' . $lll . 'palette.carousel,
            --div--;' . $lll . 'tab.carousel_items,
               tx_gjositepackage_carousel_item,
            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.frames;frames,
                tx_gjositepackage_additional_css,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                --palette--;;language,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                --palette--;;hidden,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
        '
        ]
    );
});



