<?php

namespace Vadiasov\AlbumsAdmin;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

class AlbumsAdminServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @param \Illuminate\Routing\Router $router
     *
     * @return void
     */
    public function boot(Router $router)
    {
        $router->aliasMiddleware('albums-admin', \Vadiasov\AlbumsAdmin\Middleware\AlbumsAdminMiddleware::class);

//        $this->publishes([__DIR__.'/Config/albums-admin.php' => config_path('albums-admin.php'),]);
//        $this->publishes([__DIR__ . '/Translations' => resource_path('lang/vadiasov/albums-admin'),]);
        $this->publishes([__DIR__ . '/Views' => resource_path('views/vadiasov/admin/albums-admin'),]);
//        $this->publishes([__DIR__ . '/Assets' => public_path('vadiasov/admin/albums-admin'),], 'albums_admin_assets');
    
        $this->loadRoutesFrom(__DIR__ . '/Routes/web.php');
        $this->loadMigrationsFrom(__DIR__ . '/Migrations');
        $this->loadTranslationsFrom(__DIR__ . '/Translations', 'albums-admin');
        $this->loadViewsFrom(__DIR__ . '/Views', 'albums-admin');
    
        if ($this->app->runningInConsole()) {
            $this->commands([
                \Vadiasov\AlbumsAdmin\Commands\AlbumsAdminCommand::class,
            ]);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Vadiasov\AlbumsAdmin\Controllers\AlbumsController');
        $this->app->make('Vadiasov\AlbumsAdmin\Requests\AlbumRequest');
        $this->mergeConfigFrom(
            __DIR__ . '/Config/albums-admin.php', 'albums-admin'
        );
    }
}
