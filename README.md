## Laravel AlbumsAdmin
This package creates DB albums (music albums). It serves CRUD pages for albums in administrative panel.

It includes a ServiceProvider to register the package and attach it to the output. 
It includes migrations to create DB albums.

## Installation
Add the package to root composer.json:
````
"require": {
        ...
        "vadiasov/albums-admin": "^1.0.0",
  }
````
Then run:
````
composer update
````
Register package in config/app.php
````
'providers' => [
        /*
         * Package Service Providers...
         */
        Vadiasov\AlbumsAdmin\AlbumsAdminServiceProvider::class,
````
Create model:
````
php artisan make:model Album
````
Publish migrations and seeds. Run:
````
php artisan vendor:publish
````
and enter appropriate number of this package (see terminal output after last command).


Migrate:
````
php artisan migrate
````

## Routes
The routes are in the package:
````
admin/albums
admin/albums/create
admin/albums/{id}/edit
admin/albums/{id}/delete
````
