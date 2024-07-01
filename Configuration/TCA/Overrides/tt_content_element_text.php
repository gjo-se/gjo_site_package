<?php

if (!is_array($GLOBALS['TCA']['tt_content']['types']['text'])) {
    $GLOBALS['TCA']['tt_content']['types']['text'] = [];
}

$GLOBALS['TCA']['tt_content']['types']['text'] = array_replace_recursive(
    $GLOBALS['TCA']['tt_content']['types']['text'],
    [
        'showitem' => '
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general, 
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general, 
                bodytext,
            
            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.frames;frames, 
                    tx_gjositepackage_additional_css,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.appearanceLinks;appearanceLinks, 
            
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language, --palette--;;language, 
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, 
                --palette--;;hidden, --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access, 
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories, 
            --div--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_category.tabs.category, categories,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes, rowDescription, 
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended
            ',
    ]
);
