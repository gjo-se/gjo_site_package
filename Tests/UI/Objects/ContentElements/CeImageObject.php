<?php
namespace GjoSe\GjoSitePackage\Tests\UI\Objects\ContentElements;

/***************************************************************
 *  created: 06-Mrz-2020 11:03:16
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

class CeImageObject extends AbstractCeObject
{
    const OBJECT_SELECTOR_ALL_IMAGES = 'main img';

    const OBJECT_SELECTOR_AJAX_LIST_PRODUCTS_IMAGE = '.ajax-lists-products img';

    public function getAllDOMObjectsCeImage($wait = '')
    {
//        TODO: WAIT:
//        $elements = $driver->wait()->until(
//            WebDriverExpectedCondition::presenceOfAllElementsLocatedBy(WebDriverBy::cssSelector('ul > li'))
//        );

//        TODO: findParent
//        WebElement myElement = driver.findElement(By.id("myDiv"));
//        WebElement parent = myElement.findElement(By.xpath("..")); // div
//        WebElement parent = myElement.findElement(By.xpath("./.."));

        $elements = $this->driver->findElements(WebDriverBy::cssSelector(self::OBJECT_SELECTOR_ALL_IMAGES));
//        foreach ($elements as $element) {
//            $this->wait($element, $wait);
//        }
        return $elements;
    }

    public function getDOMObjectAjaxListProductImage($wait = 'presenceOfElementLocated')
    {

//        $this->driver->wait(10)->until(
//            WebDriverExpectedCondition::presenceOfAllElementsLocatedBy(
//                WebDriverBy::className('row-fluid')
//            )
//        );

        $elementLocator = WebDriverBy::cssSelector(self::OBJECT_SELECTOR_AJAX_LIST_PRODUCTS_IMAGE);

        $this->driver->wait(10)->until(
            WebDriverExpectedCondition::presenceOfAllElementsLocatedBy(
                $elementLocator
            )
        );

//        $this->waitForAjax($this->driver);
                $element = $this->driver->findElement($elementLocator);

//        $code = "return jQuery.active;";
//        $driver = $this->driver;
//        $this->driver->wait(30, 2000)->until(
//            function ($driver, $code) {
//                return !$driver->executeScript($code);
//            }
//        );

//        $this->wait($element, $wait);
        return $element;
    }

    public function waitForAjax($driver, $framework='jquery')
    {
        // javascript framework
        switch($framework){
            case 'jquery':
                $code = "return jQuery.active;"; break;
            case 'prototype':
                $code = "return Ajax.activeRequestCount;"; break;
            case 'dojo':
                $code = "return dojo.io.XMLHTTPTransport.inFlight.length;"; break;
            default:
                throw new Exception('Not supported framework');
        }

        // wait for at most 30s, retry every 2000ms (2s)
        $driver->wait(30, 2000)->until(
            function ($driver, $code) {
                return !$driver->executeScript($code);
            }
        );
    }

}