<?php
/**
 * Created by PhpStorm.
 * User: seven
 * Date: 2019/2/14
 * Time: 11:36
 */

namespace App\Models;


class User extends Models
{
    public  function getAllUsers()
    {
        return $this->db()->select('select * from users order by id desc limit 1');
    }

}