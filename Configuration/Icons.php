<?php

declare(strict_types=1);

use TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider;

// @todo-methodClean:
// foreach file in folder

return (function (): array {
    $iconList = [];
    foreach ([
        'content-bootstrappackage-accordion' => 'accordion.svg',
        'content-bootstrappackage-tab' => 'tab.svg',
        'content-bootstrappackage-carousel' => 'carousel.svg',
        'content-bootstrappackage-carousel-item' => 'carousel-item.svg',
        'content-bootstrappackage-carousel-item-header' => 'carousel-item-header.svg',
        'content-bootstrappackage-carousel-item-textandimage' => 'carousel-item-textandimage.svg',
        'content-bootstrappackage-carousel-item-backgroundimage' => 'carousel-item-backgroundimage.svg',
        'content-bootstrappackage-carousel-item-html' => 'carousel-item-html.svg',
    ] as $identifier => $path) {
        $iconList[$identifier] = [
            'provider' => SvgIconProvider::class,
            'source' => 'EXT:gjo_site_package/Resources/Public/Icons/ContentElements/' . $path,
        ];
    }

    return $iconList;
})();
