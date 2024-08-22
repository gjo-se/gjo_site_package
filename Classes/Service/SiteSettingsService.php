<?php

declare(strict_types=1);

namespace GjoSe\GjoSitePackage\Service;

final  class SiteSettingsService extends AbstractService
{
    public function getSiteSettings(): array
    {
        $site = $this->getSite();
        return $site ? ($site->getConfiguration()['settings'] ?? []) : [];
    }
}
