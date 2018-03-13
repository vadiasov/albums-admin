<?php

// src/Routes/web.php
Route::group(['middleware' => ['web', 'admin']], function () {
    Route::get('admin/albums', 'Vadiasov\AlbumsAdmin\Controllers\AlbumsController@index')->name('admin/albums');
    Route::get('admin/albums/create', 'Vadiasov\AlbumsAdmin\Controllers\AlbumsController@create')->name('admin/albums/create');
    Route::post('admin/albums/create', 'Vadiasov\AlbumsAdmin\Controllers\AlbumsController@store');
    Route::get('admin/albums/{id}/edit', 'Vadiasov\AlbumsAdmin\Controllers\AlbumsController@edit');
    Route::post('admin/albums/{id}/edit', 'Vadiasov\AlbumsAdmin\Controllers\AlbumsController@update');
    Route::get('admin/albums/{id}/delete', 'Vadiasov\AlbumsAdmin\Controllers\AlbumsController@destroy');
});
