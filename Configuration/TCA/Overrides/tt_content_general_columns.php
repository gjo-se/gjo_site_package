<?php

call_user_func(function () {

    $table  = 'tt_content';
    $column = 'tx_gjointroduction_carousel_item';

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
                'showRemovedLocalizationRecords' => false,
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