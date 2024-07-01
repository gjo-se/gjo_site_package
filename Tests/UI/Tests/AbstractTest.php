<?php

namespace GjoSe\GjoSitePackage\Tests\UI\Tests;

/***************************************************************
 *  created: 06-Mrz-2020 12:00:49
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

use GjoSe\GjoSitePackage\Tests\UI\Objects\FeUser\UITestUserObject;
use GjoSe\GjoSitePackage\Tests\UI\Objects\Plugins\PluginLoginObject;
use GjoSe\GjoSitePackage\Tests\UI\Objects\Plugins\PluginLogoutObject;
use GjoSe\GjoSitePackage\Tests\UI\Objects\Sites\SiteObject;
use PHPUnit\Framework\TestCase;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use BrowserStack\Local;

abstract class AbstractTest extends TestCase
{

    const JQERY_RETURN_CODE = "return jQuery.active;";

    /**
     * @var SiteObject|null
     */
    protected $siteObject = null;

    /**
     * @var PluginLoginObject|null
     */
    protected $loginPluginObject = null;

    /**
     * @var PluginLogoutObject|null
     */
    protected $logoutPluginObject = null;

    /**
     * @var UITestUserObject|null
     */
    protected $uiTestUserObject = null;

    protected function setUp()
    {
        parent::setUp();

        $this->siteObject         = new SiteObject;

        //        if(getenv('ENV')){
        //            $this->env = getenv('ENV');
        //        }

        //        switch ($this->env) {
        //            case 'Development':
        //                // TODO:
        //                //  - run selenium-driver mit einbauen
        //                $this->setRemoteWebDriver();
        //                break;
        //            case 'Testing':
        //                // TODO:
        ////                $this->prepareBrowserstack(getenv('ENV'));
        //                break;
        //            case 'Production':
        //                // TODO:
        //                //  - composer anlegen
        //                //  - env setzen
        //                //  - config anlegen
        //                //  - config auslesen
        //                $this->prepareBrowserstack(getenv('ENV'));
        //                break;
        //            default:
        //                print ('Switch Error this-env: ' . $this->env);
        //        }
    }

    protected function tearDown()
    {
        if ($this->siteObject->getDriver()) {
            $this->siteObject->getDriver()->quit();
        }
    }

    function waitForAjax($driver)
    {
        $driver->wait($this->getSiteObject()::TIMEOUT_AJAX_IN_SECOND, $this->getSiteObject()::INTERVALL_IN_MILLISECOND)->until(
            function ($driver) {
                return !$driver->executeScript(self::JQERY_RETURN_CODE);
            }
        );
    }

    /**
     * @return SiteObject|null
     */
    public function getSiteObject(): ?SiteObject
    {
        return $this->siteObject;
    }

    /**
     * @return PluginLoginObject|null
     */
    public function getLoginPluginObject(): ?PluginLoginObject
    {
        if($this->loginPluginObject){
            return $this->loginPluginObject;
        }
        $this->loginPluginObject  = new PluginLoginObject($this->siteObject->getDriver());

        return $this->loginPluginObject;
    }

    /**
     * @return PluginLogoutObject|null
     */
    public function getLogoutPluginObject(): ?PluginLogoutObject
    {
        if($this->logoutPluginObject){
            return $this->logoutPluginObject;
        }
        $this->logoutPluginObject = new PluginLogoutObject($this->siteObject->getDriver());

        return $this->logoutPluginObject;
    }

    /**
     * @return UITestUserObject|null
     */
    public function getUiTestUserObject(): ?UITestUserObject
    {
        if($this->uiTestUserObject){
            return $this->uiTestUserObject;
        }
        $this->uiTestUserObject   = new UITestUserObject($this->siteObject->getDriver());

        return $this->uiTestUserObject;

    }

    /**
     * @return array
     */
    public function dataProviderUiTestUser()
    {
        return array(
            'inValid'  => array(
                'username' => 'unbekannter User',
                'password' => 'falsches Passwort',
                'email'    => 'unbekannterUser@gjo-se.com'
            ),
            'validB2C' => array(
                'username' => 'uiTestUser_b2c',
                'password' => 'sdfhgsadkl7((6',
                'email'    => 'uiTestUser_b2c@gjo-se.com'
            )
        );
    }
}