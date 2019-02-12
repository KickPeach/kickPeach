<?php
/**
 * Created by PhpStorm.
 * User: seven
 * Date: 2019/2/11
 * Time: 21:19
 */

namespace MdCalls\Service\Kick\Child;

use KickPeach\DataBase\MysqlConnection;
use KickPeach\DataBase\PostpostgresqlConnection;
use Predis\Client as Redis;
use MdCalls\Basic\MdCallsBasic;

class Storage extends MdCallsBasic
{

    /**
     * @var array 单例属性，所有子类都会共享该属性
     */
    private static $dbObj = [];

    public function init()
    {
    }

    public function invokeRpc($method, $args)
    {
    }

    /**
     * 构造函数
     */
    public function __construct()
    {
    }

    /**
     * 加载数据库mysql获取数据库操作对象
     * $this->loadDB();
     * $this->loadDB('mission.slave');
     *
     * @param string $database
     * @return \Jetea\Database\Connection
     */
    public function db($database = 'default.master')
    {
        if (! isset(self::$dbObj[$database])) {
            $config = $this->mdc->Kick->getConf('database.' . $database);
            if ($config['driver'] == 'mysql') {
                $dsn = sprintf('mysql:host=%s;port=%s;dbname=%s;charset=%s', $config['host'], $config['port'], $config['database'], $config['charset']);
                $connection = new MySqlConnection($dsn, $config['username'], $config['password']);
            } else {    //默认Pgsql
                $dsn = sprintf('pgsql:host=%s;port=%s;dbname=%s', $config['host'], $config['port'], $config['database']);
                $connection = new PostpostgresqlConnection($dsn, $config['username'], $config['password']);
            }
            self::$dbObj[$database] = $connection;
        }
        return self::$dbObj[$database];
    }
    /**
     * redis实例
     */
    private static $redisObj = [];
    /**
     * 加载Redis对象
     * $this->ctx->loadRedis();
     * $this->ctx->loadRedis('test');
     *
     * @param string $redis
     * @return Redis
     */
    public function redis($redis = 'default')
    {
        if (! isset(self::$redisObj[$redis])) {
            $config = $this->mdc->Kick->getConf('redis.' . $redis);
            self::$redisObj[$redis] = new Redis([
                'scheme'    => 'tcp',
                'host'      => $config['host'],
                'port'      => $config['port'],
                'timeout'   => $config['timeout'],
            ]);
        }
        return self::$redisObj[$redis];
    }
    public function __destruct()
    {
        foreach (self::$redisObj as $redis) {
            /** @var $redis Redis */
            $redis->disconnect();
        }
    }
}