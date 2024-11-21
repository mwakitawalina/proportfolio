<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd09a9cd0aae1000fc1b73c0ab5e230c3
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'App\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitd09a9cd0aae1000fc1b73c0ab5e230c3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd09a9cd0aae1000fc1b73c0ab5e230c3::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd09a9cd0aae1000fc1b73c0ab5e230c3::$classMap;

        }, null, ClassLoader::class);
    }
}