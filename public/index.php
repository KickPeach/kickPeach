<?php
/**
 * Created by PhpStorm.
 * User: seven
 * Date: 2019/1/2
 * Time: 19:15
 */


require __DIR__.'/../vendor/autoload.php';

require_once __DIR__.'/../app/Helpers/function.php';


\App\App::getInstance()->run();

if (\App\App::getInstance()->config('debug')){
    require_once __DIR__.'/../app/Helpers/DebugBar.php';
}




