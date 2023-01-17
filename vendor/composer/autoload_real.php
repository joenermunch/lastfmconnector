<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitf59e2a1b73e4679c6671bbf62e500574
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInitf59e2a1b73e4679c6671bbf62e500574', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitf59e2a1b73e4679c6671bbf62e500574', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitf59e2a1b73e4679c6671bbf62e500574::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}