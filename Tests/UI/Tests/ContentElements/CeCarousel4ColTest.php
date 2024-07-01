<?php

namespace GjoSe\GjoSitePackage\Tests\UI\Tests\ContentElements;

/***************************************************************
 *  created: 2020-01-21 - 07:02
 *  Copyright notice
 *  (c) 2020 Gregory Jo Erdmann <gregory.jo@gjo-se.com>
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

use GjoSe\GjoSitePackage\Tests\UI\Objects\Sites\TigerDeEvolutionObject;
use GjoSe\GjoSitePackage\Tests\UI\Tests\AbstractTest;
use GjoSe\GjoSitePackage\Tests\UI\Objects\ContentElements\CeCarouselCol4Object;
use GjoSe\GjoSitePackage\Tests\UI\Objects\Sites\TigerDeObject;

class CeCarousel4ColTest extends AbstractCeTest
{
    /**
     * @test
     *
     * @param $lang
     * @param $path
     *
     * @dataProvider dataProviderSitemap
     */
    public function firstContainerIsDisplayedTest($lang, $path)
    {
        $this->getSiteObject()->open($lang, $path);
        self::assertTrue($this->getCeCarouselCol4Object()->getDOMObjectCeCarouselFirstContainer()->isDisplayed());
    }

    /**
     * @test
     *
     * @param $lang
     * @param $path
     *
     * @dataProvider dataProviderSitemap
     */
    public function clickCarouselControlNextSecondContainerIsDisplayedTest($lang, $path)
    {
        $this->getSiteObject()->open($lang, $path);
        $carouselControlNext = $this->getCeCarouselCol4Object()->getDOMObjectCeCarouselControlNext();
        if ($carouselControlNext->isDisplayed()) {
            $carouselControlNext->click();
        }
        self::assertTrue($this->getCeCarouselCol4Object()->getDOMObjectCeCarouselSecondContainer()->isDisplayed());
    }

    /**
     * @test
     *
     * @param $lang
     * @param $path
     *
     * @dataProvider dataProviderSitemap
     */
    public function clickCarouselControlPrevLastContainerIsDisplayedTest($lang, $path)
    {
        $this->getSiteObject()->open($lang, $path);
        $carouselControlPrev = $this->getCeCarouselCol4Object()->getDOMObjectCeCarouselControlPrev();
        if ($carouselControlPrev->isDisplayed()) {
            $carouselControlPrev->click();
        }
        self::assertTrue($this->getCeCarouselCol4Object()->getDOMObjectCeCarouselLastContainer()->isDisplayed());
    }

    /**
     * @test
     *
     * @param $lang
     * @param $path
     *
     * @dataProvider dataProviderSitemap
     */
    public function clickFirstItemButtonSeeProductTargetPageIsDisplayedTest($lang, $path)
    {
        $this->getSiteObject()->open($lang, $path);
        $buttonSeeProduct = $this->getCeCarouselCol4Object()->getDOMObjectCeCarouselFirstContainerFirstItemButtonSeeProduct();
        if ($buttonSeeProduct->isDisplayed()) {
            $href = $buttonSeeProduct->getAttribute('href');
            $buttonSeeProduct->click();
        }
        self::assertEquals($href, $this->getSiteObject()->getDriver()->getCurrentURL());
        self::assertNotEquals('404', $this->getSiteObject()->getDriver()->getTitle());
    }

    /**
     * @test
     *
     * @param $lang
     * @param $path
     *
     * @dataProvider dataProviderSitemap
     */
    public function clickImageTargetPageIsDisplayedTest($lang, $path)
    {
        $this->getSiteObject()->open($lang, $path);
        $image = $this->getCeCarouselCol4Object()->getDOMObjectCeCarouselFirstContainerFirstItemImage();
        if ($image->isDisplayed()) {
            $href             = $this->getCeCarouselCol4Object()->getDOMObjectCeCarouselFirstContainerFirstItemImageLink()->getAttribute('href');
            $imageCoordinates = $image->getCoordinates();
            $this->getSiteObject()->getDriver()->getMouse()->click($imageCoordinates);
        }
        self::assertEquals($href, $this->getSiteObject()->getDriver()->getCurrentURL());
        self::assertNotEquals('404', $this->getSiteObject()->getDriver()->getTitle());
    }

    /**
     * @return array
     */
    public function dataProviderSitemap()
    {
        return array(
            'de/home' => ['de', '']
        );
    }
}