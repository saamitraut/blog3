<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Eloquent;


class FlightBooking extends Eloquent
{
    // protected $table = 'flight_bookings';

    public static function list()
    {
        $flight_bookings = self::all()->toArray();
        $res = array();
        foreach ($flight_bookings as $flight_booking)
        {
            $res[$flight_booking['id']] = $flight_booking;
        }
        return $res;
    }
}
