<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2d8da406f17fb7709ace5ec421f7b32e
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Carbon_Fields\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Carbon_Fields\\' => 
        array (
            0 => __DIR__ . '/..' . '/htmlburger/carbon-fields/core',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2d8da406f17fb7709ace5ec421f7b32e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2d8da406f17fb7709ace5ec421f7b32e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit2d8da406f17fb7709ace5ec421f7b32e::$classMap;

        }, null, ClassLoader::class);
    }
}