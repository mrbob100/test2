<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4ee38cfbf4fa16fc8e98c35c0749d670
{
    public static $classMap = array (
        'Zebra_Pagination' => __DIR__ . '/..' . '/stefangabos/zebra_pagination/Zebra_Pagination.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit4ee38cfbf4fa16fc8e98c35c0749d670::$classMap;

        }, null, ClassLoader::class);
    }
}
