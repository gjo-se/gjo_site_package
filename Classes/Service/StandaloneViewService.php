<?php

declare(strict_types=1);

namespace GjoSe\GjoSitePackage\Service;

use TYPO3\CMS\Fluid\View\StandaloneView;

final readonly class StandaloneViewService
{
    public function __construct(
        private StandaloneView $standaloneView,
        private SiteViewService $siteViewService
    ) {}

    public function configureStandaloneView(string $template = ''): StandaloneView
    {
        $this->standaloneView->setTemplatePathAndFilename(
            $this->siteViewService->getTemplateRootPath(0) . $template
        );
        $this->standaloneView->setPartialRootPaths([
            $this->siteViewService->getPartialRootPath(0),
            $this->siteViewService->getPartialRootPath(1),
            $this->siteViewService->getPartialRootPath(2),
        ]);

        return $this->standaloneView;
    }
}
