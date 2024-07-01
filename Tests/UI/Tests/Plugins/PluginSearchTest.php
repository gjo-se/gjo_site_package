<?php

namespace GjoSe\GjoSitePackage\Tests\UI\Tests\Plugins;

/***************************************************************
 *  created: 10-Mrz-2020 09:26:42
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

class PluginSearchTest extends AbstractPluginTest
{

    /**
     * @test
     *
     * @param $lang
     * @param $path
     * @param $searchWord
     *
     * @dataProvider dataProviderDisplayTest
     */
    public function displayTest($lang, $path, $searchWord)
    {
        // Initial
        $this->getSiteObject()->open($lang, $path);
        $this->initialAsserts();

        // Button_Search::click()
        $this->getPluginSearchObject()->getDOMObject_Button_Search()->click();
        $this->assertsAfterClickButtonSearch();

        // Button_Cross::click() == Initial
        $this->getPluginSearchObject()->getDOMObject_Button_Cross()->click();
        $this->initialAsserts();

        // Search:
        $this->getPluginSearchObject()->getDOMObject_Button_Search()->click();
        $this->assertsAfterClickButtonSearch();

        // Input_Search_Word:: typeValidSearchWord()
        $this->getPluginSearchObject()->getDOMObject_Input_Search_Word($this->getSiteObject()::WAIT_PRESENS_OF_ELEMENT_LOCATED)->sendKeys($searchWord['valid']);
        self::assertTrue($this->getPluginSearchObject()->getDOMObject_Search_Suggestion_List($this->getSiteObject()::WAIT_VISIBILITY_OF_ELEMENT_LOCATED)->isDisplayed());
        self::assertTrue($this->getPluginSearchObject()->getDOMObject_Search_Suggestion_Item($this->getSiteObject()::WAIT_VISIBILITY_OF_ELEMENT_LOCATED)->isDisplayed());

        // Input_Search_Word:: typeInValidSearchWord()
        $this->getPluginSearchObject()->getDOMObject_Button_Cross()->click();
        $this->getPluginSearchObject()->getDOMObject_Button_Search()->click();
        $this->getPluginSearchObject()->getDOMObject_Input_Search_Word($this->getSiteObject()::WAIT_PRESENS_OF_ELEMENT_LOCATED)->sendKeys($searchWord['invalid']);
        self::assertTrue($this->getPluginSearchObject()->getDOMObject_Search_Suggestion_List($this->getSiteObject()::WAIT_VISIBILITY_OF_ELEMENT_LOCATED)->isDisplayed());
        self::assertTrue($this->getPluginSearchObject()->getDOMObject_Search_Suggestion_No_Item($this->getSiteObject()::WAIT_VISIBILITY_OF_ELEMENT_LOCATED)->isDisplayed());
    }

    /**
     * @test
     *
     * @param $lang
     * @param $path
     * @param $searchWords
     *
     * @dataProvider dataProviderValidSearchWordForItemTest
     */
    public function validSearchWordForItemTest($lang, $path, $searchWords)
    {
        // Initial
        $this->getSiteObject()->open($lang, $path);
        $this->getPluginSearchObject()->getDOMObject_Button_Search()->click();

        // Input_Search_Word:: typeValidSearchWord()
        foreach ($searchWords as $searchWordSegment) {
            foreach ($searchWordSegment as $searchWord) {
                print('$searchWord : ' . $searchWord . PHP_EOL);
                $this->getPluginSearchObject()->getDOMObject_Input_Search_Word($this->getSiteObject()::WAIT_PRESENS_OF_ELEMENT_LOCATED)->sendKeys($searchWord);
                $this->waitForAjax($this->getSiteObject()->getDriver());

                self::assertTrue($this->getPluginSearchObject()->getDOMObject_Search_Suggestion_List($this->getSiteObject()::WAIT_VISIBILITY_OF_ELEMENT_LOCATED)->isDisplayed());
                self::assertTrue($this->getPluginSearchObject()->getDOMObject_Search_Suggestion_Item($this->getSiteObject()::WAIT_VISIBILITY_OF_ELEMENT_LOCATED)->isDisplayed());

                $this->getPluginSearchObject()->getDOMObject_Button_Cross()->click();
                $this->getPluginSearchObject()->getDOMObject_Button_Search()->click();
            }
        }
    }

    /**
     * @test
     *
     * @param $lang
     * @param $path
     * @param $searchWords
     *
     * @dataProvider dataProviderValidSearchWordForSubItemTest
     */
    public function validSearchWordForSubItemTest($lang, $path, $searchWords)
    {
        // Initial
        $this->getSiteObject()->open($lang, $path);
        $this->getPluginSearchObject()->getDOMObject_Button_Search()->click();

        // Input_Search_Word:: typeValidSearchWord()
        foreach ($searchWords as $searchWordSegment) {
            foreach ($searchWordSegment as $searchWord) {
                print('$searchWord : ' . $searchWord . PHP_EOL);
                $this->getPluginSearchObject()->getDOMObject_Input_Search_Word($this->getSiteObject()::WAIT_PRESENS_OF_ELEMENT_LOCATED)->sendKeys($searchWord);
                $this->waitForAjax($this->getSiteObject()->getDriver());

                self::assertTrue($this->getPluginSearchObject()->getDOMObject_Search_Suggestion_List($this->getSiteObject()::WAIT_VISIBILITY_OF_ELEMENT_LOCATED)->isDisplayed());
                self::assertTrue($this->getPluginSearchObject()->getDOMObject_Search_Suggestion_SubItem($this->getSiteObject()::WAIT_VISIBILITY_OF_ELEMENT_LOCATED)->isDisplayed());

                $this->getPluginSearchObject()->getDOMObject_Button_Cross()->click();
                $this->getPluginSearchObject()->getDOMObject_Button_Search()->click();
            }
        }
    }

    private function initialAsserts()
    {
        self::assertTrue($this->getPluginSearchObject()->getDOMObject_Button_Search($this->getSiteObject()::WAIT_PRESENS_OF_ELEMENT_LOCATED)->isDisplayed());
        self::assertNotTrue($this->getPluginSearchObject()->getDOMObject_Button_Cross($this->getSiteObject()::WAIT_PRESENS_OF_ELEMENT_LOCATED)->isDisplayed());
        self::assertNotTrue($this->getPluginSearchObject()->getDOMObject_Input_Search_Word($this->getSiteObject()::WAIT_PRESENS_OF_ELEMENT_LOCATED)->isDisplayed());
        self::assertNotTrue($this->getPluginSearchObject()->getDOMObject_Search_Suggestion_List($this->getSiteObject()::WAIT_PRESENS_OF_ELEMENT_LOCATED)->isDisplayed());
    }

    private function assertsAfterClickButtonSearch()
    {
        self::assertNotTrue($this->getPluginSearchObject()->getDOMObject_Button_Search($this->getSiteObject()::WAIT_PRESENS_OF_ELEMENT_LOCATED)->isDisplayed());
        self::assertTrue($this->getPluginSearchObject()->getDOMObject_Button_Cross($this->getSiteObject()::WAIT_PRESENS_OF_ELEMENT_LOCATED)->isDisplayed());
        self::assertTrue($this->getPluginSearchObject()->getDOMObject_Input_Search_Word($this->getSiteObject()::WAIT_PRESENS_OF_ELEMENT_LOCATED)->isDisplayed());
        self::assertEquals($this->getPluginSearchObject()->getDOMObject_Input_Search_Word($this->getSiteObject()::WAIT_PRESENS_OF_ELEMENT_LOCATED),
            $this->getSiteObject()->getDriver()->switchTo()->activeElement());
        self::assertNotTrue($this->getPluginSearchObject()->getDOMObject_Search_Suggestion_List($this->getSiteObject()::WAIT_PRESENS_OF_ELEMENT_LOCATED)->isDisplayed());
    }

    /**
     * @return array
     */
    public function dataProviderDisplayTest()
    {
        $searchWord = array(
            'valid'   => 'Alu 80',
            'invalid' => 'unknownSearchWord'
        );

        return array(
            "de/home - " => array("de", "", $searchWord),
            "en/home - " => array("en", "", $searchWord),
        );
    }

    /**
     * @return array
     */
    public function dataProviderValidSearchWordForItemTest()
    {
        $deSearchWord = array(
            'productSet.name'                                          => array(
                '100 mx',
                'mx 100',
                '100 pro mx',
                'et3 pro holz',
                'ET3 PRO HOLZ'
            ),
            'productSetVariantGroups.productSetVariants.name'          => array(
                'ev1',
                'c31',
                'System-Set',
                'Komplett-Set, 2000mm',
                'B259 T355 B259 (Glas)'
            ),
            'productSetVariantGroups.productSetVariants.articleNumber' => array(
                'NEO100Holz',
                'PRO100ETH-Sync',
                'ALU250NEO-14',
                'EVO3C-3000',
                'ALU80NEO-2000',
                '177369-24'
            ),
            'productSetVariantGroups.products.name'                    => array(
                'MX Tragflansch',
                'Blende',
                'Haltestopper',
                'Bodenführung',
                'Wandwinkel'
            ),
            'productSetVariantGroups.products.articleNumber'           => array(
                'rx100a',
                '8069',
                'sx100h',
                't-guide',
                'b256'
            )
        );

        $enSearchWord = array(
            'productSet.name'                                          => array(
                '100 mx',
                'mx 100',
                '100 pro mx',
                'et3 pro wood',
                'ET3 PRO WOOD'
            ),
            'productSetVariantGroups.productSetVariants.name'          => array(
                'ev1',
                'c31',
                'System-Set',
                'Complete-Set, 2000',
                'T355'
            ),
            'productSetVariantGroups.productSetVariants.articleNumber' => array(
                'NEO100Holz',
                'PRO100ETH-Sync',
                'ALU250NEO-14',
                'EVO3C-3000',
                'ALU80NEO-2000',
                '177369-24'
            ),
            'productSetVariantGroups.products.name'                    => array(
                'MX Support flange',
                'Cover',
                'ADJUSTABLE STOPPER',
                'FLOOR GUIDE',
                'WALL BRACKET'
            ),
            'productSetVariantGroups.products.articleNumber'           => array(
                'rx100a',
                '8069',
                'sx100h',
                't-guide',
                'b256'
            )
        );

        return array(
//            "de/home" => array("de", "", $deSearchWord),
            "en/home" => array("en", "", $enSearchWord)
        );
    }

    /**
     * @return array
     */
    public function dataProviderValidSearchWordForSubItemTest()
    {
        $deSearchWord = array(
            'accessoryKit.name'                                                                         => array(
                'Synchron',
                'tele',
                'Ergänzungs-Set Glas Dämpfung für ALU 80 NEO',
                'alu 80 glas',
                'Glasklemmen Blenden-Set für ALU 100 NEO PRO'
            ),
            'accessorykitGroups.accessoryKits.productSetVariantGroups.productSetVariants.name'          => array(
                'ab 810 mm Türbreite',
                'Aluminium eloxiert, EV1, silber, 3000 mm',
                'B261087-3000',
                'B259 W258 T355 W258 B259 (ET3 Holz)',
                'Synchron'
            ),
            'accessorykitGroups.accessoryKits.productSetVariantGroups.productSetVariants.articleNumber' => array(
                '205080IP1-2NEO',
                't-master',
                'NEO80+Sync',
                'T-Master 150',
                'ET3-80-PUSH'
            ),
            'accessorykitGroups.accessoryKits.productSetVariantGroups.products.name'                    => array(
                'Stirnkappen-Set',
                'Blende',
                'PrimeMotion B, silber',
                'Zahnriemen',
                'Wandträger-Profil',
            ),
            'accessorykitGroups.accessoryKits.productSetVariantGroups.products.articleNumber'           => array(
                'B380',
                'ET-2126-AL',
                '05M',
                'W254'
            ),
        );

        $enSearchWord = array(
            'accessoryKit.name'                                                                         => array(
                'Synchron',
                'tele',
                'Ergänzungs-Set Glas Dämpfung für ALU 80 NEO',
                'alu 80 glas',
                'Glasklemmen Blenden-Set für ALU 100 NEO PRO'
            ),
            'accessorykitGroups.accessoryKits.productSetVariantGroups.productSetVariants.name'          => array(
                'ab 810 mm Türbreite',
                'Aluminium eloxiert, EV1, silber, 3000 mm',
                'B261087-3000',
                'B259 W258 T355 W258 B259 (ET3 Holz)',
                'Synchron'
            ),
            'accessorykitGroups.accessoryKits.productSetVariantGroups.productSetVariants.articleNumber' => array(
                '205080IP1-2NEO',
                't-master',
                'NEO80+Sync',
                'T-Master 150',
                'ET3-80-PUSH'
            ),
            'accessorykitGroups.accessoryKits.productSetVariantGroups.products.name'                    => array(
                'Stirnkappen-Set',
                'Blende',
                'PrimeMotion B, silber',
                'Zahnriemen',
                'Wandträger-Profil',
            ),
            'accessorykitGroups.accessoryKits.productSetVariantGroups.products.articleNumber'           => array(
                'B380',
                'ET-2126-AL',
                '05M',
                'W254'
            ),
        );

        return array(
            "de/home" => array("de", "", $deSearchWord),
            "en/home" => array("en", "", $enSearchWord),
        );
    }
}
