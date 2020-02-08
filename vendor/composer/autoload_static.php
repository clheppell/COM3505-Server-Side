<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb79906d12ef2cc0bf7877067d1d9c2ef
{
    public static $files = array (
        '6195ccae414b7a82ab47247beb894d66' => __DIR__ . '/..' . '/nezamy/route/system/function.php',
        '3f8bdd3b35094c73a26f0106e3c0f8b2' => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/SendGrid.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'System\\Support\\' => 15,
            'System\\' => 7,
            'SendGrid\\Stats\\' => 15,
            'SendGrid\\Mail\\' => 14,
            'SendGrid\\Contacts\\' => 18,
            'SendGrid\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'System\\Support\\' => 
        array (
            0 => __DIR__ . '/..' . '/nezamy/support',
        ),
        'System\\' => 
        array (
            0 => __DIR__ . '/..' . '/nezamy/route/system',
        ),
        'SendGrid\\Stats\\' => 
        array (
            0 => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/stats',
        ),
        'SendGrid\\Mail\\' => 
        array (
            0 => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/mail',
        ),
        'SendGrid\\Contacts\\' => 
        array (
            0 => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/contacts',
        ),
        'SendGrid\\' => 
        array (
            0 => __DIR__ . '/..' . '/sendgrid/php-http-client/lib',
            1 => __DIR__ . '/..' . '/sendgrid/sendgrid/lib',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb79906d12ef2cc0bf7877067d1d9c2ef::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb79906d12ef2cc0bf7877067d1d9c2ef::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}