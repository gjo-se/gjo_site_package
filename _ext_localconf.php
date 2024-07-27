<?php

declare(strict_types=1);

defined('TYPO3') or die('Access denied.');

call_user_func(
    static function (): void {

        $extensionKey = 'gjo_site_package';

        $GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['gjo_custom'] =
            'EXT:' . $extensionKey . '/Configuration/PageTS/Rte/Custom.yaml';

    }
);













