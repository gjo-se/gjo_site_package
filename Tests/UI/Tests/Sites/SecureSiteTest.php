<?php

namespace GjoSe\GjoSitePackage\Tests\UI\Tests\Sites;

/**
 * **************************************************************
 *  *  created: 03-Mrz-2020 05:32:31
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

use GjoSe\GjoSitePackage\Tests\UI\Objects\FeUser\UITestUserObject;
use GjoSe\GjoSitePackage\Tests\UI\Objects\Plugins\PluginLoginObject;
use GjoSe\GjoSitePackage\Tests\UI\Objects\Plugins\PluginLogoutObject;
use GjoSe\GjoSitePackage\Tests\UI\Objects\Sites\SiteObject;

class SecureSiteTest extends AbstractSiteTest
{
    /**
     * @test
     *
     * @param $lang
     * @param $path
     *
     * @dataProvider dataProviderSitemap
     */
    public function feUserIsNotLoggedIn_redirectsToPage_Test($lang, $path, $redirectToPath)
    {
        $this->getSiteObject()->open($lang, $path, $redirectToPath);

        self::assertNotTrue($this->getUiTestUserObject()->isLoggedIn());
        self::assertEquals($this->getSiteObject()->getUrl(), $this->getSiteObject()->getDriver()->getCurrentURL());

        if ($redirectToPath == '404') {
            // for BUG in TYPO3 HTTP BasicAuth & pageNotFoundHandling
            if($this->getSiteObject()->getEnv() == 'Testing'){
                self::assertEquals(parent::TYPO3_EXCEPTION_TITLE, $this->getSiteObject()->getDriver()->getTitle());
            }else{
                self::assertEquals('404', $this->getSiteObject()->getDriver()->getTitle());
            }

            $this->navigateToPage($lang, 'login');
            self::assertEquals('Login', $this->getSiteObject()->getDriver()->getTitle());
            $this->login();
            $this->navigateToPage($lang, $path);
        }

        if ($redirectToPath == 'login') {
            self::assertEquals('Login', $this->getSiteObject()->getDriver()->getTitle());

            $this->login();
            $this->navigateToPage($lang, $path);
            self::assertNotEquals('login', $this->getSiteObject()->getDriver()->getTitle());
        }

        self::assertTrue($this->getUiTestUserObject()->isLoggedIn());
        self::assertNotEquals('404', $this->getSiteObject()->getDriver()->getTitle());
    }

    /**
     * @return array
     */
    public function dataProviderSitemap()
    {
        return array(
            // redirect from Site
            'de/mytiger'               => ['de', 'mytiger', 'redirectToPath' => '404'],
            'en/mytiger'               => ['en', 'mytiger', 'redirectToPath' => '404'],
            'de/register-bestaetigung' => ['de', 'register-bestaetigung', 'redirectToPath' => '404'],
            'en/register-confirmation' => ['en', 'register-confirmation', 'redirectToPath' => '404'],
            // redirect from Plugin
            'de/kasse'                 => ['de', 'kasse', 'redirectToPath' => 'login'],
            'en/checkout'              => ['en', 'checkout', 'redirectToPath' => 'login'],
        );
    }
}