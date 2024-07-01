<?php
namespace GjoSe\GjoSitePackage\Tests\UI\Objects\Plugins;

use Facebook\WebDriver\WebDriverBy;

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

class PluginLoginObject extends AbstractPluginObject
{

    //FORM PLUGIN-LOGIN
    const OBJECT_PLUGIN_LOGIN_FORM = " #plugin-loginForm"; // #plugin-loginForm [name='pass']

    const OBJECT_PLUGIN_LOGIN_FORM_USERNAME = " [name='user']";

    const OBJECT_PLUGIN_LOGIN_FORM_PASSWORD = "  [name='pass']";

    //    const OBJECT_PLUGIN_LOGIN_FORM_PERMALOGIN = ' #permaloginLoginSite';

    // FORMS
    const OBJECT_LOGIN_FORM_SUBMIT_BUTTON = ' button';

    // FORM Header_LOGIN
//    const OBJECT_DESKTOP_LOGIN_FORM = '#desktop-loginForm';
//
//    const OBJECT_DESKTOP_LOGIN_FORM_USERNAME = ' #desktop-loginForm_user';
//
//    const OBJECT_DESKTOP_LOGIN_FORM_PASSWORD = ' #desktop-loginForm_pass';
//
//    const OBJECT_DESKTOP_LOGIN_FORM_PERMALOGIN = ' #desktop-loginForm_permalogin';


//    const OBJECT_LINK_FORGOT_PASSWORD = ' noch setzen';
//
//    const OBJECT_LINK_REGISTER = ' noch setzen';

    public function getDOMObject_Plugin_LoginForm_Username($waitMethod = '')
    {
        $elementLocator = WebDriverBy::cssSelector(self::OBJECT_PLUGIN_LOGIN_FORM . self::OBJECT_PLUGIN_LOGIN_FORM_USERNAME);
        $this->wait($elementLocator, $waitMethod);
        return $this->driver->findElement($elementLocator);
    }

    public function getDOMObject_Plugin_LoginForm_Pass($waitMethod = '')
    {
        $elementLocator = WebDriverBy::cssSelector(self::OBJECT_PLUGIN_LOGIN_FORM . self::OBJECT_PLUGIN_LOGIN_FORM_PASSWORD);
        $this->wait($elementLocator, $waitMethod);
        return $this->driver->findElement($elementLocator);
    }

    public function getDOMObject_Plugin_LoginForm_SubmitButton($waitMethod = '')
    {
        $elementLocator = WebDriverBy::cssSelector(self::OBJECT_PLUGIN_LOGIN_FORM . self::OBJECT_LOGIN_FORM_SUBMIT_BUTTON);
        $this->wait($elementLocator, $waitMethod);
        return $this->driver->findElement($elementLocator);
    }

}