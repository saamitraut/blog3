<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Eloquent;
// use App\Models\FlightReview as FlightReview;

class Flight extends Eloquent
{
    // protected $table = 'flights';

    public static function list()
    {
        $flights = self::all()->toArray();
        $res = array();
        foreach ($flights as $flight)
        {
            $res[$flight['id']] = $flight;
        }
        return $res;
    }
	public function reviews()
    {
        return $this->hasMany(FlightReview::class);
    }
	public static function reviews_list()
    {
        $flights = self::all();
        $reviews = array();
        foreach ($flights as $flight)
        {
            $reviews[$flight->id] = $flight->reviews;
        }
        
		return $reviews;
    }

	public function bookings()
    {
        return $this->hasMany(FlightBooking::class);
    }
	
	
	public static function bookings_list()
    {
        $flights = self::all();
        $bookings = array();
        foreach ($flights as $flight)
        {
            $bookings[$flight->id] = $flight->bookings;
        }
        
		return $bookings;
    }
}
