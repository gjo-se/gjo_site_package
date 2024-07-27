<?php

call_user_func(function (): void {

    $table = 'tt_content';
    $column = 'image';

    $ext   = 'gjo_site_package';
    $lll   = 'LLL:EXT:' . $ext . '/Resources/Private/Language/ContentElements.xlf:';


    if (!is_array($GLOBALS['TCA'][$table]['types'][$column])) {
        $GLOBALS['TCA'][$table]['types'][$column] = [];
    }

    $GLOBALS['TCA'][$table]['types'][$column] = array_replace_recursive(
        $GLOBALS['TCA'][$table]['types'][$column],
        [
            'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general, 
                    --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
                    image, 
                --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance, 
                    --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.frames;frames, tx_gjositepackage_additional_css, 
                    --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.appearanceLinks;appearanceLinks, 
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language, 
                    --palette--;;language, 
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, 
                    --palette--;;hidden, 
                    --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access, 
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories, 
                --div--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_category.tabs.category, categories, 
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes, rowDescription, 
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended
                ',
        ]
    );

    $defaultCropSettings = \GjoSe\GjoSitePackage\Utility\CroppingUtility::getDefaultCropSettings();

    $mobileCropSettings           = $defaultCropSettings;
    $mobileCropSettings['title']  = $lll . 'cropVariant.mobile';
    $tabletCropSettings           = $defaultCropSettings;
    $tabletCropSettings['title']  = $lll . 'cropVariant.tablet';
    $laptopCropSettings           = $defaultCropSettings;
    $laptopCropSettings['title']  = $lll . 'cropVariant.laptop';
    $desktopCropSettings          = $defaultCropSettings;
    $desktopCropSettings['title'] = $lll . 'cropVariant.desktop';
    $wideScreenCropSettings          = $defaultCropSettings;
    $wideScreenCropSettings['title'] = $lll . 'cropVariant.wideScreen';

    $GLOBALS['TCA'][$table]['columns'][$column]['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['mobile']  = $mobileCropSettings;
    $GLOBALS['TCA'][$table]['columns'][$column]['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['tablet']  = $tabletCropSettings;
    $GLOBALS['TCA'][$table]['columns'][$column]['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['laptop']  = $laptopCropSettings;
    $GLOBALS['TCA'][$table]['columns'][$column]['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['desktop'] = $desktopCropSettings;
    $GLOBALS['TCA'][$table]['columns'][$column]['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['wideScreen'] = $wideScreenCropSettings;

});