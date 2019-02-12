<?php
/**
 * Created by PhpStorm.
 * User: seven
 * Date: 2019/2/11
 * Time: 22:06
 */

namespace MdCalls\Service\Kick\Child\Queue;

use KickPeach\Queue\Job as BasicJob;

abstract class Job extends BasicJob
{
    public $connection = 'default';

    public $mdc;
}