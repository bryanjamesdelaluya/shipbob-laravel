<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8f38f3629c48df99d1bbd076645df8a3
{
    public static $prefixLengthsPsr4 = array (
        'B' => 
        array (
            'Bryanjamesdelaluya\\ShipbobLaravel\\' => 34,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Bryanjamesdelaluya\\ShipbobLaravel\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8f38f3629c48df99d1bbd076645df8a3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8f38f3629c48df99d1bbd076645df8a3::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit8f38f3629c48df99d1bbd076645df8a3::$classMap;

        }, null, ClassLoader::class);
    }
}
