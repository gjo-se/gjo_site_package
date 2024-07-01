<?php

return call_user_func(function () {

    $ext      = 'gjo_introduction';
    $lll      = 'LLL:EXT:' . $ext . '/Resources/Private/Language/ContentElements.xlf:';
    $cePreKey = 'content_element_item';
    $lllLang  = 'LLL:EXT:' . 'lang/Resources/Private/Language/locallang_general.xlf:';

    $table = 'tx_gjointroduction_content_element_item';

    return [

        'ctrl' => [
            'title' => 'Content Elemente Title',
            'label' => 'header_text',

            'tstamp'    => 'tstamp',
            'crdate'    => 'crdate',
            'cruser_id' => 'cruser_id',

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
                'exclude' => true,
                'label'   => $lllLang . 'LGL.hidden',
                'config'  => [
                    'type'  => 'check',
                    'items' => [
                        '1' => [
                            '0' => $lllLang . 'LGL.hidden'
                        ]
                    ]
                ]
            ],
            'starttime'        => [
                'exclude'      => true,
                'label'        => $lllLang . 'LGL.starttime',
                'config'       => [
                    'type'       => 'input',
                    'renderType' => 'inputDateTime',
                    'eval'       => 'datetime',
                    'default'    => 0,
                    'behaviour' => [
                        'allowLanguageSynchronization' => true
                    ]
                ],
            ],
            'endtime'          => [
                'exclude'      => true,
                'label'        => $lllLang . 'LGL.endtime',
                'config'       => [
                    'type'       => 'input',
                    'renderType' => 'inputDateTime',
                    'eval'       => 'datetime',
                    'default'    => 0,
                    'range'      => [
                        'upper' => mktime(0, 0, 0, 1, 1, 2038)
                    ],
                    'behaviour' => [
                        'allowLanguageSynchronization' => true
                    ]
                ],
            ],
            'sys_language_uid' => [
                'exclude' => 1,
                'label'   => $lllLang . 'LGL.language',
                'config'  => [
                    'type'                => 'select',
                    'renderType'          => 'selectSingle',
                    'foreign_table'       => 'sys_language',
                    'foreign_table_where' => 'ORDER BY sys_language.title',
                    'items'               => [
                        [
                            $lllLang . 'LGL.allLanguages',
                            -1
                        ],
                        [
                            $lllLang . 'LGL.default_value',
                            0
                        ]
                    ],
                    'allowNonIdValues'    => true,
                ]
            ],
            'l10n_parent'      => [
                'displayCond' => 'FIELD:sys_language_uid:>:0',
                'exclude'     => 1,
                'label'       => $lllLang . 'LGL.l18n_parent',
                'config'      => [
                    'type'                => 'select',
                    'renderType'          => 'selectSingle',
                    'items'               => [
                        [
                            '',
                            0
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
                            'Bitte wählen...',
                            'default',
                            'content-bootstrappackage-carousel-item'
                        ],
                        [
                            'Parallax',
                            'parallax',
                            'content-bootstrappackage-carousel-item'
                        ],
                        [
                            'Card',
                            'card',
                            'content-bootstrappackage-carousel-item'
                        ]
                    ],
                    'default' => 'default',
                ]
            ],

            'image' => [
                'label'  => 'Bild',
                'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                    'image',
                    [
                        'maxitems'         => 1,
                        'overrideChildTca' => [
                            'types' => [
                                \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                                    'showitem' => '
                                            --palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette_TitleAltTextCrop,
                                            --palette--;;filePalette'
                                ],
                            ],
                        ],

                    ],
                    $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
                ),
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

            'button_link'        => [
                'label'  => 'Button Link',
                'config' => [
                    'type'         => 'input',
                    'renderType'   => 'inputLink',
                    'size'         => 50,
                    'max'          => 1024,
                    'eval'         => 'trim',
                    'fieldControl' => [
                        'linkPopup' => [
                            'options' => [
                                'title' => 'Button Link',
                            ],
                        ],
                    ],
                    'softref'      => 'typolink'
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
        ],

        'interface' => [
            'showRecordFieldList' => '
        ',
        ],
    ];
});