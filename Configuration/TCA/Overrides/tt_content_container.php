<?php

declare(strict_types=1);

use B13\Container\Tca\ContainerConfiguration;
use B13\Container\Tca\Registry;
use TYPO3\CMS\Core\Utility\GeneralUtility;

(function (): void {
    // DI NOT in nonClasses
    GeneralUtility::makeInstance(Registry::class)->configureContainer(
        (
        new ContainerConfiguration(
            'container-2col',
            '2 Column Container',
            '2 Column Container',
            [
                [
                    ['name' => 'left side', 'colPos' => 200],
                    ['name' => 'right side', 'colPos' => 201],
                ],
            ]
        )
        )
            ->setIcon('EXT:container/Resources/Public/Icons/container-2col.svg')
            ->setSaveAndCloseInNewContentElementWizard(false)
    );

    // DI NOT in nonClasses
    GeneralUtility::makeInstance(Registry::class)->configureContainer(
        (
        new ContainerConfiguration(
            'container-3col',
            '3 Column Container',
            '3 Column Container',
            [
                [
                    ['name' => 'left side', 'colPos' => 200],
                    ['name' => 'middle', 'colPos' => 201],
                    ['name' => 'right side', 'colPos' => 202],
                ],
            ]
        )
        )
            ->setIcon('EXT:container/Resources/Public/Icons/container-3col.svg')
            ->setSaveAndCloseInNewContentElementWizard(false)
    );

    // DI NOT in nonClasses
    GeneralUtility::makeInstance(Registry::class)->configureContainer(
        (
        new ContainerConfiguration(
            'container-4col',
            '4 Column Container',
            '4 Column Container',
            [
                [
                    ['name' => 'left side', 'colPos' => 200],
                    ['name' => 'middle left side', 'colPos' => 201],
                    ['name' => 'middle right side', 'colPos' => 202],
                    ['name' => 'right side', 'colPos' => 203],
                ],
            ]
        )
        )
            ->setIcon('EXT:container/Resources/Public/Icons/container-4col.svg')
            ->setSaveAndCloseInNewContentElementWizard(false)
    );
})();
