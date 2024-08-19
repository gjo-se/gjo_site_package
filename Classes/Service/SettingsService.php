<?php

declare(strict_types=1);

namespace GjoSe\GjoSitePackage\Service;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;

final readonly class SettingsService
{
    private function __construct(
        private ConfigurationManagerInterface $configurationManager
    ) {}

    /**
     * @param string|null $extensionName
     * @param string|null $pluginName
     * @param string $configurationType
     *
     * @return array The configuration
     */
    public function getTypoScriptSettings(
        ?string $extensionName = null,
        ?string $pluginName = null,
        string $configurationType = 'extension'
    ): array {
        $configurationType = match ($configurationType) {
            'extension' => ConfigurationManagerInterface::CONFIGURATION_TYPE_SETTINGS,
            'framework' => ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK,
            'full' => ConfigurationManagerInterface::CONFIGURATION_TYPE_FULL_TYPOSCRIPT,
            default => throw new \InvalidArgumentException('Invalid type: ' . $configurationType),
        };

        return $this->configurationManager->getConfiguration($configurationType, $extensionName, $pluginName);
    }
}
