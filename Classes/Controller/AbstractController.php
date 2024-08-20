<?php

declare(strict_types=1);

namespace GjoSe\GjoSitePackage\Controller;

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController as CoreAbstractController;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;

class AbstractController extends CoreAbstractController
{
    /** @return array<string, mixed> */
    protected function getCurrentContentObjectData(): array
    {
        return $this->getCurrentContentObject()?->data ?? [];
    }

    private function getCurrentContentObject(): ?ContentObjectRenderer
    {
        return $this->request->getAttribute('currentContentObject');
    }
}
