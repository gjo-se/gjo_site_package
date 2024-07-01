<?php

namespace GjoSe\GjoSitePackage\Tests\UI\Objects\FeUser;

/***************************************************************
 *  created: 24-Feb-2020 16:55:45
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

use GjoSe\GjoSitePackage\Tests\UI\Objects\AbstractObject;

/**
 * Class AbstractUITestUserObject
 * @package GjoSe\GjoIntroduction\Tests\UI\Objects
 */
abstract class AbstractUITestUserObject extends AbstractObject
{

    /**
     * @var string
     */
    protected $email = '';

    /**
     * @var string
     */
    protected $password = '';

    /**
     * @var string
     */
    protected $username = '';

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return void
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     *
     * @return void
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     *
     * @return void
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return bool
     */
    public function isLoggedIn(): bool
    {
        return $this->getDOMObject_UI_TestUser_IsLoggedIn();
    }

    public function setUiTestUser($uiTestUser)
    {
        $this->setUsername($uiTestUser['username']);
        $this->setPassword($uiTestUser['password']);
        $this->setEmail($uiTestUser['email']);
    }

    public function login($loginPluginObject, $navigateToUrl = '')
    {
        if ($navigateToUrl) {
            $this->driver->navigate()->to($navigateToUrl);
        }
        $loginPluginObject->getDOMObject_Plugin_LoginForm_Username()->sendKeys($this->getUsername());
        $loginPluginObject->getDOMObject_Plugin_LoginForm_Pass()->sendKeys($this->getPassword());
        $loginPluginObject->getDOMObject_Plugin_LoginForm_SubmitButton()->click();
    }

    public function logout($logoutPluginObject)
    {
        $logoutPluginObject->getDOMObject_Plugin_LogoutForm_SubmitButton()->click();
    }
}