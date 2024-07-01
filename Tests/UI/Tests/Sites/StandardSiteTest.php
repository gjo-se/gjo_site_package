<?php

namespace GjoSe\GjoSitePackage\Tests\UI\Tests\Sites;

/**
 * **************************************************************
 *  *  created: 24-Feb-2020 05:59:32
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

class StandardSiteTest extends AbstractSiteTest
{
    /**
     * @test
     * @dataProvider dataProviderSitemap
     */
    public function urlIsEquals_TitleIsNot404_Test($lang, $path)
    {
        $this->getSiteObject()->open($lang, $path);
        self::assertEquals($this->getSiteObject()->getUrl(), $this->getSiteObject()->getDriver()->getCurrentURL());
        self::assertNotEquals('404', $this->getSiteObject()->getDriver()->getTitle());
    }

    public function dataProviderSitemap()
    {
        return array(
            'de/startseite'                  => ['de', ''],
            'en/home'                        => ['en', ''],
            'de/schiebetuertechnik'          => ['de', 'schiebetuertechnik'],
            'en/sliding-door-hardware'       => ['en', 'sliding-door-hardware'],
            'de/produkt-konfigurator'        => ['de', 'produkt-konfigurator'],
            'en/product-configurator'        => ['en', 'product-configurator'],
            'de/torbeschlaege'               => ['de', 'torbeschlaege'],
            'en/sliding-gate-hardware'       => ['en', 'sliding-gate-hardware'],
            'de/transportanlagen'            => ['de', 'transportanlagen'],
            'en/conveyor-solutions'          => ['en', 'conveyor-solutions'],
            'de/downloads'                   => ['de', 'downloads'],
            'en/downloads'                   => ['en', 'downloads'],
            'de/tradition'                   => ['de', 'tradition'],
            'en/tradition'                   => ['en', 'tradition'],
            'de/news'                        => ['de', 'news'],
            'en/news'                        => ['en', 'news'],
            'de/news-detail/tiger-online-20' => ['de', 'news-detail/tiger-online-20'],
            'en/news-detail/tiger-online-20' => ['en', 'news-detail/tiger-online-20'],
            'de/referenzen'                  => ['de', 'referenzen'],
            'en/references'                  => ['en', 'references'],
            'de/ansprechpartner'             => ['de', 'ansprechpartner'],
            'en/experts'                     => ['en', 'your-experts'],
            'de/kontaktformular'             => ['de', 'kontaktformular'],
            'en/contact-form'                => ['en', 'contact-form'],
            'de/kontakt-bestaetigung'        => ['de', 'kontakt-bestaetigung'],
            'en/contact-confirmation'        => ['en', 'contact-confirmation'],
            'de/geschaeftskundenkonto'       => ['de', 'geschaeftskundenkonto'],
            'en/business-customer'           => ['en', 'business-customer'],
            'de/shop'                        => ['de', 'shop'],
            'en/shop'                        => ['en', 'shop'],
            'de/warenkorb'                   => ['de', 'warenkorb'],
            'en/cart'                        => ['en', 'cart'],
            'de/impressum'                   => ['de', 'impressum'],
            'en/legal-notice'                => ['en', 'legal-notice'],
            'de/agb'                         => ['de', 'agb'],
            'en/gtc'                         => ['en', 'gtc'],
            'de/datenschutz'                 => ['de', 'datenschutz'],
            'en/data-protection'             => ['en', 'data-protection'],
            'de/register'                    => ['de', 'register'],
            'en/register'                    => ['en', 'register'],

            'de/alu-40-neo'                => ['de', 'alu-40-neo'],
            'en/alu-40-neo'                => ['en', 'alu-40-neo'],
            'de/shop/alu-40-neo'           => ['de', 'shop/alu-40-neo'],
            'en/shop/alu-40-neo'           => ['en', 'shop/alu-40-neo'],
            'de/alu-80-neo'                => ['de', 'alu-80-neo'],
            'en/alu-80-neo'                => ['en', 'alu-80-neo'],
            'de/shop/alu-80-neo'           => ['de', 'shop/alu-80-neo'],
            'en/shop/alu-80-neo'           => ['en', 'shop/alu-80-neo'],
            'de/alu-100-neo-holz'          => ['de', 'alu-100-neo-holz'],
            'en/alu-100-neo-wood'          => ['en', 'alu-100-neo-wood'],
            'de/shop/alu-100-neo-holz'     => ['de', 'shop/alu-100-neo-holz'],
            'en/shop/alu-100-neo-wood'     => ['en', 'shop/alu-100-neo-wood'],
            'de/alu-100-neo-pro-holz'      => ['de', 'alu-100-neo-pro-holz'],
            'en/alu-100-neo-pro-wood'      => ['en', 'alu-100-neo-pro-wood'],
            'de/shop/alu-100-neo-pro-holz' => ['de', 'shop/alu-100-neo-pro-holz'],
            'en/shop/alu-100-neo-pro-wood' => ['en', 'shop/alu-100-neo-pro-wood'],
            'de/alu-100-neo'               => ['de', 'alu-100-neo'],
            'en/alu-100-neo'               => ['en', 'alu-100-neo'],
            'de/shop/alu-100-neo'          => ['de', 'shop/alu-100-neo'],
            'en/shop/alu-100-neo'          => ['en', 'shop/alu-100-neo'],
            'de/alu-150-neo-pro'           => ['de', 'alu-150-neo-pro'],
            'en/alu-150-neo-pro'           => ['en', 'alu-150-neo-pro'],
            'de/alu-150-neo-pro-holz'      => ['de', 'alu-150-neo-pro-holz'],
            'en/alu-150-neo-pro-wood'      => ['en', 'alu-150-neo-pro-wood'],
            'de/shop/alu-150-neo-pro-holz' => ['de', 'shop/alu-150-neo-pro-holz'],
            'en/shop/alu-150-neo-pro-wood' => ['en', 'shop/alu-150-neo-pro-wood'],
            'de/alu-250-neo'               => ['de', 'alu-250-neo'],
            'en/alu-250-neo'               => ['en', 'alu-250-neo'],
            'de/shop/alu-250-neo'          => ['de', 'shop/alu-250-neo'],
            'en/shop/alu-250-neo'          => ['en', 'shop/alu-250-neo'],
            'de/evolution'                 => ['de', 'evolution'],
            'en/evolution'                 => ['en', 'evolution'],
            'de/shop/evolution'            => ['de', 'shop/evolution'],
            'en/shop/evolution'            => ['en', 'shop/evolution'],
            'de/retro'                     => ['de', 'retro'],
            'en/retro'                     => ['en', 'retro'],
            'de/shop/retro'                => ['de', 'shop/retro'],
            'en/shop/retro'                => ['en', 'shop/retro'],

            'de/kasse-bestaetigung' => ['de', 'kasse-bestaetigung'],
            'en/checkout-confirmation' => ['en', 'checkout-confirmation'],
            'de/paypal-bestaetigung' => ['de', 'paypal-bestaetigung'],
            'en/paypal-confirmation' => ['en', 'paypal-confirmation']
        );
    }
}