<?php

call_user_func(function () {

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
