<?php
/**
 * Created by PhpStorm.
 * User: shisiying
 * Date: 2019-03-29
 * Time: 22:56
 */

namespace App\Middlewares;

use Closure;
use Kickpeach\Framework\Contracts\Application;

class AuthMiddleware
{
    public function handle(Application $app, Closure $next)
    {
        if (false) {
            \App\Helpers\Helper::redirect('/home/index/test');
        }
        $response = $next($app);
        return $response;
    }

}