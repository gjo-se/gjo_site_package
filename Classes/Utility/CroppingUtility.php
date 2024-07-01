<?php

namespace GjoSe\GjoSitePackage\Utility;

/***************************************************************
 *  created: 27.02.18 - 16:57
 *  Copyright notice
 *  (c) 2018 Gregory Jo Erdmann <gregory.jo@gjo-se.com>
 *  All rights reserved
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

use GjoSe\GjoBoilerplate\Utility\AbstractUtility;

/**
 * Class CroppingUtility
 * @package GjoSe\GjoSitePackage\Controller
 */
class CroppingUtility extends AbstractUtility
{
    static function getDefaultCropSettings()
    {
        $defaultCropSettings = [
            'title' => 'LLL:EXT:gjo_site_package/Resources/Private/Language/Backend.xlf:option.default',
            'allowedAspectRatios' => [
                '1:1' => [
                    'title' => 'LLL:EXT:lang/Resources/Private/Language/locallang_wizards.xlf:imwizard.ratio.1_1',
                    'value' => 1.0
                ],
                '4:3' => [
                    'title' => 'LLL:EXT:lang/Resources/Private/Language/locallang_wizards.xlf:imwizard.ratio.4_3',
                    'value' => 4 / 3
                ],
                '3:4' => [
                    'title' => '3:4',
                    'value' => 3 / 4
                ],
                '16:9' => [
                    'title' => 'LLL:EXT:lang/Resources/Private/Language/locallang_wizards.xlf:imwizard.ratio.16_9',
                    'value' => 16 / 9
                ],
                '21:9' => [
                    'title' => '21:9',
                    'value' => 21 / 9
                ],
                'NaN' => [
                    'title' => 'LLL:EXT:lang/Resources/Private/Language/locallang_wizards.xlf:imwizard.ratio.free',
                    'value' => 0.0
                ],
            ],
            'selectedRatio' => 'NaN',
            'cropArea' => [
                'x' => 0.0,
                'y' => 0.0,
                'width' => 1.0,
                'height' => 1.0,
            ]
        ];

        return $defaultCropSettings;
    }

}