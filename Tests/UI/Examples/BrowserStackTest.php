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

require 'vendor/autoload.php';
require 'lib/globals.php';

class BrowserStackTest extends PHPUnit\Framework\TestCase
{
//    protected static $driver;
    protected static $bs_local;

    public static function setUpBeforeClass()
    {
        $CONFIG = $GLOBALS['CONFIG'];
        $task_id = getenv('TASK_ID') ? getenv('TASK_ID') : 0;

        $url = "https://" . $GLOBALS['BROWSERSTACK_USERNAME'] . ":" . $GLOBALS['BROWSERSTACK_ACCESS_KEY'] . "@" . $CONFIG['server'] ."/wd/hub";
        $caps = $CONFIG['environments'][$task_id];

        foreach ($CONFIG["capabilities"] as $key => $value) {
            if(!array_key_exists($key, $caps))
                $caps[$key] = $value;
        }

        if(array_key_exists("browserstack.local", $caps) && $caps["browserstack.local"])
        {
            $bs_local_args = array("key" => $GLOBALS['BROWSERSTACK_ACCESS_KEY']);
            self::$bs_local = new BrowserStack\Local();
            self::$bs_local->start($bs_local_args);
        }

        self::$driver = RemoteWebDriver::create($url, $caps);
    }

    public static function tearDownAfterClass()
    {
        self::$driver->quit();
        if(self::$bs_local) self::$bs_local->stop();
    }
}
?>
