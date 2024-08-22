<?php

declare(strict_types=1);

namespace GjoSe\GjoSitePackage\Service;

use TYPO3\CMS\Core\Site\Entity\Site;
final  class SiteSettingsService extends AbstractService
{
    public function getSiteSettings(): array
    {
        $site = $this->getSite();
        return $site instanceof Site ? ($site->getConfiguration()['settings'] ?? []) : [];
    }
}
