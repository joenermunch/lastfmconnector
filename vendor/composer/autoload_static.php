<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf59e2a1b73e4679c6671bbf62e500574
{
    public static $prefixLengthsPsr4 = array (
        'I' => 
        array (
            'Inc\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Inc\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf59e2a1b73e4679c6671bbf62e500574::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf59e2a1b73e4679c6671bbf62e500574::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf59e2a1b73e4679c6671bbf62e500574::$classMap;

        }, null, ClassLoader::class);
    }
}
