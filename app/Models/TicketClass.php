<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Eloquent;


class TicketClass extends Eloquent
{
    protected $table = 'ticket_classs';

    public static function list()
    {
        $ticket_classs = self::all()->toArray();
        $res = array();
        foreach ($ticket_classs as $ticket_class)
        {
            $res[$ticket_class['id']] = $ticket_class;
        }
        return $res;
    }
}
