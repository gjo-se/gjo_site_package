<?php

declare(strict_types=1);

use GjoSe\GjoSitePackage\Utility\TcaUtility;

return (function (): array {

    $ext = 'gjo_site_package';
    $lll = 'LLL:EXT:' . $ext . '/Resources/Private/Language/ContentElements.xlf:';
    $cePreKey = 'carousel_item.';

    $table = 'tx_gjositepackage_ce_carousel_items';

    return [

        'ctrl' => [
            'title' => $lll . 'carousel',
            'label' => 'header',

            'tstamp' => 'tstamp',
            'crdate' => 'crdate',

            'dividers2tabs' => true,
            'sortby' => 'sorting',
            'iconfile' => 'EXT:' . $ext . '/Resources/Public/Icons/ContentElements/carousel-item.svg',

            'languageField' => 'sys_language_uid',
            'transOrigPointerField' => 'l10n_parent',
            'transOrigDiffSourceField' => 'l10n_diffsource',
            'translationSource' => 'l10n_source',

            'delete' => 'deleted',
            'enablecolumns' => [
                'disabled' => 'hidden',
                'starttime' => 'starttime',
                'endtime' => 'endtime',
            ],
            'security' => [
                'ignorePageTypeRestriction' => true,
            ],
        ],

        'columns' => [

            'tt_content' => [
                'label' => $lll . $cePreKey . 'tt_content',
                'config' => [
                    'type' => 'select',
                    'renderType' => 'selectSingle',
                    'foreign_table' => 'tt_content',
                    'foreign_table_where' => 'AND tt_content.pid=###CURRENT_PID### AND tt_content.CType="gjositepackage_ce_carousel"',
                    'maxitems' => 1,
                ],
            ],

            'image' => [
                'label' => $lll . $cePreKey . 'image',
                'config' => [
                    'type' => 'file',
                    'maxitems' => 1,
                    'allowed' => 'common-image-types',
                ],
            ],

            'is_background_image' => [
                'label' => $lll . $cePreKey . 'is_background_image',
                'config' => [
                    'type' => 'check',
                ],
            ],
            'header' => [
                'label' => $lll . $cePreKey . 'header',
                'config' => [
                    'type' => 'input',
                    'size' => 50,
                    'eval' => 'trim',
                ],
            ],

            'mask_css_class' => [
                'label' => $lll . $cePreKey . 'mask_css_class',
                'config' => [
                    'type' => 'input',
                    'size' => 50,
                    'eval' => 'trim',
                ],
            ],

            'button_text' => [
                'label' => $lll . $cePreKey . 'button_text',
                'config' => [
                    'type' => 'input',
                    'size' => 50,
                    'eval' => 'trim',
                ],
            ],

            'button_link' => [
                'label' => $lll . $cePreKey . 'button_link',
                'config' => [
                    'type' => 'link',
                    'renderType' => 'inputLink',
                    'size' => 50,
                    'eval' => 'trim',
                    'fieldControl' => [
                        'linkPopup' => [
                            'options' => [
                                'title' => $lll . 'carousel_item.button_link',
                                'windowOpenParameters' => 'height=800,width=600,status=0,menubar=0,scrollbars=1',
                            ],
                        ],
                    ],
                ],
            ],

            'bodytext' => [
                'label' => $lll . $cePreKey . 'bodytext',
                'config' => [
                    'type' => 'text',
                    'cols' => 80,
                    'rows' => 15,
                    'enableRichtext' => true,
                    'softref' => 'typolink_tag,images,email[subst],url',
                ],
            ],

            'element_tag' => [
                'label' => $lll . $cePreKey . 'element_tag',
                'config' => [
                    'type' => 'input',
                    'size' => 50,
                    'eval' => 'trim',
                ],
            ],

            'link' => [
                'label' => $lll . $cePreKey . 'button_link',
                'config' => [
                    'type' => 'link',
                    'renderType' => 'inputLink',
                    'size' => 50,
                    'eval' => 'trim',
                    'fieldControl' => [
                        'linkPopup' => [
                            'options' => [
                                'title' => $lll . 'carousel_item.link',
                                'windowOpenParameters' => 'height=800,width=600,status=0,menubar=0,scrollbars=1',
                            ],
                        ],
                    ],
                ],
            ],

            'additional_css' => [
                'label' => $lll . $cePreKey . 'additional_css',
                'config' => [
                    'type' => 'input',
                ],
            ],

            ...TcaUtility::getDefaultTcaColumns($table),

        ],

        'palettes' => [
            '1' => [
                'showitem' => '',
            ],
            'media' => [
                'showitem' => '
                    image,
                    --linebreak--,
                    mask_css_class,
                    --linebreak--,
                    is_background_image
                ',

            ],
            'text' => [
                'showitem' => '
                    header,
                    --linebreak--,
                    bodytext,
                    --linebreak--,
                    button_text, button_link,
                ',
            ],
            'visibility' => [
                'showitem' => '
                hidden;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:hidden_formlabel
            ',
            ],
            'access' => [
                'showitem' => '
                starttime;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:starttime_formlabel,
                endtime;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:endtime_formlabel
            ',
            ],
        ],

        'types' => [
            '1' => [
                'showitem' => '
                --div--;' . $lll . 'tab.carousel_item.text,
                    --palette--;' . $lll . 'palette.text;text,
                --div--;' . $lll . 'tab.carousel_item.media,
                    --palette--;' . $lll . 'palette.media;media,
                --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
                    additional_css,
                --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access,
                    --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.visibility;visibility,
                    --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
            ',
            ],
        ],
    ];
})();
