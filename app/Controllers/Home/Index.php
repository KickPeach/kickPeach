<?php
/**
 * Created by PhpStorm.
 * User: seven
 * Date: 2019/1/4
 * Time: 13:51
 */

namespace App\Controllers\Home;


use App\Controllers\Controller;

class Index extends Controller
{
    protected static $middleware = [
        'index'=>[
            //'\Tree6bee\Framework\Foundation\Http\Middleware\VerifyCsrfToken',

        ]
    ];

    public function index()
    {
        $name = 'KickPeach';
        return $this->render('/Home/index.html',compact('name'));
    }

}