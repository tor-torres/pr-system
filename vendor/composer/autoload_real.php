<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInita01ffc542f0438cf632731c4b473f7b1
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

        spl_autoload_register(array('ComposerAutoloaderInita01ffc542f0438cf632731c4b473f7b1', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInita01ffc542f0438cf632731c4b473f7b1', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInita01ffc542f0438cf632731c4b473f7b1::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
