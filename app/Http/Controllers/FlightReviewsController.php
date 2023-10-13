<?php 

namespace App\Http\Controllers;
use App\Models\FlightReview as FlightReview;
use App\Models\Flight as Flight;
use App\Models\User as User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Hash;

class FlightReviewsController extends Controller {

    public function index()
    {
        $data['flight_reviews'] = FlightReview::all();
		$data['flights'] = Flight::list();
		$data['users'] = User::list();
        $data['columnNames'] = ['flight_id','user_id','rating','review','recommendation'];
        return view('flight_reviews/index', $data);
    }

    public function add()
    {
        return view('flight_reviews/add');
    }

    public function addPost()
    {
        $FlightReview_data = array(
             'flight_id' => Input::get('flight_id'),
             'user_id' => Input::get('user_id'),
             'rating' => Input::get('rating'),
             'review' => Input::get('review'),
             'recommendation' => Input::get('recommendation'),
        );
        $FlightReview_id = FlightReview::insert($FlightReview_data);
        return redirect('flight_reviews')->with('message', 'FlightReview successfully added');
    }

    public function delete($id)
    {
        $FlightReview = FlightReview::find($id);
        $FlightReview->delete();
        return redirect('flight_reviews')->with('message', 'FlightReview deleted successfully.');
    }

    public function edit($id)
    {
        $data['flight_reviews'] = FlightReview::find($id);
        return view('flight_reviews/edit', $data);
    }

    public function editPost()
    {
        $id = Input::get('flight_reviews_id');

        $data = array(
          'flight_id' => Input::get('flight_id'),
          'user_id' => Input::get('user_id'),
          'rating' => Input::get('rating'),
          'review' => Input::get('review'),
          'recommendation' => Input::get('recommendation'),
        );
        FlightReview::where('id', '=', $id)->update($data);
        return redirect('flight_reviews')->with('message', 'FlightReview Updated successfully');
    }

    public function changeStatus($id)
    {
        $FlightReview = FlightReview::find($id);
        $FlightReview->status = !$FlightReview->status;
        $FlightReview->save();
        return redirect('flight_reviews')->with('message', 'Change FlightReview status successfully');
    }

    public function view($id)
    {
        $data['FlightReview'] = FlightReview::find($id);
        return view('flight_reviews/view', $data);
    }

    // Add other methods here...
}
