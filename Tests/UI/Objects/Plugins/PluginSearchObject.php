<?php
namespace GjoSe\GjoSitePackage\Tests\UI\Objects\Plugins;

/***************************************************************
 *  created: 10-Mrz-2020 08:40:38
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

use Facebook\WebDriver\WebDriverBy;

class PluginSearchObject extends AbstractPluginObject
{
    const DESKTOP = " .d-lg-block";

    const BUTTON_SEARCH = " .btn-search";

    const BUTTON_CROSS = " .btn-cross";

    const INPUT_SEARCH_WORD = " input.search-sword";

    const SEARCH_SUGGESTION_LIST = " .search-suggestions";

    const SEARCH_SUGGESTION_ITEM = " ul.productSets a";

    const SEARCH_SUGGESTION_SUBITEM = " ul.productSets li ul a";

    const SEARCH_SUGGESTION_NO_ITEM = " .no-productSets p";

    public function getDOMObject_Button_Search($waitMethod = '')
    {
        $elementLocator = WebDriverBy::cssSelector(self::DESKTOP . self::BUTTON_SEARCH);
        $this->wait($elementLocator, $waitMethod);
        return $this->driver->findElement($elementLocator);
    }

    public function getDOMObject_Button_Cross($waitMethod = '')
    {
        $elementLocator = WebDriverBy::cssSelector(self::DESKTOP . self::BUTTON_CROSS);
        $this->wait($elementLocator, $waitMethod);
        return $this->driver->findElement($elementLocator);
    }

    public function getDOMObject_Input_Search_Word($waitMethod = '')
    {
        $elementLocator = WebDriverBy::cssSelector(self::DESKTOP . self::INPUT_SEARCH_WORD);
        $this->wait($elementLocator, $waitMethod);
        return $this->driver->findElement($elementLocator);
    }

    public function getDOMObject_Search_Suggestion_List($waitMethod = '')
    {
        $elementLocator = WebDriverBy::cssSelector(self::DESKTOP . self::SEARCH_SUGGESTION_LIST);
        $this->wait($elementLocator, $waitMethod);
        return $this->driver->findElement($elementLocator);
    }

    public function getDOMObject_Search_Suggestion_Item($waitMethod = '')
    {
        $elementLocator = WebDriverBy::cssSelector(self::DESKTOP . self::SEARCH_SUGGESTION_LIST . self::SEARCH_SUGGESTION_ITEM);
        $this->wait($elementLocator, $waitMethod);
        return $this->driver->findElement($elementLocator);
    }

    public function getDOMObject_Search_Suggestion_SubItem($waitMethod = '')
    {
        $elementLocator = WebDriverBy::cssSelector(self::DESKTOP . self::SEARCH_SUGGESTION_LIST . self::SEARCH_SUGGESTION_SUBITEM);
        $this->wait($elementLocator, $waitMethod);
        return $this->driver->findElement($elementLocator);
    }

    public function getDOMObject_Search_Suggestion_No_Item($waitMethod = '')
    {
        $elementLocator = WebDriverBy::cssSelector(self::DESKTOP . self::SEARCH_SUGGESTION_LIST . self::SEARCH_SUGGESTION_NO_ITEM);
        $this->wait($elementLocator, $waitMethod);
        return $this->driver->findElement($elementLocator);
    }

}