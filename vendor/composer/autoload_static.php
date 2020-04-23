<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit361cea50e2b113864311d0af65beeda2
{
    public static $files = array (
        'ad8997fd96d065a020cc094e9d9231e8' => __DIR__ . '/../..' . '/app/config/constantes.php',
    );

    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Models\\' => 7,
        ),
        'C' => 
        array (
            'Controllers\\' => 12,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Models\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/models',
        ),
        'Controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/controllers',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit361cea50e2b113864311d0af65beeda2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit361cea50e2b113864311d0af65beeda2::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
