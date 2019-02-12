<?php
/**
 * Created by PhpStorm.
 * User: seven
 * Date: 2019/2/11
 * Time: 21:06
 */

namespace MdCalls\Service\Kick;
use Dotenv\Dotenv;
use MdCalls\Basic\MdCallsBasic;
use App\helpers\Config;

class KickIndex extends MdCallsBasic
{
    public function init()
    {
        Dotenv::create(__DIR__ . '/../../../','.env')->load();//所有.env文件的变量都可以使用getenv($var)获取到
        $this->config = new Config(__DIR__ . '/../../config');
        $this->storage = $this->loadC('Storage');
        $this->queue = $this->loadC('Queue');    }

    public function invokeRpc($method, $args)
    {
        // TODO: Implement invokeRpc() method.
    }

    private $config;

    private $storage;

    private $queue;


    /**
     * 获取配置
     *
     * @param $item
     * @param mixed $default
     * @return mixed
     */
    public function getConf($item, $default = null)
    {
        return $this->config->get($item, $default);
    }
    /**
     * 设置配置
     *
     * @param $item
     * @param mixed $config
     * @return void
     */
    public function setConf($item, $config = null)
    {
        $this->config->set($item, $config);
    }


    /**
     * 获取mysql
     */
    public function loadDB($database = 'default.master')
    {
        return $this->storage->db($database);
    }
    /**
     * 获取redis
     */
    public function loadRedis($redis = 'default')
    {
        return $this->storage->redis($redis);
    }
    /**
     * @param Job $job
     * @return mixed
     */
    public function dispatch(Job $job)
    {
        return $this->queue->dispatch($job);
    }
    /**
     * @param $delay
     * @param Job $job
     * @return mixed
     */
    public function laterDispatch($delay, Job $job)
    {
        return $this->queue->laterDispatch($delay, $job);
    }
    /**
     *
     * Listen to the given queue in a loop.
     *
     * @param $conn
     * @param string $queueTube
     * @param int $sleep 没有新的有效任务产生时的休眠时间 (单位: 秒)
     * @param int $memoryLimit worker 内存限制 (单位: mb)
     */
    public function queueDaemon($conn = 'default', $queueTube = '', $sleep = 60, $memoryLimit = 128)
    {
        $this->queue->daemon($conn, $queueTube, $sleep, $memoryLimit);
    }


}