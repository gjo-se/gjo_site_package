<?php

use TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider;
use TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider;
use TYPO3\CMS\Core\Imaging\IconRegistry;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

defined('TYPO3') or die('Access denied.');

$extensionKey = 'gjo_site_package';

//workaround for Exception 1288965219: $className must be a non empty string
// see https://github.com/FluidTYPO3/flux/issues/1375
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ElementBrowsers']['file_reference'] = $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ElementBrowsers']['file'];

/***************
 * Register Icons
 */
// SVG
$iconRegistry = GeneralUtility::makeInstance(IconRegistry::class);
$iconRegistry->registerIcon(
    'content-bootstrappackage-accordion',
    SvgIconProvider::class,
    ['source' => 'EXT:gjo_introduction/Resources/Public/Icons/ContentElements/accordion.svg']
);
$iconRegistry->registerIcon(
    'content-bootstrappackage-tab',
    SvgIconProvider::class,
    ['source' => 'EXT:gjo_introduction/Resources/Public/Icons/ContentElements/tab.svg']
);
$iconRegistry->registerIcon(
    'content-bootstrappackage-carousel',
    SvgIconProvider::class,
    ['source' => 'EXT:gjo_introduction/Resources/Public/Icons/ContentElements/carousel.svg']
);
$iconRegistry->registerIcon(
    'content-bootstrappackage-carousel-item',
    SvgIconProvider::class,
    ['source' => 'EXT:gjo_introduction/Resources/Public/Icons/ContentElements/carousel-item.svg']
);
$iconRegistry->registerIcon(
    'content-bootstrappackage-carousel-item-header',
    SvgIconProvider::class,
    ['source' => 'EXT:gjo_introduction/Resources/Public/Icons/ContentElements/carousel-item-header.svg']
);
$iconRegistry->registerIcon(
    'content-bootstrappackage-carousel-item-textandimage',
    SvgIconProvider::class,
    ['source' => 'EXT:gjo_introduction/Resources/Public/Icons/ContentElements/carousel-item-textandimage.svg']
);
$iconRegistry->registerIcon(
    'content-bootstrappackage-carousel-item-backgroundimage',
    SvgIconProvider::class,
    ['source' => 'EXT:gjo_introduction/Resources/Public/Icons/ContentElements/carousel-item-backgroundimage.svg']
);
$iconRegistry->registerIcon(
    'content-bootstrappackage-carousel-item-html',
    SvgIconProvider::class,
    ['source' => 'EXT:gjo_introduction/Resources/Public/Icons/ContentElements/carousel-item-html.svg']
);


//PNG
$iconRegistry->registerIcon(
    'tiger-icon',
    BitmapIconProvider::class,
    ['source' => 'EXT:gjo_tiger/Resources/Public/Icons/tiger_icon.png']
);

ExtensionManagementUtility::allowTableOnStandardPages('tx_gjointroduction_carousel_item');
ExtensionManagementUtility::allowTableOnStandardPages('tx_gjointroduction_content_element_item');
