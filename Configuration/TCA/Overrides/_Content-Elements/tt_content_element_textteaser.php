<?php

/***************
 * Add Content Element
 */
$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['gjositepackage_textteaser'] = 'content-bootstrappackage-accordion';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'label' => 'gjoSE-textteaser',
        'value' => 'gjositepackage_textteaser',
        'icon' => 'content-bootstrappackage-accordion',
        'group' => 'gjo-se',
        'description' => 'Beschreibung aus addTcaSelectItem()',
    ],
    'carousel',
    'after'
);

if (!is_array($GLOBALS['TCA']['tt_content']['types']['gjositepackage_textteaser'])) {
    $GLOBALS['TCA']['tt_content']['types']['gjositepackage_textteaser'] = [];
}
$GLOBALS['TCA']['tt_content']['types']['gjositepackage_textteaser'] = array_replace_recursive(
    $GLOBALS['TCA']['tt_content']['types']['gjositepackage_textteaser'],
    [
        'showitem' => '
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.headers;headers,
                teaser,
                bodytext,
            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.frames;frames,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.appearanceLinks;appearanceLinks,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                --palette--;;language,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                --palette--;;hidden,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
                categories,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,
                rowDescription,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,
        ',
        'columnsOverrides' => [
            'bodytext' => ['label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:bodytext_formlabel', 'config' => ['enableRichtext' => true, 'richtextConfiguration' => 'default']]
        ]
    ]
);
