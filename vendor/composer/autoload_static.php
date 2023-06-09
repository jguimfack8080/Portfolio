<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1e4052ac507726c534a69d4bff6039df
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1e4052ac507726c534a69d4bff6039df::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1e4052ac507726c534a69d4bff6039df::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
