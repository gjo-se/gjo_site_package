<?php

declare(strict_types=1);

namespace GjoSe\GjoSitePackage\Service;

use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;

final readonly class SettingsService
{
    public function __construct(
        private ConfigurationManagerInterface $configurationManager
    ) {}

    /** @return array<string, mixed> The configuration */
    public function getTypoScriptSettings(
        ?string $extensionName = null,
        ?string $pluginName = null,
        string $configurationType = 'extension'
    ): array {
        $configurationType = $this->mapConfigurationType($configurationType);

        return $this->configurationManager->getConfiguration($configurationType, $extensionName, $pluginName);
    }

    private function mapConfigurationType(string $configurationType): string
    {
        return match ($configurationType) {
            'extension' => ConfigurationManagerInterface::CONFIGURATION_TYPE_SETTINGS,
            'framework' => ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK,
            'full' => ConfigurationManagerInterface::CONFIGURATION_TYPE_FULL_TYPOSCRIPT,
            default => throw new \InvalidArgumentException('Invalid type: ' . $configurationType),
        };
    }
}
