<?php

namespace App\Modules;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;

class ModulesServiceProvider extends ServiceProvider
{
    protected $namespace = 'App\Modules';

    public function boot()
    {
        //Load All Modules
        $modules = array_diff(scandir(__DIR__), ['.', '..']);

        //Prepend BaseApp Module to the beginning of the $modules array
        if ($key = array_search('BaseApp', $modules)) {
            unset($modules[$key]);
            array_unshift($modules, 'BaseApp');
        }

        //Load system Modules
        foreach ($modules as $module) {
            $this->loadModules($module);
        }
    }

    public function loadModules($module)
    {
        $currentDir = __DIR__ . DIRECTORY_SEPARATOR . $module;
        if (is_dir($currentDir)) {
            // Moudle files structure
            $web = $currentDir . DIRECTORY_SEPARATOR .'Routes'. DIRECTORY_SEPARATOR . 'web.php';
            $api = $currentDir . DIRECTORY_SEPARATOR . 'Routes'. DIRECTORY_SEPARATOR . 'api.php';
            $config = $currentDir . DIRECTORY_SEPARATOR . 'config.php';
            $views = $currentDir . DIRECTORY_SEPARATOR . 'Views';
            $lang = $currentDir . DIRECTORY_SEPARATOR . 'Lang';
            $migration = $currentDir . DIRECTORY_SEPARATOR . 'Database' . DIRECTORY_SEPARATOR . 'Migrations';
            $middleware = $currentDir . DIRECTORY_SEPARATOR . 'Middleware';

            if (file_exists($config)) {
                $config = include $config;
                //check if module is enabled
                if (!$config['status']) return;

                //Register Module Helpers
                if (isset($config['autoload'])) {
                    foreach ($config['autoload'] as $f) {
                        include $currentDir . DIRECTORY_SEPARATOR . str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $f);
                    }
                }
            } else {
                return;
            }

            //Register Module Web Routes
            if (file_exists($web)) {
                $this->mapWebRoutes($this->namespace . '\\' . $module . '\Controllers', $web);
            }

            //Register Module Api Routes
            if (file_exists($api)) {
                $this->mapApiRoutes($this->namespace . '\\' . $module . '\Controllers', $api);
            }

            //Register Module Views
            if (is_dir($views) && file_exists($views)) {
                $this->loadViewsFrom($views, $module);
            }

            //Register Module Lang Files
            if (is_dir($lang) && file_exists($lang)) {
                $this->loadTranslationsFrom($lang, $module);
            }

            //Register Module Middleware
            if (is_dir($middleware) && file_exists($middleware) && isset($config['middleware'])) {
                $this->registerMiddleware($this->app['router'], $config['middleware'], $module);
            }

            //Register Module Migrations
            if (is_dir($migration)) {
                $this->loadMigrationsFrom($migration);
            }
        }
    }

    public function register()
    {
        $this->app->singleton(ModulesHelpers::class, function ($app) {
            return new ModulesHelpers($app);
        });
    }

    protected function mapWebRoutes($namespace, $path)
    {
        Route::middleware('web')->namespace($namespace)->group($path);
    }

    protected function mapApiRoutes($namespace, $path)
    {
        Route::prefix('api/v1')->middleware(['api', 'throttle:600,1'])->namespace($namespace)->group($path);
    }

    public function registerMiddleware(Router $router, $config, $module)
    {
        foreach ($config as $name => $middleware) {
            $class = "App\\Modules\\{$module}\\Middleware\\{$middleware}";
            $router->aliasMiddleware($name, $class);
        }
    }
}
