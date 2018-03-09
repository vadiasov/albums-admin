<?php
/*
|--------------------------------------------------------------------------------------------------
| Upload config
|--------------------------------------------------------------------------------------------------
|
| rules
|   url                 route to action in UploadController that process file (don't change)
|   acceptedFiles       mimes
|   maxFilesize         maximum file size
| path                  path to files storage directory
| db_table              DB table name where file names are saved
| id_item               DB table column name of foreign field (album has tracks)
| column                DB table column name for saving of track name
| backUrl               action string for button "Back", leads to an index page of tracks
| header                header for a form
| parent_table          parent DB table
| parent_column_name    parent DB table column name (to add value of it to the header for example)
|
*/
return [
    'rules'              => [
        'url'           => '/tracks-store',
        'acceptedFiles' => 'image/*,audio/*',
        'maxFilesize'   => '96000000',
    ],
    'path'               => '/app/public/tracks/',
    'db_table'           => 'tracks',
    'id_item'            => 'album_id',
    'column'             => 'file',
    'backUrl'            => '\Vadiasov\TracksAdmin\Controllers\TracksController@index',
    'header'             => 'Add tracks to the album ',
    'parent_table'       => 'albums',
    'parent_column_name' => 'title',
];