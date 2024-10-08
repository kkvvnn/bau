<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been set up for each driver as an example of the required values.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
            'throw' => false,
        ],

        'my_local' => [
            'driver' => 'local',
            'root' => storage_path('app/my_local'),
            'throw' => false,
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public/images/bauservice/products'),
            'url' => env('APP_URL').'/storage/images/bauservice/products',
            'visibility' => 'public',
            'throw' => false,
        ],
        'public-text' => [
            'driver' => 'local',
            'root' => storage_path('app/public/images/bauservice/products-text'),
            'url' => env('APP_URL').'/storage/images/bauservice/products-text',
            'visibility' => 'public',
            'throw' => false,
        ],

        'collections' => [
            'driver' => 'local',
            'root' => storage_path('app/public/images/bauservice/collections'),
            'url' => env('APP_URL').'/storage/images/bauservice/collections',
            'visibility' => 'public',
            'throw' => false,
        ],

        'artcenter' => [
            'driver' => 'local',
            'root' => storage_path('app/public/images/artcenter'),
            'url' => env('APP_URL').'/storage/images/artcenter',
            'visibility' => 'public',
            'throw' => false,
        ],

        'global-tile' => [
            'driver' => 'local',
            'root' => storage_path('app/public/images/global-tile'),
            'url' => env('APP_URL').'/storage/images/global-tile',
            'visibility' => 'public',
            'throw' => false,
        ],

        'primavera-new' => [
            'driver' => 'local',
            'root' => storage_path('app/public/images/primavera-new'),
            'url' => env('APP_URL').'/storage/images/primavera-new',
            'visibility' => 'public',
            'throw' => false,
        ],

        'kerranova' => [
            'driver' => 'local',
            'root' => storage_path('app/public/images/kerranova'),
            'url' => env('APP_URL').'/storage/images/kerranova',
            'visibility' => 'public',
            'throw' => false,
        ],

        'skalla' => [
            'driver' => 'local',
            'root' => storage_path('app/public/images/skalla'),
            'url' => env('APP_URL').'/storage/images/skalla',
            'visibility' => 'public',
            'throw' => false,
        ],

        'keramopro' => [
            'driver' => 'local',
            'root' => storage_path('app/public/images/keramopro'),
            'url' => env('APP_URL').'/storage/images/keramopro',
            'visibility' => 'public',
            'throw' => false,
        ],

        'collections-text' => [
            'driver' => 'local',
            'root' => storage_path('app/public/images/bauservice/collections-text'),
            'url' => env('APP_URL').'/storage/images/bauservice/collections-text',
            'visibility' => 'public',
            'throw' => false,
        ],

        'bauservice' => [
            'driver' => 'local',
            'root' => storage_path('app/public/images/bauservice/'),
            'url' => env('APP_URL').'/storage/images/bauservice/',
            'visibility' => 'public',
            'throw' => false,
        ],

        'empero' => [
            'driver' => 'local',
            'root' => storage_path('app/public/images/empero'),
            'url' => env('APP_URL').'/storage/images/empero',
            'visibility' => 'public',
            'throw' => false,
        ],

        'pixmosaic' => [
            'driver' => 'local',
            'root' => storage_path('app/public/images/pixmosaic'),
            'url' => env('APP_URL').'/storage/images/pixmosaic',
            'visibility' => 'public',
            'throw' => false,
        ],

        'no_image' => [
            'driver' => 'local',
            'root' => storage_path('app/public/'),
            'url' => env('APP_URL').'/storage/',
            'visibility' => 'public',
            'throw' => false,
        ],

        'avito' => [
            'driver' => 'local',
            'root' => storage_path('app/public/'),
            'url' => env('APP_URL').'/storage/',
            'visibility' => 'public',
            'throw' => false,
        ],

        'woocommerce' => [
            'driver' => 'local',
            'root' => storage_path('app/public/'),
            'url' => env('APP_URL').'/storage/',
            'visibility' => 'public',
            'throw' => false,
        ],

        'leedo' => [
            'driver' => 'local',
            'root' => storage_path('app/public/leedo'),
            // 'url' => env('APP_URL').'/storage',
            // 'visibility' => 'public',
            'throw' => false,
        ],

        'aquafloor' => [
            'driver' => 'local',
            'root' => storage_path('app/public/Aquafloor'),
            // 'url' => env('APP_URL').'/storage',
            // 'visibility' => 'public',
            'throw' => false,
        ],

        'primavera' => [
            'driver' => 'local',
            'root' => storage_path('app/public/Primavera'),
            // 'url' => env('APP_URL').'/storage',
            // 'visibility' => 'public',
            'throw' => false,
        ],

        'altacera' => [
            'driver' => 'local',
            'root' => storage_path('app/public/Altacera'),
            'url' => '/storage/Altacera',
            // 'visibility' => 'public',
            'throw' => false,
        ],

        'foto' => [
            'driver' => 'local',
            'root' => storage_path('app/public/foto'),
            'url' => '/storage/foto',
            'visibility' => 'public',
            'throw' => false,
        ],

        'foto_primavera' => [
            'driver' => 'local',
            'root' => storage_path('app/public/foto-primavera'),
            'url' => '/storage/foto-primavera',
            'visibility' => 'public',
            'throw' => false,
        ],

        'foto_ntceramic' => [
            'driver' => 'local',
            'root' => storage_path('app/public/foto-ntceramic'),
            'url' => '/storage/foto-ntceramic',
            'visibility' => 'public',
            'throw' => false,
        ],

        'foto_pixmosaic' => [
            'driver' => 'local',
            'root' => storage_path('app/public/foto-pixmosaic'),
            'url' => '/storage/foto-pixmosaic',
            'visibility' => 'public',
            'throw' => false,
        ],

        'foto_absolut_gres' => [
            'driver' => 'local',
            'root' => storage_path('app/public/foto-absolut-gres'),
            'url' => '/storage/foto-absolut-gres',
            'visibility' => 'public',
            'throw' => false,
        ],

        'foto_leedo' => [
            'driver' => 'local',
            'root' => storage_path('app/public/foto-leedo'),
            'url' => '/storage/foto-leedo',
            'visibility' => 'public',
            'throw' => false,
        ],

        'foto_altacera' => [
            'driver' => 'local',
            'root' => storage_path('app/public/foto-altacera'),
            'url' => '/storage/foto-altacera',
            'visibility' => 'public',
            'throw' => false,
        ],

        // 'avito' => [
        //     'driver' => 'local',
        //     'root' => storage_path('app/public/avito'),
        //     'url' => env('APP_URL').'/storage',
        //     'visibility' => 'public',
        //     'throw' => false,
        // ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
        ],

        'ftp' => [
            'driver' => 'ftp',
            'host' => env('FTP_HOST'),
            'username' => env('FTP_USERNAME'),
            'password' => env('FTP_PASSWORD'),

            // Optional FTP Settings...
            // 'port' => env('FTP_PORT', 21),
            // 'root' => env('FTP_ROOT'),
            // 'passive' => true,
            // 'ssl' => true,
            // 'timeout' => 30,
        ],

        'ftp_bau_spb' => [
            'driver' => 'ftp',
            'host' => 'piranesi.datastrg.ru',
            'username' => '1c-ftp',
            'password' => 'N474pvJUjkCteTQ5BWs5EGJtJJCtwH',
            'port' => 21,
            // Optional FTP Settings...
            // 'port' => env('FTP_PORT', 21),
            // 'root' => env('FTP_ROOT'),
            // 'passive' => true,
            // 'ssl' => true,
            // 'timeout' => 30,
        ],

        'ftp_leedo' => [
            'driver' => 'ftp',
            'host' => '92.53.96.128',
            'username' => 'leedoceram_nomenkl',
            'password' => 'Zagruzka789',

            // Optional FTP Settings...
            'port' => 21,
            // 'root' => env('FTP_ROOT'),
            // 'passive' => true,
            // 'ssl' => true,
            // 'timeout' => 30,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
        // public_path('small_img') => storage_path('app/public/small_img'),
    ],

];
