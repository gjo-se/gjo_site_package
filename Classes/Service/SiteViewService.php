<?php

declare(strict_types=1);

namespace GjoSe\GjoSitePackage\Service;

use TYPO3\CMS\Core\Utility\GeneralUtility;

final class SiteViewService extends AbstractService
{
    /** @return array<string> */
    public function getTemplateRootPaths(): array
    {
        $site = $this->getSite();
        return $site ? ($site->getConfiguration()['view']['templateRootPaths'] ?? []) : [];
    }

    public function getTemplateRootPath(int $index = 0): string
    {
        $templateRootPath = $this->getTemplateRootPaths()[$index] ?? '';
        return GeneralUtility::getFileAbsFileName($templateRootPath);
    }

    /** @return array<string> */
    public function getPartialRootPaths(): array
    {
        $site = $this->getSite();
        return $site ? ($site->getConfiguration()['view']['partialRootPaths'] ?? []) : [];
    }

    public function getPartialRootPath(int $index = 0): string
    {
        $partialRootPath = $this->getPartialRootPaths()[$index] ?? '';
        return GeneralUtility::getFileAbsFileName($partialRootPath);
    }
}
