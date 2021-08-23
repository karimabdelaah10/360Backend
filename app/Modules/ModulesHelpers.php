<?php namespace App\Modules;
use Config;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
class ModulesHelpers extends ServiceProvider
{
    private static $functions = [];
    public static function create($name, $val){
        static::$functions[$name] = $val;
    }

    public static function __callStatic($name, $args)
    {
        return  isset(static::$functions[$name]) && is_callable(static::$functions[$name])
            ? call_user_func_array(static::$functions[$name], $args) : null;
    }

}