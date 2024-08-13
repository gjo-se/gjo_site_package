<?php

declare(strict_types=1);

use GjoSe\GjoSitePackage\Utility\CroppingUtility;

call_user_func(function (): void {

    $table = 'tx_gjositepackage_carousel_item';
    $column = 'image';

    CroppingUtility::setCropVariants($table, $column);

});
