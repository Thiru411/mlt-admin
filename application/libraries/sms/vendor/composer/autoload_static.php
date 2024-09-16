<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc93e2bdcb95028955e94aa94c1d67fa4
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Twilio\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Twilio\\' => 
        array (
            0 => __DIR__ . '/..' . '/twilio/sdk/src/Twilio',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc93e2bdcb95028955e94aa94c1d67fa4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc93e2bdcb95028955e94aa94c1d67fa4::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc93e2bdcb95028955e94aa94c1d67fa4::$classMap;

        }, null, ClassLoader::class);
    }
}