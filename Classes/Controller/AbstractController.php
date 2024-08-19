<?php
declare(strict_types=1);

namespace GjoSe\GjoSitePackage\Controller;

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController as CoreAbstractController;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;

class AbstractController extends CoreAbstractController
{
    protected function getCurrentContentObjectData(): array
    {
        /** @var ContentObjectRenderer $currentContentObject */
        $currentContentObject = $this->request->getAttribute('currentContentObject');
        return $currentContentObject->data;
    }
}
