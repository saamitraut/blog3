<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Eloquent;


class User extends Eloquent
{
    // protected $table = 'users';

    public static function list()
    {
        $users = self::all()->toArray();
        $res = array();
        foreach ($users as $user)
        {
            $res[$user['id']] = $user;
        }
        return $res;
    }
}
