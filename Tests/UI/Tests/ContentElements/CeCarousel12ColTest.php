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

class CeCarousel12ColTest extends AbstractCeTest
{
    /**
     * @test
     *
     * @param $lang
     * @param $path
     *
     * @dataProvider dataProviderSitemap
     */
    public function firstItemIsDisplayedTest($lang, $path)
    {
        $this->getSiteObject()->open($lang, $path);
        self::assertTrue($this->getCeCarouselCol12Object()->getDOMObjectCeCarouselFirstItem()->isDisplayed());
    }

    /**
     * @test
     *
     * @param $lang
     * @param $path
     *
     * @dataProvider dataProviderSitemap
     */
    public function waitForAutoplayUntilSecondItemIsDisplayedTest($lang, $path)
    {
        $this->getSiteObject()->open($lang, $path);
        self::assertTrue($this->getCeCarouselCol12Object()->getDOMObjectCeCarouselFirstItem()->isDisplayed());
        self::assertTrue($this->getCeCarouselCol12Object()->getDOMObjectCeCarouselSecondItem()->isDisplayed());
    }

    /**
     * @test
     *
     * @param $lang
     * @param $path
     *
     * @dataProvider dataProviderSitemap
     */
    public function clickCarouselControlNextSecondItemIsDisplayedTest($lang, $path)
    {
        $this->getSiteObject()->open($lang, $path);
        $carouselControlNext = $this->getCeCarouselCol12Object()->getDOMObjectCeCarouselControlNext();
        if($carouselControlNext->isDisplayed()){
            $carouselControlNext->click();
        }
        self::assertTrue($this->getCeCarouselCol12Object()->getDOMObjectCeCarouselSecondItem()->isDisplayed());
    }

    /**
     * @test
     *
     * @param $lang
     * @param $path
     *
     * @dataProvider dataProviderSitemap
     */
    public function clickCarouselControlPrevLastItemIsDisplayedTest($lang, $path)
    {
        $this->getSiteObject()->open($lang, $path);
        $carouselControlPrev = $this->getCeCarouselCol12Object()->getDOMObjectCeCarouselControlPrev();
        if($carouselControlPrev->isDisplayed()){
            $carouselControlPrev->click();
        }
        self::assertTrue($this->getCeCarouselCol12Object()->getDOMObjectCeCarouselLastItem()->isDisplayed());
    }

    /**
     * @test
     *
     * @param $lang
     * @param $path
     *
     * @dataProvider dataProviderSitemap
     */
    public function clickButtonSeeProductTargetPageIsDisplayedTest($lang, $path)
    {
        $this->getSiteObject()->open($lang, $path);
        $buttonSeeProduct = $this->getCeCarouselCol12Object()->getDOMObjectCeCarouselButtonSeeProduct();
        if($buttonSeeProduct->isDisplayed()){
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
        $image = $this->getCeCarouselCol12Object()->getDOMObjectCeCarouselImage();
        if($image->isDisplayed()){
            $href = $this->getCeCarouselCol12Object()->getDOMObjectCeCarouselImageLink()->getAttribute('href');
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