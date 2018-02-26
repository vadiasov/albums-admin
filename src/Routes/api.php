<?php

Route::namespace('Vadiasov\AlbumsAdmin\Controllers')->as('albums-admin::')->middleware('api')->group(function () {
    // Routes defined here have the api middleware applied
    // like the api.php file in a laravel project
    // They also have an applied controller namespace and a route names.
});
