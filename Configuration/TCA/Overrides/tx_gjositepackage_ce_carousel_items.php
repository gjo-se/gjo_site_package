<?php

declare(strict_types=1);

use GjoSe\GjoApi\Utility\CroppingUtility;

(function (): void {

    $table = 'tx_gjositepackage_ce_carousel_items';
    $column = 'image';

    CroppingUtility::setCropVariants($table, $column);
})();
