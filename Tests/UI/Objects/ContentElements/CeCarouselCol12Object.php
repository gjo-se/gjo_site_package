<?php

namespace GjoSe\GjoSitePackage\Tests\UI\Objects\ContentElements;

/***************************************************************
 *  created: 03.02.20 - 10:19
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

use GjoSe\GjoSitePackage\Tests\UI\Objects\ContentElements\AbstractCeObject;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverExpectedCondition;
use Facebook\WebDriver\Remote\RemoteWebElement;

class CeCarouselCol12Object extends AbstractCeObject
{
    const OBJECT_SELECTOR_CAROUSEL = '.ui-test-ceMainCarousel .ui-test-carousel-col12';
    const OBJECT_SELECTOR_FIRST_ITEM = ' .carousel-item:first-child';
    const OBJECT_SELECTOR_SECOND_ITEM = ' .carousel-item:nth-child(2)';
    const OBJECT_SELECTOR_LAST_ITEM = ' .carousel-item:last-child';
    const OBJECT_SELECTOR_CONTROL_NEXT = ' .carousel-item.active .carousel-control-next';
    const OBJECT_SELECTOR_CONTROL_PREV = ' .carousel-item.active .carousel-control-prev';
    const OBJECT_SELECTOR_BUTTON_SEE_PRODUCT = ' .carousel-item.active a.btn';
    const OBJECT_SELECTOR_IMAGE = ' .carousel-item.active picture img';
    const OBJECT_SELECTOR_IMAGE_LINK = ' .carousel-item.active figure a';

    /**
     * @param string $wait
     *
     * @return RemoteWebElement
     */
    public function getDOMObjectCeCarouselFirstItem($wait = '')
    {
        $elementLocator = WebDriverBy::cssSelector(self::OBJECT_SELECTOR_CAROUSEL . self::OBJECT_SELECTOR_FIRST_ITEM);
        $this->wait($elementLocator, $wait);

        return $this->driver->findElement($elementLocator);
    }

    /**
     * @param string $wait
     *
     * @return RemoteWebElement
     */
    public function getDOMObjectCeCarouselSecondItem($wait = '')
    {
        $elementLocator = WebDriverBy::cssSelector(self::OBJECT_SELECTOR_CAROUSEL . self::OBJECT_SELECTOR_SECOND_ITEM);
        $this->wait($elementLocator, $wait);

        return $this->driver->findElement($elementLocator);
    }

    /**
     * @param string $wait
     *
     * @return RemoteWebElement
     */
    public function getDOMObjectCeCarouselLastItem($wait = '')
    {
        $elementLocator = WebDriverBy::cssSelector(self::OBJECT_SELECTOR_CAROUSEL . self::OBJECT_SELECTOR_LAST_ITEM);
        $this->wait($elementLocator, $wait);

        return $this->driver->findElement($elementLocator);
    }

    /**
     * @param string $wait
     *
     * @return RemoteWebElement
     */
    public function getDOMObjectCeCarouselControlNext($wait = '')
    {
        $elementLocator = WebDriverBy::cssSelector(self::OBJECT_SELECTOR_CAROUSEL . self::OBJECT_SELECTOR_CONTROL_NEXT);
        $this->wait($elementLocator, $wait);

        return $this->driver->findElement($elementLocator);
    }

    /**
     * @param string $wait
     *
     * @return RemoteWebElement
     */
    public function getDOMObjectCeCarouselControlPrev($wait = '')
    {
        $elementLocator = WebDriverBy::cssSelector(self::OBJECT_SELECTOR_CAROUSEL . self::OBJECT_SELECTOR_CONTROL_PREV);
        $this->wait($elementLocator, $wait);

        return $this->driver->findElement($elementLocator);
    }

    /**
     * @param string $wait
     *
     * @return RemoteWebElement
     */
    public function getDOMObjectCeCarouselButtonSeeProduct($wait = '')
    {
        $elementLocator = WebDriverBy::cssSelector(self::OBJECT_SELECTOR_CAROUSEL . self::OBJECT_SELECTOR_BUTTON_SEE_PRODUCT);
        $this->wait($elementLocator, $wait);
        return $this->driver->findElement($elementLocator);

    }

    /**
     * @param string $wait
     *
     * @return RemoteWebElement
     */
    public function getDOMObjectCeCarouselImage($wait = '')
        {
            $elementLocator = WebDriverBy::cssSelector(self::OBJECT_SELECTOR_CAROUSEL . self::OBJECT_SELECTOR_IMAGE);
            $this->wait($elementLocator, $wait);
            return $this->driver->findElement($elementLocator);
        }

    /**
     * @param string $wait
     *
     * @return RemoteWebElement
     */
    public function getDOMObjectCeCarouselImageLink($wait = '')
        {
            $elementLocator = WebDriverBy::cssSelector(self::OBJECT_SELECTOR_CAROUSEL . self::OBJECT_SELECTOR_IMAGE_LINK);
            $this->wait($elementLocator, $wait);
            return $this->driver->findElement($elementLocator);
        }

}