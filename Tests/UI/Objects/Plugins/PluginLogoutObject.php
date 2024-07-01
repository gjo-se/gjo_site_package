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

class PluginLogoutObject extends AbstractPluginObject
{
    const OBJECT_PLUGIN_LOGOUT_FORM = " #plugin-logoutForm";

    const OBJECT_LOGOUT_FORM_SUBMIT_BUTTON = ' button';

    public function getDOMObject_Plugin_LogoutForm_SubmitButton($waitMethod = '')
    {
        $elementLocator = WebDriverBy::cssSelector(self::OBJECT_PLUGIN_LOGOUT_FORM . self::OBJECT_LOGOUT_FORM_SUBMIT_BUTTON);
        $this->wait($elementLocator, $waitMethod);
        return $this->driver->findElement($elementLocator);

    }
}