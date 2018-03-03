<?php

return [
    'rules'    => [
        'url'           => '/tracks-store',
        'acceptedFiles' => 'image/*,audio/*',
        'maxFilesize'   => '96000000',
    ],
    'path'     => '/app/public/tracks/',
    'db_table' => 'tracks',
    'column'   => 'file',
    'backUrl'   => 'admin/albums',
];