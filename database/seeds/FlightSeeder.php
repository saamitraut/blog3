<?php
use App\Models\Flight;
use Illuminate\Database\Seeder;

class FlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $flights = [
            [
                'flight_number' => 'BA456',
                'origin' => 'London Heathrow Airport',
                'destination' => 'Los Angeles International Airport',
                'departure_time' => '2023-08-06 12:00:00',
                'arrival_time' => '2023-08-06 17:00:00',
                'price' => 500,
                'capacity' => 200,
            ],
            [
                'flight_number' => 'DL789',
                'origin' => 'Atlanta Hartsfield-Jackson International Airport',
                'destination' => 'San Francisco International Airport',
                'departure_time' => '2023-08-06 12:00:00',
                'arrival_time' => '2023-08-06 15:00:00',
                'price' => 400,
                'capacity' => 150,
            ],
            [
                'flight_number' => 'UA901',
                'origin' => 'Chicago OHare International Airport',
                'destination' => 'Dallas/Fort Worth International Airport',
                'departure_time' => '2023-08-06 12:00:00',
                'arrival_time' => '2023-08-06 15:00:00',
                'price' => 300,
                'capacity' => 100,
            ],
            [
                'flight_number' => 'AA1234',
                'origin' => 'Miami International Airport',
                'destination' => 'Las Vegas McCarran International Airport',
                'departure_time' => '2023-08-06 12:00:00',
                'arrival_time' => '2023-08-06 14:00:00',
                'price' => 200,
                'capacity' => 50,
            ],
            [
                'flight_number' => 'WN5678',
                'origin' => 'Phoenix Sky Harbor International Airport',
                'destination' => 'Seattle-Tacoma International Airport',
                'departure_time' => '2023-08-06 12:00:00',
                'arrival_time' => '2023-08-06 14:00:00',
                'price' => 100,
                'capacity' => 25,
            ],
        ];

        foreach ($flights as $flight) {
            Flight::create($flight);
        }
    }
}
