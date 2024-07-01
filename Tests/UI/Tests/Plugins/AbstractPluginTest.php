<?php

namespace GjoSe\GjoSitePackage\Tests\UI\Tests\Plugins;

/***************************************************************
 *  created: 10-Mrz-2020 09:26:24
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

use GjoSe\GjoSitePackage\Tests\UI\Tests\AbstractTest;
use GjoSe\GjoSitePackage\Tests\UI\Objects\Plugins\PluginSearchObject;

abstract class AbstractPluginTest extends AbstractTest
{

    /**
     * @var PluginSearchObject|null
     */
    protected $pluginSearchObject = null;

    /**
     * @return PluginSearchObject|null
     */
    public function getPluginSearchObject()
    {
        if ($this->pluginSearchObject) {
            return $this->pluginSearchObject;
        }
        $this->pluginSearchObject = new PluginSearchObject($this->getSiteObject()->getDriver());

        return $this->pluginSearchObject;
    }
}
