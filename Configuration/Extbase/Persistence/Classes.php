<?php

declare(strict_types=1);

use GjoSe\GjoSitePackage\Domain\Model\Pages;

return (function (): array {
    return [
        Pages::class => [
            'tableName' => 'pages',
        ],
    ];
})();
