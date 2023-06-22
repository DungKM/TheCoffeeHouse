<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5b548b6df49e27d32aa3e9fce131691f
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5b548b6df49e27d32aa3e9fce131691f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5b548b6df49e27d32aa3e9fce131691f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit5b548b6df49e27d32aa3e9fce131691f::$classMap;

        }, null, ClassLoader::class);
    }
}
