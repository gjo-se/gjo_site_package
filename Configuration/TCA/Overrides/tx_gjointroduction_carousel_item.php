<?php

call_user_func(function () {

    $table = 'tx_gjointroduction_carousel_item';
    $image = 'image';

    $ext   = 'gjo_introduction';
    $lll   = 'LLL:EXT:' . $ext . '/Resources/Private/Language/ContentElements.xlf:';

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

    $GLOBALS['TCA'][$table]['columns'][$image]['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['mobile']  = $mobileCropSettings;
    $GLOBALS['TCA'][$table]['columns'][$image]['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['tablet']  = $tabletCropSettings;
    $GLOBALS['TCA'][$table]['columns'][$image]['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['laptop']  = $laptopCropSettings;
    $GLOBALS['TCA'][$table]['columns'][$image]['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['desktop'] = $desktopCropSettings;
    $GLOBALS['TCA'][$table]['columns'][$image]['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['wideScreen'] = $wideScreenCropSettings;

});
