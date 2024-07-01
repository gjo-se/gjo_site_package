<?php

namespace GjoSe\GjoSitePackage\Tests\UI\Objects;

/***************************************************************
 *  created: 31.01.20 - 11:45
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

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverExpectedCondition;

/**
 * Class AbstractObject
 * @package GjoSe\GjoIntroduction\Tests\UI\Objects
 */
abstract class AbstractObject
{
    const TIMEOUT_IN_SECOND = 10;

    const TIMEOUT_AJAX_IN_SECOND = 30;

    const INTERVALL_IN_MILLISECOND = 500;

    const WAIT_VISIBILITY_OF_ELEMENT_LOCATED = 'visibilityOfElementLocated';

    const WAIT_PRESENS_OF_ELEMENT_LOCATED = 'presenceOfElementLocated';

    /**
     * @var RemoteWebDriver
     */
    protected $driver = null;

    public function __construct($driver)
    {
        $this->driver = $driver;
    }

    /**
     * @return RemoteWebDriver
     */
    public function getDriver(): RemoteWebDriver
    {
        return $this->driver;
    }

    protected function wait($element, $waitMethod = '')
    {
        if(!$waitMethod){
            $waitMethod = self::WAIT_VISIBILITY_OF_ELEMENT_LOCATED;
        }

        $this->driver->wait(self::TIMEOUT_IN_SECOND, self::INTERVALL_IN_MILLISECOND)->until(
            WebDriverExpectedCondition::$waitMethod($element)
        );
    }

}