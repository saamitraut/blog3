<?php
use App\Models\FlightBooking;
use Illuminate\Database\Seeder;

class FlightBookingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $flightbookings=[
			[
				'flight_id'=>1,
				'passenger_name'=>'John Doe',
				'passport_number'=>'1234567890',
				'ticket_class_id'=>1,
				'booking_date'=>'2023-10-05',
				'status'=>1,
			],
			[
				'flight_id'=>1,
				'passenger_name'=>'John Smith',
				'passport_number'=>'9876543210',
				'ticket_class_id'=>2,
				'booking_date'=>'2023-10-05',
				'status'=>1,
			],
			[
				'flight_id'=>3,
				'passenger_name'=>'Peter Parker',
				'passport_number'=>'0987654321',
				'ticket_class_id'=>3,
				'booking_date'=>'2023-10-04',
				'status'=>1,
			]
		];
    
		foreach ($flightbookings as $flightbooking) {
            FlightBooking::create($flightbooking);
        }
	
	}
}
