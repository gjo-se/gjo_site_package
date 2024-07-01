<?php

namespace GjoSe\GjoSitePackage\Tests\UI\Tests\Sites;

/**
 * **************************************************************
 *  *  created: 28-Feb-2020 11:52:40
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

use GjoSe\GjoSitePackage\Tests\UI\Tests\Sites\AbstractSiteTest;
use GjoSe\GjoSitePackage\Tests\UI\Objects\Sites\SiteObject;

class PageNotFoundSiteTest extends AbstractSiteTest
{
    /**
     * @test
     * @dataProvider dataProviderSitemap
     */
    public function urlIsEquals_TitleIsNot404_Test($lang, $path)
    {
        $this->getSiteObject()->open($lang, $path);
        self::assertEquals($this->getSiteObject()->getUrl(), $this->getSiteObject()->getDriver()->getCurrentURL());
        // for BUG in TYPO3 HTTP BasicAuth & pageNotFoundHandling
        if($this->getSiteObject()->getEnv() == 'Testing' && $this->getSiteObject()->getDriver()->getTitle() == parent::TYPO3_EXCEPTION_TITLE){
            self::assertEquals(parent::TYPO3_EXCEPTION_TITLE, $this->getSiteObject()->getDriver()->getTitle());
        }else{
            self::assertEquals('404', $this->getSiteObject()->getDriver()->getTitle());
        }
    }

    public function dataProviderSitemap()
    {
        return array(
            'de/404'          => ['de', '404'],
            'en/404'          => ['en', '404'],
            'de/pageNotFound' => ['de', 'pageNotFound'],
            'en/pageNotFound' => ['en', 'pageNotFound']
        );
    }
}