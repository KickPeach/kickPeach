<?php
/**
 * Created by PhpStorm.
 * User: seven
 * Date: 2019/1/2
 * Time: 19:22
 */

namespace App;

use Kickpeach\Framework\Foundation\Application;

use App\Exceptions\Handler;
use App\Routing\Router;

class App extends Application
{
    protected $config = [
        'debug'         => true,
        'Version'     => 'KPramework/1.0',
        'timezone'      => 'PRC',
        'view'          => [
            'cache'     => __DIR__ . '/../storage/views',
        ],
        'xhprof_dir'    => __DIR__ . '/../public/xhprof',

    ];

    protected function __construct()
    {
        parent::__construct();
    }

    protected function setExceptionsHandler()
    {
        return new Handler($this->config('debug'), '', $this->config('Version'));
    }

    protected function initRouter()
    {
        $this->router = new Router(dirname(__DIR__) . '/storage/cache/route.cache');
    }

    //全局中间件
    protected $middleware = [
        \Kickpeach\Framework\Foundation\Middleware\Xhprof::class,
    ];
}