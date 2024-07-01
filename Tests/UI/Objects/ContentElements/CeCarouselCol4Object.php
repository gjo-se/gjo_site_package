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

class CeCarouselCol4Object extends AbstractCeObject
{
    const OBJECT_SELECTOR_CAROUSEL = '.ui-test-ceTigerCollectionCarousel .d-lg-block .ui-test-carousel-col4';

    const OBJECT_SELECTOR_FIRST_CONTAINER = ' .items_container_1';

    const OBJECT_SELECTOR_SECOND_CONTAINER = ' .items_container_2';

    const OBJECT_SELECTOR_LAST_CONTAINER = ' .carousel-inner div:last-child';

    const OBJECT_SELECTOR_CONTROL_NEXT = ' .controls-bottom a.next';

    const OBJECT_SELECTOR_CONTROL_PREV = ' .controls-bottom a.prev';

    const OBJECT_SELECTOR_FIRST_ITEM = ' .item_0';

    const OBJECT_SELECTOR_BUTTON_SEE_PRODUCT = ' a.btn';

    const OBJECT_SELECTOR_IMAGE = ' figure img';

    const OBJECT_SELECTOR_IMAGE_LINK = ' figure a';

    public function getDOMObjectCeCarouselFirstContainer($wait = '')
    {
        $elementLocator = WebDriverBy::cssSelector(self::OBJECT_SELECTOR_CAROUSEL . self::OBJECT_SELECTOR_FIRST_CONTAINER);
        $this->wait($elementLocator, $wait);
        return $this->driver->findElement($elementLocator);
    }

    public function getDOMObjectCeCarouselSecondContainer($wait = '')
    {
        $elementLocator = WebDriverBy::cssSelector(self::OBJECT_SELECTOR_CAROUSEL . self::OBJECT_SELECTOR_SECOND_CONTAINER);
        $this->wait($elementLocator, $wait);
        return $this->driver->findElement($elementLocator);
    }

    public function getDOMObjectCeCarouselLastContainer($wait = '')
    {
        $elementLocator = WebDriverBy::cssSelector(self::OBJECT_SELECTOR_CAROUSEL . self::OBJECT_SELECTOR_LAST_CONTAINER);
        $this->wait($elementLocator, $wait);
        return $this->driver->findElement($elementLocator);
    }

    public function getDOMObjectCeCarouselControlNext($wait = '')
    {
        $elementLocator = WebDriverBy::cssSelector(self::OBJECT_SELECTOR_CAROUSEL . self::OBJECT_SELECTOR_CONTROL_NEXT);
        $this->wait($elementLocator, $wait);
        return $this->driver->findElement($elementLocator);
    }

    public function getDOMObjectCeCarouselControlPrev($wait = '')
    {
        $elementLocator = WebDriverBy::cssSelector(self::OBJECT_SELECTOR_CAROUSEL . self::OBJECT_SELECTOR_CONTROL_PREV);
        $this->wait($elementLocator, $wait);
        return $this->driver->findElement($elementLocator);
    }

    public function getDOMObjectCeCarouselFirstContainerFirstItemButtonSeeProduct($wait = '')
    {
        $elementLocator = WebDriverBy::cssSelector(self::OBJECT_SELECTOR_CAROUSEL . self::OBJECT_SELECTOR_FIRST_CONTAINER . self::OBJECT_SELECTOR_FIRST_ITEM . self::OBJECT_SELECTOR_BUTTON_SEE_PRODUCT);
        $this->wait($elementLocator, $wait);
        return $this->driver->findElement($elementLocator);
    }

    public function getDOMObjectCeCarouselFirstContainerFirstItemImage($wait = '')
    {
        $elementLocator = WebDriverBy::cssSelector(self::OBJECT_SELECTOR_CAROUSEL . self::OBJECT_SELECTOR_FIRST_CONTAINER . self::OBJECT_SELECTOR_FIRST_ITEM . self::OBJECT_SELECTOR_IMAGE);
        $this->wait($elementLocator, $wait);
        return $this->driver->findElement($elementLocator);
    }

    public function getDOMObjectCeCarouselFirstContainerFirstItemImageLink($wait = '')
    {
        $elementLocator = WebDriverBy::cssSelector(self::OBJECT_SELECTOR_CAROUSEL . self::OBJECT_SELECTOR_FIRST_CONTAINER . self::OBJECT_SELECTOR_FIRST_ITEM . self::OBJECT_SELECTOR_IMAGE_LINK);
        $this->wait($elementLocator, $wait);
        return $this->driver->findElement($elementLocator);
    }

}