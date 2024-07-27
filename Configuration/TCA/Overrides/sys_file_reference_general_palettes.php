<?php

declare(strict_types=1);

call_user_func(function (): void {

    $table = 'sys_file_reference';

    $GLOBALS['TCA'][$table]['palettes']['imageoverlayPalette_TitleAltTextCrop'] = [
        'showitem' => '
        title,alternative,
        --linebreak--,
        link,
        --linebreak--,
        crop
    '
    ];

});
