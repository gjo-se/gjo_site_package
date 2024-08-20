<?php

declare(strict_types=1);

namespace GjoSe\GjoSitePackage\Controller;

use GjoSe\GjoSitePackage\Utility\CroppingUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController as CoreAbstractController;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;

class AbstractController extends CoreAbstractController
{
    /** @param array<mixed> $additionalVariables */
    protected function assignCommonViewVariables(array $additionalVariables = []): void
    {
        $this->view->assignMultiple(array_merge([
            'data' => $this->getCurrentContentObjectData(),
            'breakpoints' => CroppingUtility::getDefaultBreakpoints(),
        ], $additionalVariables));
    }

    /** @return array<string, mixed> */
    private function getCurrentContentObjectData(): array
    {
        return $this->getCurrentContentObject()?->data ?? [];
    }

    private function getCurrentContentObject(): ?ContentObjectRenderer
    {
        return $this->request->getAttribute('currentContentObject');
    }
}
