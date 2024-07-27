<?php

return call_user_func(function (): array {

    $ext      = 'gjo_site_package';
    $lll      = 'LLL:EXT:' . $ext . '/Resources/Private/Language/ContentElements.xlf:';
    $cePreKey = 'content_element_item';
    $lllLang  = 'LLL:EXT:' . 'lang/Resources/Private/Language/locallang_general.xlf:';

    $table = 'tx_gjositepackage_content_element_item';

    return [

        'ctrl' => [
            'title' => 'Content Elemente Title',
            'label' => 'header_text',

            'tstamp'    => 'tstamp',
            'crdate'    => 'crdate',

            'dividers2tabs' => true,
            'sortby'        => 'sorting',
            'iconfile'      => 'EXT:' . $ext . '/Resources/Public/Icons/ContentElements/carousel-item.svg',

            'languageField'            => 'sys_language_uid',
            'transOrigPointerField'    => 'l10n_parent',
            'transOrigDiffSourceField' => 'l10n_diffsource',

            'delete'        => 'deleted',
            'enablecolumns' => [
                'disabled'  => 'hidden',
                'starttime' => 'starttime',
                'endtime'   => 'endtime',
            ],

            'type' => 'item_type',
            'typeicon_column' => 'item_type',
            'typeicon_classes' => [
                'default' => 'content-bootstrappackage-carousel-item',
                'parallax' => 'content-bootstrappackage-carousel-item-header',
                'card' => 'content-bootstrappackage-carousel-item-textandimage',
//                'backgroundimage' => 'content-bootstrappackage-carousel-item-backgroundimage',
//                'html' => 'content-bootstrappackage-carousel-item-html'
            ]



        ],

        'columns' => [

            'hidden'           => [
                'label'   => $lllLang . 'LGL.hidden',
                'config'  => [
                    'type'  => 'check',
                    'items' => [
                        [
                            'label' => $lllLang . 'LGL.hidden',
                            'value' => 0
                        ]
                    ]
                ]
            ],
            'starttime' => [
                'label' => $lllLang . 'LGL.starttime',
                'config' => [
                    'type' => 'datetime',
                    'eval' => 'int',
                    'default' => 0,
                    'behaviour' => [
                        'allowLanguageSynchronization' => true,
                    ],
                ],
            ],
            'endtime' => [
                'label' => $lllLang . 'LGL.endtime',
                'config' => [
                    'type' => 'datetime',
                    'eval' => 'int',
                    'default' => 0,
                    'range' => [
                        'upper' => mktime(0, 0, 0, 1, 1, 2038),
                    ],
                    'behaviour' => [
                        'allowLanguageSynchronization' => true,
                    ],
                ],
            ],
            'sys_language_uid' => [
                'label' => $lllLang . 'LGL.language',
                'config' => [
                    'type' => 'language',
                ]
            ],
            'l10n_parent'      => [
                'displayCond' => 'FIELD:sys_language_uid:>:0',
                'label'       => $lllLang . 'LGL.l18n_parent',
                'config'      => [
                    'type'                => 'select',
                    'renderType'          => 'selectSingle',
                    'items'               => [
                        [
                            'label' => '',
                            'value' => 0
                        ]
                    ],
                    'foreign_table'       => $table,
                    'foreign_table_where' => 'AND ' . $table . '.pid=###CURRENT_PID### AND ' . $table . '.sys_language_uid IN (-1,0)',
                    'default'             => 0
                ]
            ],
            'l10n_diffsource'  => [
                'config' => [
                    'type' => 'passthrough'
                ]
            ],

            ######################################################################

            // TODO: entweder IN ('parallax', ....) oder pathroo draus machen (wel der Select wird nicht gebraucht)
            // schreibt trotz auskommentiert in DB
//            'tt_content' => [
//                'label'   => 'tt_content',
//                'config'  => [
//                    'type'                => 'select',
//                    'renderType'          => 'selectSingle',
//                    'foreign_table'       => 'tt_content',
//                    'foreign_table_where' => 'AND tt_content.pid=###CURRENT_PID### AND tt_content.CType="parallax"',
//                    'maxitems'            => 1,
//                ],
//            ],

            'item_type' => [
                'label' => 'Typ',
                'config' => [
                    'type' => 'select',
                    'renderType' => 'selectSingle',
                    'items' => [
                        [
                            'label' => 'Bitte wählen...',
                            'value' => 'default'
                        ],
                        [
                            'label' => 'Parallax',
                            'value' => 'parallax'
                        ],
                        [
                            'label' => 'Card',
                            'value' => 'card'
                        ]
                    ],
                    'default' => 'default',
                ]
            ],

            'image' => [
                'label' => 'Bild',
                'config' => [
                    'type' => 'file',
                    'maxitems' => 1,
                    'allowed' => 'common-image-types'
                ],
            ],

            'image_mask_css_class' => [
                'label'  => 'Mask CSS Class',
                'config' => [
                    'type' => 'input',
                    'size' => 50,
                    'eval' => 'trim'
                ]
            ],

            'background_image' => [
                'label'  => 'Hintergrund Bild',
                'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                    'background_image',
                    [
                        'maxitems'         => 1,
                    ],
                    $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
                ),
            ],

            'header_text'              => [
                'label'  => 'Überschrift',
                'config' => [
                    'type' => 'input',
                    'size' => 50,
                    'eval' => 'trim'
                ],
            ],

            'body_text'            => [
                'label'     => 'Body Text',
                'config'    => [
                    'type'           => 'text',
                    'cols'           => 80,
                    'rows'           => 15,
                    'enableRichtext' => true,
                    'softref'        => 'typolink_tag,images,email[subst],url',
                ],
            ],

            'button_text' => [
                'label'  => 'Button Text',
                'config' => [
                    'type' => 'input',
                    'size' => 50,
                    'eval' => 'trim'
                ]
            ],

            'button_link' => [
                'label'  => 'Button Link',
                'config' => [
                    'type' => 'link',
                    'renderType' => 'inputLink',
                    'size' => 50,
                    'eval' => 'trim',
                    'fieldControl' => [
                        'linkPopup' => [
                            'options' => [
                                'title' => 'Button Link',
                                'windowOpenParameters' => 'height=800,width=600,status=0,menubar=0,scrollbars=1',
                            ],
                        ],
                    ],
                ],
            ],
        ],

        'palettes' => [
            '1'     => [
                'showitem' => ''
            ],
            'general' => [
                'showitem' => '
                tt_content,
                item_type;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:CType_formlabel,
            '
            ],
            'text'  => [
                'showitem' => '
                    header_text,
                    --linebreak--,
                    body_text,
                    --linebreak--,
                    button_text, button_link
                '
            ],
            'media' => [
                'showitem' => '
                    image,
                    --linebreak--,
                    background_image,
                    --linebreak--,
                    image_mask_css_class
                '

            ],
            'visibility' => [
                'showitem' => '
                hidden;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:hidden_formlabel
            '
            ],
            'access'     => [
                'showitem' => '
                starttime;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:starttime_formlabel,
                endtime;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:endtime_formlabel
            '
            ],
        ],

        'types'    => [
            '1'               => [
                'showitem' => '
                    --palette--;Allgemein;general,
                '
            ],
            'parallax'          => [
                'showitem' => '
                --palette--;Allgemein;general,
                --div--;Text,
                    --palette--;Text;text,
                --div--;Media,
                    --palette--;Media;media,
                --div--;Zugriff,
                    --palette--;Sichtbarkeit;visibility,
                    --palette--;Veröffentlichungsdaten und Zugriffsrechte;access,
            '
            ],
            'card'          => [
                'showitem' => '
                --palette--;Allgemein;general,
                --div--;Text,
                    --palette--;Text;text,
                --div--;Media,
                    --palette--;Media;media,
                --div--;Zugriff,
                    --palette--;Sichtbarkeit;visibility,
                    --palette--;Veröffentlichungsdaten und Zugriffsrechte;access,
            '
            ],
        ]
    ];
});