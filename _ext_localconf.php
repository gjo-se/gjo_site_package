<?php
declare(strict_types=1);
defined('TYPO3') or die('Access denied.');

//use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
//use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
//use TTN\Tea\Controller\FrontEndEditorController;
//
//// This makes the plugin available for front-end rendering.
//ExtensionUtility::configurePlugin(
//// extension name, matching the PHP namespaces (but without the vendor)
//    'Tea',
//    // arbitrary, but unique plugin name (not visible in the BE)
//    'TeaFrontEndEditor',
//    // all actions
//    [
//        FrontEndEditorController::class => 'index, edit, update, create, new, delete',
//    ],
//    // non-cacheable actions
//    [
//        // All actions need to be non-cacheable because they either contain dynamic data,
//        // or because they are specific to the logged-in FE user (while FE content is cached by FE groups).
//        FrontEndEditorController::class => 'index, edit, update, create, new, delete',
//    ]
//);
//
///***************
// * Add default RTE configuration
// */
//$GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['mysitepacke'] = 'EXT:mysitepacke/Configuration/RTE/Default.yaml';
//
///***************
// * PageTS
// */
//ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:mysitepacke/Configuration/TsConfig/Page/All.tsconfig">');








