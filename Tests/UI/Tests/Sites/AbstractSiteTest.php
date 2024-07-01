<?php

namespace GjoSe\GjoSitePackage\Tests\UI\Tests\Sites;

/***************************************************************
 *  created: 2020-01-21 - 07:02
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
use GjoSe\GjoSitePackage\Tests\UI\Tests\AbstractTest;

class AbstractSiteTest extends AbstractTest
{
    const TYPO3_EXCEPTION_TITLE = 'TYPO3 Exception';

    protected function navigateToPage($lang, $path)
    {
        $this->getSiteObject()->setUrl($lang, $path);
        $this->getSiteObject()->getDriver()->navigate()->to($this->getSiteObject()->getUrl());
    }

    protected function login()
    {
        $this->getUiTestUserObject()->setUiTestUser($this->dataProviderUiTestUser()['validB2C']);
        $this->getUiTestUserObject()->login($this->getLoginPluginObject());
    }

    protected function logout()
    {
        $this->getUiTestUserObject()->logout($this->getLogoutPluginObject());
    }


}