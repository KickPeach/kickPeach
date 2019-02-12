<?php
/**
 * Created by PhpStorm.
 * User: seven
 * Date: 2019/2/11
 * Time: 20:52
 */

namespace MdCalls;

use kickPeach\mdCalls\MdCallsService;


class MdCalls extends MdCallsService
{
    protected static $mdCallsInstance;

    protected $mdCallsNamespace = 'MdCalls';
}