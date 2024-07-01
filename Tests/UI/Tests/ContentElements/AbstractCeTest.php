<?php

namespace GjoSe\GjoSitePackage\Tests\UI\Tests\ContentElements;

/***************************************************************
 *  created: 06-Mrz-2020 11:11:52
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
use GjoSe\GjoSitePackage\Tests\UI\Objects\ContentElements\CeCarouselCol12Object;
use GjoSe\GjoSitePackage\Tests\UI\Objects\ContentElements\CeCarouselCol4Object;

class AbstractCeTest extends AbstractTest
{
    /**
     * @var CeCarouselCol12Object|null
     */
    protected $ceCarouselCol12Object = null;

    /**
     * @var CeCarouselCol4ObjectObject|null
     */
    protected $ceCarouselCol4Object = null;

    /**
     * @return CeCarouselCol12Object|null
     */
    public function getCeCarouselCol12Object()
    {
        if($this->ceCarouselCol12Object){
            return $this->ceCarouselCol12Object;
        }
        $this->ceCarouselCol12Object = new CeCarouselCol12Object($this->getSiteObject()->getDriver());

        return $this->ceCarouselCol12Object;
    }

    /**
     * @return CeCarouselCol4Object|null
     */
    public function getCeCarouselCol4Object()
    {
        if($this->ceCarouselCol4Object){
            return $this->ceCarouselCol4Object;
        }
        $this->ceCarouselCol4Object = new CeCarouselCol4Object($this->getSiteObject()->getDriver());

        return $this->ceCarouselCol4Object;
    }
}