<?php
/**
 * Created by PhpStorm.
 * User: seven
 * Date: 2019/1/2
 * Time: 19:22
 */

namespace App;

use Kickpeach\Framework\Foundation\Application;

class App extends Application
{
    protected $config = [
        'debug'         => false,
        'Version'     => 'KPramework/1.0',
        'timezone'      => 'PRC',
        'view'          => [
            'cache'     => __DIR__ . '/../storage/views',
        ],
    ];

    protected function __construct()
    {
        parent::__construct();
    }
}