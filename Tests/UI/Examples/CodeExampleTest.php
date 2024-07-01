<?php

namespace GjoSe\GjoSitePackage\Tests\UI\Examples;

/**
 * **************************************************************
 *  *  created: 2020
 *  *  Copyright notice
 *  *  (c) 2020 Gregory Jo Erdmann <gregory.jo@gjo-se.com>
 *  *  All rights reserved
 *  *  This script is part of the TYPO3 project. The TYPO3 project is
 *  *  free software; you can redistribute it and/or modify
 *  *  it under the terms of the GNU General Public License as published by
 *  *  the Free Software Foundation; either version 3 of the License, or
 *  *  (at your option) any later version.
 *  *  The GNU General Public License can be found at
 *  *  http://www.gnu.org/copyleft/gpl.html.
 *  *  This script is distributed in the hope that it will be useful,
 *  *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  *  GNU General Public License for more details.
 *  *  This copyright notice MUST APPEAR in all copies of the script!
 *  **************************************************************
 */


//



//if($element) {
//    $element->sendKeys("Browserstack");
//    $element->submit();
//}
//print $web_driver->getTitle();
//$web_driver->quit();

/**
 * FirstTest.
 *
 * @author Oliver Klee <typo3-coding@oliverklee.de>
 */
class CodeExampleTest extends \PHPUnit\Framework\TestCase
{
    //    /**
    //     * @test
    //     */
    //    public function firstText()
    //    {
    //        $caps = array(
    //            "browserName" => "iPhone",
    //            "device" => "iPhone 8 Plus",
    //            "realMobile" => "true",
    //            "os_version" => "11",
    //            "name" => "Bstack-[Php] Sample Test"
    //        );
    //        $web_driver = RemoteWebDriver::create(
    //            "https://gregoryjoerdmann1:y8MpHzPuPgZxBe7K2iBj@hub-cloud.browserstack.com/wd/hub",
    //            $caps
    //        );
    //
    //        $web_driver->get("http://google.com");
    //
    //        $element = $web_driver->findElement(WebDriverBy::name("q"));
    //        if($element) {
    //            $element->sendKeys("Browserstack");
    //            $element->submit();
    //        }
    //        print $web_driver->getTitle();
    //        $web_driver->quit();
    //    }
    //
    //    /**
    //     * @test
    //     */
    //    public function testGoogle() {
    //        $this->driver->get("https://www.google.com/ncr");
    //        $element = $this->driver->findElement(WebDriverBy::name("q"));
    //        $element->sendKeys("BrowserStack");
    //        $element->submit();
    //        $this->assertEquals('BrowserStack - Google Search', $this->driver->getTitle());
    //    }

    //    public function testLocal() {
    //        self::$driver->get("http://bs-local.com:45691/check");
    //        $this->assertContains('Up and running', self::$driver->getPageSource(), '', true);
    //    }

    public function testLocal() {
        self::$driver->get("http://bs-local.com:45691/check");
        $this->assertContains('Up and running', self::$driver->getPageSource(), '', true);
    }

    public function testGoogle() {
        self::$driver->get("https://www.google.com/ncr");
        $element = self::$driver->findElement(WebDriverBy::name("q"));
        $element->sendKeys("BrowserStack");
        $element->submit();
        self::$driver->wait(10, 500)->until(function($driver) {
            $elements = $driver->findElements(WebDriverBy::id("resultStats"));
            return count($elements) > 0;
        });
        $this->assertEquals('BrowserStack - Google Search', self::$driver->getTitle());
    }
}