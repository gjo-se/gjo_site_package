<?php

declare(strict_types=1);

namespace GjoSe\GjoSitePackage\Service;

use Psr\Http\Message\ServerRequestInterface;
use TYPO3\CMS\Core\Site\Entity\Site;

abstract class AbstractService
{
    protected function getSite(): ?Site
    {
        return $this->getRequest()->getAttribute('site');
    }

    private function getRequest(): ServerRequestInterface
    {
        return $GLOBALS['TYPO3_REQUEST'];
    }
}
