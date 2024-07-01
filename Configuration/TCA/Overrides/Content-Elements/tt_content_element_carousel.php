<?php

call_user_func(function () {

    $ext  = 'gjo_site_package';
    $path = '/Resources/Private/Language/';
    $file = 'ContentElements.xlf:';
    $lll  = 'LLL:EXT:' . $ext . $path . $file;

    $table  = 'tt_content';
    $column = 'carousel';

    if (!is_array($GLOBALS['TCA'][$table]['types'][$column])) {
        $GLOBALS['TCA'][$table]['types'][$column] = [];
    }

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
        '*',
        'FILE:EXT:gjo_site_package/Configuration/FlexForms/ContentElement/Carousel.xml',
        'carousel'
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
        $table,
        'CType',
        [
            $lll . 'carousel',
            'carousel',
            'content-bootstrappackage-carousel'
        ],
        '--div--',
        'after'
    );

    $GLOBALS['TCA'][$table]['ctrl']['typeicon_classes'][$column] = 'content-bootstrappackage-carousel';

    // TODO: language Files Struktur überlegen
    $GLOBALS['TCA'][$table]['types'][$column] = array_replace_recursive(
        $GLOBALS['TCA']['tt_content']['types'][$column],
        [
            'showitem' => '
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.headers;headers,
                pi_flexform;' . $lll . 'palette.carousel,
            --div--;' . $lll . 'tab.carousel_items,
               tx_gjointroduction_carousel_item,
            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.frames;frames,
                tx_gjointroduction_additional_css,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                --palette--;;language,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                --palette--;;hidden,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
        '
        ]
    );
});



