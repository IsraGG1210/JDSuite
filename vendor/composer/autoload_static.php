<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit06738349ab516ceefb1f24a5f0618b88
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit06738349ab516ceefb1f24a5f0618b88::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit06738349ab516ceefb1f24a5f0618b88::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit06738349ab516ceefb1f24a5f0618b88::$classMap;

        }, null, ClassLoader::class);
    }
}
