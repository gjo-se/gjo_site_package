<?php

namespace GjoSe\GjoSitePackage\Tests\UI\Objects\Sites;

/**
 * **************************************************************
 *  *  created: 24-Feb-2020 05:48:14
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

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use GjoSe\GjoSitePackage\Tests\UI\Objects\AbstractObject;
use Facebook\WebDriver\Chrome\ChromeOptions;

// TODO:
//  - ObjectService bauen
//  - im Zuge mit Brwoserstack
//  - und das AbstractSiteObject so simple wie Ce, Plugin etc.
class AbstractSiteObject extends AbstractObject
{
    const DEV_ENV = 'Development';

    const DEV_PROTOCOL = 'http://';

    const DEV_SUBDOMAIN = 'dev.';

    const TEST_PROTOCOL = 'https://';

    const TEST_SUBDOMAIN = 'test.';

    const TEST_BASIC_AUTH_NAME = 'Tiger@2020';

    const TEST_BASIC_AUTH_PASS = 'Tiger@2020';

    const DOMAIN = 'tiger.de';

    const LOCAL_SELENIUM_SERVER_URL = 'http://localhost:4444/wd/hub';

    protected $env = '';

    /**
     * @var string
     */
    protected $path = '';

    /**
     * @var string
     */
    protected $url = '';

    public function __construct()
    {
        if(getenv('ENV')){
            $env = getenv('ENV');
        }else{
            $env = self::DEV_ENV;
        }
        $this->setEnv($env);
        $this->setRemoteWebDriver();
    }

    /**
     * @return string
     */
    public function getEnv(): string
    {
        return $this->env;
    }

    /**
     * @param string $env
     *
     * @return void
     */
    public function setEnv($env)
    {
        $this->env = $env;
    }

    /**
     * @return void
     */
    protected function setRemoteWebDriver()
    {
        // TODO:
        //  - Abhängig von ENV splitten
        //  - ChromeOptions auslagern / generischer
        $options = new ChromeOptions();
        if($this->env == 'Testing'){
            $options->addArguments(['--headless', 'window-size=1024,768']);
        }

        $caps = DesiredCapabilities::chrome();
        $caps->setCapability(ChromeOptions::CAPABILITY, $options);

        $this->driver = RemoteWebDriver::create(self::LOCAL_SELENIUM_SERVER_URL, $caps);
    }

    /**
     * @param string $path
     *
     * @return void
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * @return string
     */
    public function setUrl($lang, $path = '', $baseAuth = false): string
    {
        switch ($this->env) {
            case 'Development':
                $this->url = self::DEV_PROTOCOL . self::DEV_SUBDOMAIN . self::DOMAIN . '/' . $lang . '/';
                break;
            case 'Testing':
                $baseAuthString = '';
                if($baseAuth){
                    $baseAuthString = urlencode(self::TEST_BASIC_AUTH_NAME) . ':' . urlencode(self::TEST_BASIC_AUTH_PASS). '@';
                }
                $this->url = self::TEST_PROTOCOL . $baseAuthString . self::TEST_SUBDOMAIN . self::DOMAIN . '/' . $lang . '/';
                break;
            case 'Production':
                // TODO:
                //  - composer anlegen
                //  - env setzen
                //  - config anlegen
                //  - config auslesen
                $this->prepareBrowserstack(getenv('ENV'));
                break;
            default:
                print ('Switch Error this-env: ' . $this->env);
        }
        if ($path) {
            $this->url .= $path . '/';
        }

        return $this->url;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    public function setTargetPath($lang, $targetPagePath)
    {
        $this->setUrl($lang, $targetPagePath);
    }

    public function setLoginPage($lang, $targetPagePath = 'login')
    {
        $this->setPath($targetPagePath);
        $this->setUrl($lang);
    }

    ############### BrowserStack ########################

//    protected $config = '';
//
//    protected $user = '';
//
//    protected $key = '';
//
//    private function setConfig($configFile)
//    {
//        if (!$configFile) {
//            $configFile = 'web/typo3conf/ext/gjo_site_package/Tests/UI/Configuration/Enviroment/' . getenv('ENV') . '/conf.json';
//        }
//        $this->config = json_decode(file_get_contents($configFile), true);
//    }
//
//    protected function setUser()
//    {
//        if (!$this->user) {
//            $this->user = $this->config['user'];
//        }
//    }
//
//    protected function setKey()
//    {
//        if (!$this->key) {
//            $this->key = $this->config['key'];
//        }
//    }

    // TODO: hier Ordnung machen, sobald ich BrowserStack nutze
//    private function prepareBrwoserstack()
//    {
//        $this->setConfig();
        //        $this->setUser();
        //        $this->setKey();

        //        if(getenv('ENV')){
        //            $this->setEnv(getenv('ENV'));
        //        }else{
        //            $this->setEnv('Development');
        //        }

        //        $procs = array();
        //
        //        foreach ($GLOBALS['CONFIG']['environments'] as $key => $value) {
        //            $cmd = "TASK_ID=$key vendor/bin/phpunit web/typo3conf/ext/gjo_site_package/Tests/UI/Tests/Sites/BrowserStackTest.php 2>&1\n";
        //            print_r($cmd);
        //
        //            $procs[$key] = popen($cmd, "r");
        //        }
        //
        //        foreach ($procs as $key => $value) {
        //            while (!feof($value)) {
        //                print fgets($value, 4096);
        //            }
        //            pclose($value);
        //        }

        ////        if(!$config_file) $config_file = '../../phpunit-browserstack/config/single.conf.json';
        //        if(!$config_file) $config_file = '/Volumes/MiniDaten/Users/gregoryjodaily/Documents/Dropbox/5-Berufsleben/gjoSe/Development/Projects/tiger.de/web/typo3conf/ext/gjo_site_package/Tests/phpunit-browserstack/config/single.conf.json';
        //        $GLOBALS['CONFIG'] = json_decode(file_get_contents($config_file), true);
        //
        //        $GLOBALS['BROWSERSTACK_USERNAME'] = getenv('BROWSERSTACK_USERNAME');
        //        if(!$GLOBALS['BROWSERSTACK_USERNAME']) $GLOBALS['BROWSERSTACK_USERNAME'] = $GLOBALS['CONFIG']['user'];
        //
        //        $GLOBALS['BROWSERSTACK_ACCESS_KEY'] = getenv('BROWSERSTACK_ACCESS_KEY');
        //        if(!$GLOBALS['BROWSERSTACK_ACCESS_KEY']) $GLOBALS['BROWSERSTACK_ACCESS_KEY'] = $GLOBALS['CONFIG']['key'];

        //

        //        $CONFIG = $GLOBALS['CONFIG'];
        //        $task_id = getenv('TASK_ID') ? getenv('TASK_ID') : 0;
        //
        //        $url = "https://" . $GLOBALS['BROWSERSTACK_USERNAME'] . ":" . $GLOBALS['BROWSERSTACK_ACCESS_KEY'] . "@" . $CONFIG['server'] ."/wd/hub";
        //        $caps = $CONFIG['environments'][$task_id];

        //        foreach ($CONFIG["capabilities"] as $key => $value) {
        //            if(!array_key_exists($key, $caps))
        //                $caps[$key] = $value;
        //        }

        //TODO: wahrscheinlich kann der raus, lokal werde ich auch lokal ausführen, ohne Brwoserstack
        //        if(array_key_exists("browserstack.local", $caps) && $caps["browserstack.local"])
        //        {
        //            $bs_local_args = array("key" => $GLOBALS['BROWSERSTACK_ACCESS_KEY']);
        //            self::$bs_local = new BrowserStack\Local();
        //            self::$bs_local->start($bs_local_args);
        //        }

        //        $this->driver = RemoteWebDriver::create($url, $caps);

        //        $caps = array(
        //            "browser" => "IE",
        //            "browser_version" => "11.0",
        //            "os" => "Windows",
        //            "os_version" => "10",
        //            "resolution" => "1024x768",
        //            "name" => "Bstack-[Php] Sample Test"
        //        );
        //        $caps = array(
        //            "browserName" => "iPhone",
        //            "device" => "iPhone 8 Plus",
        //            "realMobile" => "true",
        //            "os_version" => "11",
        //            "name" => "Bstack-[Php] Sample Test"
        //        );

        // LOKAL
        //

        // REMOTE
        //        $this->driver = RemoteWebDriver::create(
        //            "https://gregoryjoerdmann1:y8MpHzPuPgZxBe7K2iBj@hub-cloud.browserstack.com/wd/hub",
        //            $caps
        //        );

//    }
}