<?php
/**
 * Created by PhpStorm.
 * User: seven
 * Date: 2019/1/4
 * Time: 15:59
 */

namespace App\Controllers\Admin;

use App\Controllers\Controller;

class Index extends Controller
{
    public function index()
    {
        $name = 'KickPeach';
        return $this->render('/Admin/index.html',compact('name'));
    }
}