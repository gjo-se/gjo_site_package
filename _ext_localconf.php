<?php

use GjoSe\GjoSitePackage\Task\BackupDatabaseTask;
use GjoSe\GjoSitePackage\Task\BackupDatabaseTaskAdditionalFieldProvider;
use GjoSe\GjoSitePackage\Task\CleanupDumpsTask;
use GjoSe\GjoSitePackage\Task\CleanupDumpsTaskAdditionalFieldProvider;
use GjoSe\GjoSitePackage\Task\DeploymentDatabaseTask;
use GjoSe\GjoSitePackage\Task\DeploymentDatabaseTaskAdditionalFieldProvider;
use GjoSe\GjoSitePackage\Task\RestoreDatabaseTask;
use GjoSe\GjoSitePackage\Task\RestoreDatabaseTaskAdditionalFieldProvider;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') or die('Access denied.');

$extensionKey = 'gjo_site_package';

ExtensionManagementUtility::addPageTSConfig(
    '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $extensionKey . '/Configuration/PageTS/_PageTSConfig.t3s">'
);

$GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['gjo_custom'] =
    'EXT:gjo_introduction/Configuration/PageTS/Rte/Custom.yaml';

// Register tasks
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks'][BackupDatabaseTask::class] = array(
    'extension' => 'gjo_introduction',
    'title' => 'LLL:EXT:gjo_introduction/Resources/Private/Language/locallang.xlf:backupDatabaseTask.name',
    'description' => 'LLL:EXT:gjo_introduction/Resources/Private/Language/locallang.xlf:backupDatabaseTask.description',
    'additionalFields' => BackupDatabaseTaskAdditionalFieldProvider::class
);

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks'][RestoreDatabaseTask::class] = array(
    'extension' => 'gjo_introduction',
    'title' => 'LLL:EXT:gjo_introduction/Resources/Private/Language/locallang.xlf:restoreDatabaseTask.name',
    'description' => 'LLL:EXT:gjo_introduction/Resources/Private/Language/locallang.xlf:restoreDatabaseTask.description',
    'additionalFields' => RestoreDatabaseTaskAdditionalFieldProvider::class
);

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks'][CleanupDumpsTask::class] = array(
    'extension' => 'gjo_introduction',
    'title' => 'LLL:EXT:gjo_introduction/Resources/Private/Language/locallang.xlf:cleanupDumpsTask.name',
    'description' => 'LLL:EXT:gjo_introduction/Resources/Private/Language/locallang.xlf:cleanupDumpsTask.description',
    'additionalFields' => CleanupDumpsTaskAdditionalFieldProvider::class
);

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks'][DeploymentDatabaseTask::class] = array(
    'extension' => 'gjo_introduction',
    'title' => 'LLL:EXT:gjo_introduction/Resources/Private/Language/locallang.xlf:deploymentDatabaseTask.name',
    'description' => 'LLL:EXT:gjo_introduction/Resources/Private/Language/locallang.xlf:deploymentDatabaseTask.description',
    'additionalFields' => DeploymentDatabaseTaskAdditionalFieldProvider::class
);







