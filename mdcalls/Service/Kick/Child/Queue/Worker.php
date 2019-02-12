<?php
/**
 * Created by PhpStorm.
 * User: seven
 * Date: 2019/2/11
 * Time: 22:06
 */

namespace MdCalls\Service\Kick\Child\Queue;

use KickPeach\Queue\Worker as BasicWorker;
use KickPeach\Queue\Job;
use MdCalls\MdCalls;

class Worker extends BasicWorker
{
    private $mdc;

    public function setMdCalls(MdCalls $mdc)
    {
        $this->mdc = $mdc;
    }

    protected function logProcessError(\Exception $e)
    {
        parent::logProcessError($e);
    }

    protected function handleWithObj(Job $obj)
    {
        $obj->mdc = $this->mdc;
        parent::handleWithObj($obj);
    }

    protected function queueShouldRestart($startTime)
    {
        return false;
    }

}