<?php
/**
 * Created by PhpStorm.
 * User: seven
 * Date: 2019/2/11
 * Time: 22:05
 */

namespace MdCalls\Service\Kick\Child;

use MdCalls\Basic\MdCallsBasic;
use MdCalls\Service\Kick\Child\Queue\Job;
use MdCalls\Service\Kick\Child\Queue\Worker;
use KickPeach\Queue\Drivers\Beanstalkd;
use KickPeach\Queue\Queue as QueueService;

class Queue extends MdCallsBasic
{
    public function init()
    {
    }

    public function invokeRpc($method, $args)
    {
    }

    /**
     * 队列连接 实例，所有子类都会共享该属性
     */
    private static $connObj = array();
    /**
     * @param string $conn
     * @return QueueService
     */
    public function getQueue($conn = 'default')
    {
        if (! isset(self::$connObj[$conn])) {
            $config = $this->mdc->Kick->getConf('queue.' . $conn);
            self::$connObj[$conn] = new QueueService(new Beanstalkd($config['host'], $config['port']));
        }
        return self::$connObj[$conn];
    }
    /**
     * @param Job $job
     * @return mixed
     */
    public function dispatch(Job $job)
    {
        return $this->getQueue($job->connection)->push($job);
    }
    /**
     * @param $delay
     * @param Job $job
     * @return mixed
     */
    public function laterDispatch($delay, Job $job)
    {
        return $this->getQueue($job->connection)->later($delay, $job);
    }
    /**
     *
     * Listen to the given queue in a loop.
     *
     * @param $connection
     * @param string $queueTube
     * @param int $sleep 没有新的有效任务产生时的休眠时间 (单位: 秒)
     * @param int $memoryLimit worker 内存限制 (单位: mb)
     */
    public function daemon($connection = 'default', $queueTube = '', $sleep = 60, $memoryLimit = 128)
    {
        $worker = new Worker($this->getQueue($connection), $queueTube);
        $worker->setMdCalls($this->mdc);
        $worker->daemon($sleep, $memoryLimit);
    }


}