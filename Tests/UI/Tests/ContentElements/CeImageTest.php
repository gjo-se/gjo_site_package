<?php

namespace GjoSe\GjoSitePackage\Tests\UI\Tests\ContentElements;


/***************************************************************
 *  created: 06-Mrz-2020 11:11:55
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

use GjoSe\GjoSitePackage\Tests\UI\Objects\ContentElements\CeImageObject;

class CeImageTest extends AbstractCeTest
{
    /**
     * @var CeImageObject|null
     */
    protected $ceImageObject = null;

    /**
     * @return CeImageObject|null
     */
    public function getCeImageObject(): ?CeImageObject
    {
        if($this->ceImageObject){
            return $this->ceImageObject;
        }
        $this->ceImageObject = new CeImageObject($this->getSiteObject()->getDriver());

        return $this->ceImageObject;
    }

    /**
     * @test
     *
     * @param $lang
     * @param $path
     *
     * @dataProvider dataProviderSitemap
     */
    public function imageWidtIsNotGraeterThenParentDiv_Test($lang, $path)
    {
        $this->getSiteObject()->open($lang, $path);

        //TODO:
        //  - ok - getImages
        //  - ok - ifImages: foraech Image:
        //  - Ajax-load klären
        //  - 1 Bild reicht
        //  - getWidth * 1,1 < parent.div.width || image.width
        //      - HIER LIEGT DAS PROBLEM: ich komme nicht an die reale Breite des Bildes (Konfigurator: > 4000px)
        //  - if image Visible?? (im Slider nicht sichtbare Bilder müssen auch geprüft werden?? => hier gehts um den Code, nicht um den Inhalt)

        if($path == 'produkt-konfigurator'){
            // wait isVisible, existsinDOM
            $image = $this->getCeImageObject()->getDOMObjectAjaxListProductImage('presenceOfElementLocated');

            print('$image->getAttribute-width: ' . $image->getAttribute('width') . PHP_EOL);
            print('intrinsicSize: ' . $image->getAttribute('intrinsic') . PHP_EOL);
            print('naturalWidth: ' . $image->getAttribute('naturalWidth') . PHP_EOL);
            // https://caniuse.com/#feat=img-naturalwidth-naturalheight
            print('sizes: ' . $image->getAttribute('sizes') . PHP_EOL);
            print('$image->getSize(): ' . $image->getSize()->getWidth() . PHP_EOL);
            print('$class: ' . $image->getAttribute('class') . PHP_EOL);
            print('$title: ' . $image->getAttribute('title') . PHP_EOL);
            print('----------: ' . PHP_EOL);


        }


//        $images = $this->getCeImageObject()->getAllDOMObjectsCeImage();
//
//        if($images){
//            foreach ($images as $image) {
//
//                $imageWidth = $image->getAttribute('width');
//
//                $image->getSize();
//                $image->getSize();
//
//                print('width: ' . $image->getAttribute('width') . PHP_EOL);
//                print('naturalWidth: ' . $image->getAttribute('naturalWidth') . PHP_EOL);
//                print('$image->getSize(): ' . $image->getSize()->getWidth() . PHP_EOL);
//                print('$class: ' . $image->getAttribute('class') . PHP_EOL);
//                print('$title: ' . $image->getAttribute('title') . PHP_EOL);
//                print('----------: ' . PHP_EOL);
//            }
//        }



        // Helper-Assertion, if no Images on Site exists
        $this->assertTrue(1 == 1);

//        if (!$this->getUiTestUserObject()->isLoggedIn()) {
//
//
//            $this->login();
//            $this->getSiteObject()->setUrl($lang, $targetPath);
//
//            $this->assertTrue($this->getUiTestUserObject()->isLoggedIn());
//            $this->assertEquals($this->getSiteObject()->getUrl(), $this->getSiteObject()->getDriver()->getCurrentURL());
//            $this->assertNotEquals('404', $this->getSiteObject()->getDriver()->getTitle());
//
//            $this->navigateToPage($lang, $path);
//            $this->logout();
//            $this->getSiteObject()->setUrl($lang, $targetPath);
//
//            $this->assertNotTrue($this->getUiTestUserObject()->isLoggedIn());
//            $this->assertEquals($this->getSiteObject()->getUrl(), $this->getSiteObject()->getDriver()->getCurrentURL());
//            $this->assertNotEquals('404', $this->getSiteObject()->getDriver()->getTitle());
//        }
    }

    /**
     * @return array
     */
    public function dataProviderSitemap()
    {
        return array(
            'de/produkt-konfigurator' => ['de', 'produkt-konfigurator'],
//            'de/torbeschlaege' => ['de', 'torbeschlaege'],
        );
    }
}