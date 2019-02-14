<?php
/**
 * Created by PhpStorm.
 * User: seven
 * Date: 2019/2/14
 * Time: 11:31
 */

namespace App\Models;
 use MdCalls\MdCalls;

abstract class Models
{
    private  $db;

    public function __construct()
    {
        $this->db = MdCalls::getInstance()->Kick->loadDB();
    }

    public function db()
    {
        return $this->db;
    }

}