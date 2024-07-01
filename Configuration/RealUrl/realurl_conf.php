<?php
$GLOBALS['TYPO3_CONF_VARS']['FE']['addRootLineFields'] .= ',tx_realurl_pathsegment';

$domain      = $GLOBALS['_SERVER']['HTTP_HOST'];
$rootPageUid = 1;

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['realurl'][$domain] = array(

    'pagePath' => array(
        'type'              => 'user',
        'userFunc'          => 'EXT:realurl/class.tx_realurl_advanced.php:&tx_realurl_advanced->main',
        'spaceCharacter'    => '-',
        'languageGetVar'    => 'L',
        'expireDays'        => '3',
        'rootpage_id'       => $rootPageUid,
        'firstHitPathCache' => 1
    ),

    'init' => array(
        'enableCHashCache'          => true,
        'respectSimulateStaticURLs' => 0,
        'appendMissingSlash'        => 'ifNotFile,redirect',
        'adminJumpToBackend'        => true,
        'enableUrlDecodeCache'      => true,
        'enableUrlEncodeCache'      => true,
        'emptyUrlReturnValue'       => '/',
    ),

    'postVarSets' => array(
        '_DEFAULT' => array(
            'controller' => array(
                array(
                    'GETvar'  => 'tx_news_pi1[action]',
                    'noMatch' => 'bypass'
                ),
                array(
                    'GETvar'  => 'tx_news_pi1[controller]',
                    'noMatch' => 'bypass'
                ),
                array(
                    'GETvar' => 'tx_gjoextendsfemanager_femanagerforms[action]',
                    'noMatch' => 'bypass'
                ),
                array(
                    'GETvar' => 'tx_gjoextendsfemanager_femanagerforms[controller]',
                    'noMatch' => 'bypass'
                ),
                array(
                    'GETvar' => 'cHash',
                    'noMatch' => 'bypass'
                )
            ),

            'dateFilter' => array(
                array(
                    'GETvar' => 'tx_news_pi1[overwriteDemand][year]',
                ),
                array(
                    'GETvar' => 'tx_news_pi1[overwriteDemand][month]',
                ),
            ),
            'page'       => array(
                array(
                    'GETvar' => 'tx_news_pi1[@widget_0][currentPage]',
                ),
            ),
        ),
    ),

    'fixedPostVars' => array(
        'newsDetailConfiguration' => array(
            array(
                'GETvar' => 'tx_news_pi1[action]',
                'valueMap' => array(
                    'detail' => '',
                ),
                'noMatch' => 'bypass'
            ),
            array(
                'GETvar' => 'tx_news_pi1[controller]',
                'valueMap' => array(
                    'News' => '',
                ),
                'noMatch' => 'bypass'
            ),
            array(
                'GETvar' => 'tx_news_pi1[news]',
                'lookUpTable' => array(
                    'table' => 'tx_news_domain_model_news',
                    'id_field' => 'uid',
                    'alias_field' => 'title',
                    'addWhereClause' => ' AND NOT deleted',
                    'useUniqueCache' => 1,
                    'useUniqueCache_conf' => array(
                        'strtolower' => 1,
                        'spaceCharacter' => '-'
                    ),
                    'languageGetVar' => 'L',
                    'languageExceptionUids' => '',
                    'languageField' => 'sys_language_uid',
                    'transOrigPointerField' => 'l10n_parent',
                    'expireDays' => 180,
                )
            )
        ),
        'newsCategoryConfiguration' => array(
            array(
                'GETvar' => 'tx_news_pi1[overwriteDemand][categories]',
                'lookUpTable' => array(
                    'table' => 'sys_category',
                    'id_field' => 'uid',
                    'alias_field' => 'title',
                    'addWhereClause' => ' AND NOT deleted',
                    'useUniqueCache' => 1,
                    'useUniqueCache_conf' => array(
                        'strtolower' => 1,
                        'spaceCharacter' => '-'
                    )
                )
            )
        ),
        'newsTagConfiguration' => array(
            array(
                'GETvar' => 'tx_news_pi1[overwriteDemand][tags]',
                'lookUpTable' => array(
                    'table' => 'tx_news_domain_model_tag',
                    'id_field' => 'uid',
                    'alias_field' => 'title',
                    'addWhereClause' => ' AND NOT deleted',
                    'useUniqueCache' => 1,
                    'useUniqueCache_conf' => array(
                        'strtolower' => 1,
                        'spaceCharacter' => '-'
                    )
                )
            )
        ),
        '62' => 'newsDetailConfiguration',
//        '701' => 'newsDetailConfiguration', // For additional detail pages, add their uid as well
        '71' => 'newsTagConfiguration',
        '72' => 'newsCategoryConfiguration',
    ),

    'preVars' => array(
        array(
            'GETvar'   => 'L',
            'valueMap' => array(
                'de' => '0',
                'en' => '1'
            ),
        ),
        array(
            'GETvar'   => 'no_cache',
            'valueMap' => array(
                'nc' => 1,
            ),
            'noMatch'  => 'bypass',
        ),
        array(
            'GETvar'   => 'is_shop',
            'valueMap' => array(
                'shop' => 1,
            ),
            'noMatch'  => 'bypass',
        ),
    ),

    'fileName' => array(
        'defaultToHTMLsuffixOnPrev' => 0,
        'acceptHTMLsuffix'          => 1,
        'index'                     => array(
            'feed.rss' => array(
                'keyValues' => array(
                    'type' => $rssFeedPageType,
                )
            ),
            'print'    => array(
                'keyValues' => array(
                    'type' => 98,
                ),
            ),
        ),
    ),

);