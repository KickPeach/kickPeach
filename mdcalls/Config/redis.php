<?php
/**
 * Created by PhpStorm.
 * User: seven
 * Date: 2019/2/11
 * Time: 22:17
 */

return array(
    'default'  => array(    //默认redis
        'host'      => App\Helpers\Helper::env('REDIS_HOST'),
        'port'      => App\Helpers\Helper::env('REDIS_PORT'),
        'timeout'   => 3,
    ),
);