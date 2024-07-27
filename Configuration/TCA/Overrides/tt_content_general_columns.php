<?php

declare(strict_types=1);

call_user_func(function (): void {

    $table  = 'tt_content';
    $column = 'tx_gjositepackage_carousel_item';

    $ext = 'gjo_site_package';
    $lll = 'LLL:EXT:' . $ext . '/Resources/Private/Language/ContentElements.xlf:';

    // TODO: appearance ansehen, in tt_content.php verschieben

    $GLOBALS['TCA'][$table]['columns'][$column] = [
        'label' => $lll . 'carousel_item',
        'config' => [
            'type' => 'inline',
            'foreign_table' => $column,
            'foreign_field' => 'tt_content',
            'maxitems' => 9,
            'appearance' => [
                'useSortable' => true,
                'showSynchronizationLink' => true,
                'showAllLocalizationLink' => true,
                'showPossibleLocalizationRecords' => true,
                'expandSingle' => true,
                'enabledControls' => [
                    'localize' => true,
                ]
            ],
            'behaviour' => [
                'mode' => 'select',
                'localizeChildrenAtParentLocalization' => true,
            ]
        ]
    ];

});