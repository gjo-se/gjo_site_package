<?php
declare(strict_types=1);

//  - Code isActive:
//      - no: delete | move to _works
//      - yes:
//          - move to
//              - Abstract/Partials
//              - Utility
//              - Service
//              - Settings
//          - add Concept-Documentation
//          - mark @todo-conceptClean
//          - ok

namespace GjoSe\GjoSitePackage\Utility;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;

final class SettingsUtility
{
    /**
     * @param string|null $extensionName
     * @param string|null $pluginName
     * @param string $configurationType
     *
     * @return array The configuration
     */
    public static function getTypoScriptSettings(
        ?string $extensionName = null,
        ?string $pluginName = null,
        string $configurationType = 'extension'
    ): array {
        $configurationManager = GeneralUtility::makeInstance(ConfigurationManagerInterface::class);
        $configurationType = match ($configurationType) {
            'extension' => ConfigurationManagerInterface::CONFIGURATION_TYPE_SETTINGS,
            'framework' => ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK,
            'full' => ConfigurationManagerInterface::CONFIGURATION_TYPE_FULL_TYPOSCRIPT,
            default => throw new \InvalidArgumentException('Invalid type: ' . $configurationType),
        };

        return $configurationManager->getConfiguration($configurationType, $extensionName, $pluginName);
    }
}
