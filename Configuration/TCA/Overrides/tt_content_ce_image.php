<?php

declare(strict_types=1);

use GjoSe\GjoSitePackage\Utility\CroppingUtility;

(function (): void {

    $table = 'tt_content';
    $column = 'image';

    CroppingUtility::setCropVariants($table, $column);
})();
