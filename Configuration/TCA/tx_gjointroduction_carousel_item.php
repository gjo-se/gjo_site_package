<?php

return call_user_func(function () {

    $ext      = 'gjo_site_package';
    $lll      = 'LLL:EXT:' . $ext . '/Resources/Private/Language/ContentElements.xlf:';
    $cePreKey = 'carousel_item.';
    $lllLang  = 'LLL:EXT:' . 'lang/Resources/Private/Language/locallang_general.xlf:';

    $table = 'tx_gjositepackage_carousel_item';

    return [

        'ctrl' => [
            'title' => $lll . 'carousel',
            'label' => 'header',

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
                    'behaviour' => [
                        'allowLanguageSynchronization' => true
                    ],
                    'range'      => [
                        'upper' => mktime(0, 0, 0, 1, 1, 2038)
                    ]
                ]
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

            'tt_content' => [
                'exclude' => true,
                'label'   => $lll . $cePreKey . 'tt_content',
                'config'  => [
                    'type'                => 'select',
                    'renderType'          => 'selectSingle',
                    'foreign_table'       => 'tt_content',
                    'foreign_table_where' => 'AND tt_content.pid=###CURRENT_PID### AND tt_content.CType="carousel"',
                    'maxitems'            => 1,
                ],
            ],

            'image' => [
                'label'  => $lll . $cePreKey . 'image',
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

            'is_background_image' => [
                'label'  => $lll . $cePreKey . 'is_background_image',
                'config' => [
                    'type' => 'check',
                ],
            ],
            'header'              => [
                'label'  => $lll . $cePreKey . 'header',
                'config' => [
                    'type' => 'input',
                    'size' => 50,
                    'eval' => 'trim'
                ],
            ],

            'mask_css_class' => [
                'label'  => $lll . $cePreKey . 'mask_css_class',
                'config' => [
                    'type' => 'input',
                    'size' => 50,
                    'eval' => 'trim'
                ]
            ],

            'button_text' => [
                'label'  => $lll . $cePreKey . 'button_text',
                'config' => [
                    'type' => 'input',
                    'size' => 50,
                    'eval' => 'trim'
                ]
            ],

            'button_link'        => [
                'label'  => $lll . $cePreKey . 'button_link',
                'config' => [
                    'type'         => 'input',
                    'renderType'   => 'inputLink',
                    'size'         => 50,
                    'max'          => 1024,
                    'eval'         => 'trim',
                    'fieldControl' => [
                        'linkPopup' => [
                            'options' => [
                                'title' => $lll . 'carousel_item.button_link',
                            ],
                        ],
                    ],
                    'softref'      => 'typolink'
                ],
            ],

            'bodytext'            => [
                'label'     => $lll . $cePreKey . 'bodytext',
                'config'    => [
                    'type'           => 'text',
                    'cols'           => 80,
                    'rows'           => 15,
                    'enableRichtext' => true,
                    'softref'        => 'typolink_tag,images,email[subst],url',
                ],
            ],

            'element_tag' => [
                'label'  => $lll . $cePreKey . 'element_tag',
                'config' => [
                    'type' => 'input',
                    'size' => 50,
                    'eval' => 'trim'
                ]
            ],

            // TODO: fieldControl klären, softref
            'link'        => [
                'label'  => $lll . $cePreKey . 'link',
                'config' => [
                    'type'         => 'input',
                    'renderType'   => 'inputLink',
                    'size'         => 50,
                    'max'          => 1024,
                    'eval'         => 'trim',
                    'fieldControl' => [
                        'linkPopup' => [
                            'options' => [
                                'title' => $lll . 'carousel_item.link',
                            ],
                        ],
                    ],
                    'softref'      => 'typolink'
                ],
            ],

            'additional_css' => [
                'label'  => $lll . $cePreKey . 'additional_css',
                'config' => [
                    'type' => 'input'
                ]
            ],

        ],

        'palettes' => [
            '1'     => [
                'showitem' => ''
            ],
            'media' => [
                'showitem' => '
                    image,
                    --linebreak--,
                    mask_css_class,
                    --linebreak--,                    
                    is_background_image
                '

            ],
            'text'  => [
                'showitem' => '
                    header,
                    --linebreak--,
                    bodytext,
                    --linebreak--,
                    button_text, button_link,
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

        // TODO: divider in Boilerplate vesrchieben
        'types'    => [
            '1'               => [
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
            '
            ],
//            'header'          => [
//                'showitem' => '
//                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
//                --palette--;LLL:EXT:bootstrap_package/Resources/Private/Language/Backend.xlf:carousel_item.header;header,
//                    link,
//                --div--;LLL:EXT:bootstrap_package/Resources/Private/Language/Backend.xlf:tabs.background,
//                    background_image,
//                --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access,
//                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.visibility;visibility,
//                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
//            '
//            ],
//            'textandimage'    => [
//                'showitem' => '
//                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
//                --palette--;LLL:EXT:bootstrap_package/Resources/Private/Language/Backend.xlf:carousel_item.header;header,
//                    bodytext,
//                    image,
//                    link,
//                --div--;LLL:EXT:bootstrap_package/Resources/Private/Language/Backend.xlf:tabs.background,
//                    background_image,
//                --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access,
//                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.visibility;visibility,
//                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
//            '
//            ],
//            'backgroundimage' => [
//                'showitem' => '
//                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
//                header;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:header.ALT.html_formlabel,
//                    background_image,
//                --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access,
//                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.visibility;visibility,
//                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
//            '
//            ],

//            'html'            => [
//                'showitem' => '
//                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
//                    header;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:header.ALT.html_formlabel,
//                    bodytext;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:bodytext.ALT.html_formlabel,
//                --div--;LLL:EXT:bootstrap_package/Resources/Private/Language/Backend.xlf:tabs.background,
//                    background_image,
//                --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access,
//                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.visibility;visibility,
//                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
//            '
//            ],
        ],

        'interface' => [
            'showRecordFieldList' => '
            hidden,
            tt_content,
            header,
            bodytext,
            image,
            background_image
        ',
        ],
    ];
});