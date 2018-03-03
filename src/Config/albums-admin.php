<?php

return [
    'rules'    => [
        'url'           => '/tracks-store',
        'acceptedFiles' => 'image/*,audio/*',
        'maxFilesize'   => '96000000',
    ],
    'path'     => '/app/public/tracks/',
    'db_table' => 'tracks',
    'id_item'  => 'album_id',
    'column'   => 'file',
    'backUrl'  => 'admin/albums',
];