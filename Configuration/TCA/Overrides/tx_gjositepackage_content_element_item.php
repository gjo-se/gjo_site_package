<?php

declare(strict_types=1);

use GjoSe\GjoSitePackage\Utility\CroppingUtility;

call_user_func(function (): void {

    $table = 'tx_gjositepackage_content_element_item';
    $column = 'image';

    CroppingUtility::setCropVariants($table, $column);
});
