<?php
/**
 * Created by PhpStorm.
 * User: seven
 * Date: 2019/1/4
 * Time: 13:51
 */

namespace App\Controllers\Home;
use App\Controllers\Controller;
use App\Helpers;
use KickPeach\Validate\Validate;
use KickPeach\Validate\ValidateException;


class Index extends Controller
{
    protected static $middleware = [
        'index'=>[
            'App\Middlewares\AuthMiddleware'
        ]
    ];

    public function index()
    {
        try {
            $data = Validate::validated(['name'=>''],['name'=>'required']);
        }catch (ValidateException $exception){
            Helpers\Helper::fail(101,$exception->getMessage());
        }
        $name = 'KickPeach';
        return $this->render('/Home/index.html',compact('name'));    }

    public function test()
    {

        Helpers\Helper::success(['name'=>'seven']);
    }

}