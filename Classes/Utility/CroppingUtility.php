<?php

declare(strict_types=1);

namespace GjoSe\GjoSitePackage\Utility;

class CroppingUtility
{
    public static function setCropVariants(string $table, string $column): void
    {
        $defaultCropSettings = self::getBackendDefaultCropVariants();
        $lll = 'LLL:EXT:gjo_site_package/Resources/Private/Language/ContentElements.xlf:';

        $mobileCropSettings = $defaultCropSettings;
        $mobileCropSettings['title'] = $lll . 'cropVariant.mobile';
        $tabletCropSettings = $defaultCropSettings;
        $tabletCropSettings['title'] = $lll . 'cropVariant.tablet';
        $laptopCropSettings = $defaultCropSettings;
        $laptopCropSettings['title'] = $lll . 'cropVariant.laptop';
        $desktopCropSettings = $defaultCropSettings;
        $desktopCropSettings['title'] = $lll . 'cropVariant.desktop';
        $wideScreenCropSettings = $defaultCropSettings;
        $wideScreenCropSettings['title'] = $lll . 'cropVariant.wideScreen';

        $GLOBALS['TCA'][$table]['columns'][$column]['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['mobile'] = $mobileCropSettings;
        $GLOBALS['TCA'][$table]['columns'][$column]['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['tablet'] = $tabletCropSettings;
        $GLOBALS['TCA'][$table]['columns'][$column]['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['laptop'] = $laptopCropSettings;
        $GLOBALS['TCA'][$table]['columns'][$column]['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['desktop'] = $desktopCropSettings;
        $GLOBALS['TCA'][$table]['columns'][$column]['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['wideScreen'] = $wideScreenCropSettings;

    }

    /**
     * @return array{
     *     title: string,
     *     allowedAspectRatios: array<string, array{title: string, value: float}>,
     *     selectedRatio: string,
     *     cropArea: array{x: float, y: float, width: float, height: float}
     * }
     */
    private static function getBackendDefaultCropVariants(): array
    {
        return [
            'title' => 'LLL:EXT:gjo_site_package/Resources/Private/Language/Backend.xlf:option.default',
            'allowedAspectRatios' => [
                '1:1' => [
                    'title' => 'LLL:EXT:core/Resources/Private/Language/locallang_wizards.xlf:imwizard.ratio.1_1',
                    'value' => 1.0,
                ],
                '4:3' => [
                    'title' => 'LLL:EXT:core/Resources/Private/Language/locallang_wizards.xlf:imwizard.ratio.4_3',
                    'value' => 4 / 3,
                ],
                '3:4' => [
                    'title' => '3:4',
                    'value' => 3 / 4,
                ],
                '16:9' => [
                    'title' => 'LLL:EXT:core/Resources/Private/Language/locallang_wizards.xlf:imwizard.ratio.16_9',
                    'value' => 16 / 9,
                ],
                '21:9' => [
                    'title' => '21:9',
                    'value' => 21 / 9,
                ],
                'NaN' => [
                    'title' => 'LLL:EXT:core/Resources/Private/Language/locallang_wizards.xlf:imwizard.ratio.free',
                    'value' => 0.0,
                ],
            ],
            'selectedRatio' => 'NaN',
            'cropArea' => [
                'x' => 0.0,
                'y' => 0.0,
                'width' => 1.0,
                'height' => 1.0,
            ],
        ];
    }

    public static function getDefaultBreakpoints(): array
    {
        return [
            0 => [
                'cropVariant' => 'wideScreen',
                'media' => '(min-width: 1200px)',
                'srcset' => [
                    0 => 1100,
                ],
            ],
            1 => [
                'cropVariant' => 'desktop',
                'media' => '(min-width: 992px)',
                'srcset' => [
                    0 => 950,
                ],
            ],
            2 => [
                'cropVariant' => 'laptop',
                'media' => '(min-width: 768px)',
                'srcset' => [
                    0 => 720,
                ],
            ],
            3 => [
                'cropVariant' => 'tablet',
                'media' => '(min-width: 576px)',
                'srcset' => [
                    0 => 540,
                ],
            ],
            4 => [
                'cropVariant' => 'mobile',
                'media' => '(min-width: 300px)',
                'srcset' => [
                    0 => 350,
                ],
            ],
        ];
    }
}
