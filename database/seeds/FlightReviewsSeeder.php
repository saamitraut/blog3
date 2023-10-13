<?php
use App\Models\FlightReview;
use Illuminate\Database\Seeder;

class FlightReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $flightreviews=[
			[
				'flight_id'=>1,
				'user_id'=>1,
				'rating'=>5,
				'review'=>'This flight was great!',
				'recommendation'=>'Yes',
				'status'=>1,
			],
			[
				'flight_id'=>1,
				'user_id'=>3,
				'rating'=>3,
				'review'=>'The flight was okay, but the service was a bit slow..',
				'recommendation'=>'No',
				'status'=>1,
			],
			[
				'flight_id'=>2,
				'user_id'=>2,
				'rating'=>4,
				'review'=>'The flight was good, but the food could have been better.',
				'recommendation'=>'Yes',
				'status'=>1,
			]
		];
		
		foreach ($flightreviews as $flightreview) {
            FlightReview::create($flightreview);
        }
    }
}
