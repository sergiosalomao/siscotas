<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6f1116dc488b14a76577bd22953f317e
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Presto\\' => 7,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Presto\\' => 
        array (
            0 => __DIR__ . '/../..' . '/presto',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6f1116dc488b14a76577bd22953f317e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6f1116dc488b14a76577bd22953f317e::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
