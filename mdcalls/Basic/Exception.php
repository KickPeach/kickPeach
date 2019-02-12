<?php
/**
 * Created by PhpStorm.
 * User: seven
 * Date: 2019/2/11
 * Time: 21:00
 */

namespace MdCalls\Basic;

use kickPeach\mdCalls\Exceptions\MdCallsException;

class Exception extends MdCallsException
{
    public function __construct($message = '', $code = 0)
    {
        parent::__construct($message, $code);
    }
}