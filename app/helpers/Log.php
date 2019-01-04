<?php
/**
 * Created by PhpStorm.
 * User: seven
 * Date: 2019/1/4
 * Time: 9:11
 */

namespace App\Helpers;

use Kickpeach\Framework\surpport\Helpers\Logger;

class Log extends Logger
{
    protected  function getLogPath($dir)
    {
        return $dir.'/'.date('Ym').'/';
    }

    protected function getStoragePath()
    {
        return dirname(dirname(__DIR__)).'/storage';
    }

}