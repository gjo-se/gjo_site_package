<?php

call_user_func(function () {

    $ext   = 'gjo_site_package';
    $path = '/Resources/Private/Language/';
    $file = 'ContentElements.xlf:';
    $lll   = 'LLL:EXT:' . $ext . $path . $file;

    $table = 'tt_content';
    $type = 'card';


    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
        $table,
        'CType',
        [
            'Card',
            'card',
            'content-bootstrappackage-carousel'
        ],
        'parallax',
        'after'
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
        '*',
        'FILE:EXT:gjo_site_package/Configuration/FlexForms/ContentElement/Composed.xml',
        'card'
    );


    if (!is_array($GLOBALS['TCA'][$table]['types'][$type])) {
        $GLOBALS['TCA'][$table]['types'][$type] = [];
    }

    $GLOBALS['TCA'][$table]['types'][$type] = array_replace_recursive(
        $GLOBALS['TCA'][$table]['types'][$type],
        [
            'showitem' => '
            --div--;Allgemein,
                --palette--;Inhaltselement;general,
                 pi_flexform;Zusammengestellte Content Elemente,
            --div--; Content Elemente,
               tx_gjositepackage_content_element_item,
            --div--;Erscheinungsbild,
                --palette--;Layout des Inhaltselements;frames,
                tx_gjositepackage_additional_css,
            --div--;Sprache,
                --palette--;;language,
            --div--;Zugriff,
                --palette--;;hidden,
                --palette--;Veröffentlichungsdaten und Zugriffsrechte;access,
        '
        ]
    );

});



