<?php
/**
 * Created by PhpStorm.
 * User: seven
 * Date: 2019/2/11
 * Time: 22:16
 */

return [
    'default' => array(
        'master' => [  //默认数据库
            'driver'    => 'mysql',
            'host'      => App\Helpers\Helper::env('DB_HOST'),
            'port'      => App\Helpers\Helper::env('DB_PORT'),
            'database'  => App\Helpers\Helper::env('DB_DATABASE'),
            'username'  => App\Helpers\Helper::env('DB_USERNAME'),
            'password'  => App\Helpers\Helper::env('DB_PASSWORD'),
            'charset'   => 'utf8mb4',
        ],
        'slave' => [
            'driver'    => 'mysql',
            'host'      => App\Helpers\Helper::env('DB_HOST'),
            'port'      => App\Helpers\Helper::env('DB_PORT'),
            'database'  => App\Helpers\Helper::env('DB_DATABASE'),
            'username'  => App\Helpers\Helper::env('DB_USERNAME'),
            'password'  => App\Helpers\Helper::env('DB_PASSWORD'),
            'charset'   => 'utf8mb4',
        ]
    ),
    // 'MDB_MISSION'
    'user' => [
        'master' => [  //默认数据库
            'driver'    => 'pgsql',
            'host'      => App\Helpers\Helper::env('DB_HOST'),
            'port'      => App\Helpers\Helper::env('DB_PORT'),
            'database'  => App\Helpers\Helper::env('DB_DATABASE'),
            'username'  => App\Helpers\Helper::env('DB_USERNAME'),
            'password'  => App\Helpers\Helper::env('DB_PASSWORD'),
        ],
        'slave' => [
            'driver'    => 'pgsql',
            'host'      => App\Helpers\Helper::env('DB_HOST'),
            'port'      => App\Helpers\Helper::env('DB_PORT'),
            'database'  => App\Helpers\Helper::env('DB_DATABASE'),
            'username'  => App\Helpers\Helper::env('DB_USERNAME'),
            'password'  => App\Helpers\Helper::env('DB_PASSWORD'),
        ]
    ],
];