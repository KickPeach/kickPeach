<?php
/**
 * Created by PhpStorm.
 * User: seven
 * Date: 2019/1/2
 * Time: 19:51
 */

namespace App\Routing;

use Kickpeach\Framework\Routing\Router as BaseRouter;

class Router extends BaseRouter
{
    /**
     * 获取路由定义
     */
    protected function getRouteDefinition()
    {
        //先加载自定义的
        if (PHP_SAPI!='cli'){
            require __DIR__.'/../routes/web.php';
        }
        //再加载tp式的路由形式
        parent::getRouteDefinition();
    }
}