<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Flight as Flight;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Hash;

class FlightsController extends Controller {

    public function index(Request $request)
    {
        
		$flights 	= Flight::paginate($request->get('pagination_limit', 5));	
		//$flights = Flight::all();
		
		
		$reviews 	= Flight::reviews_list();		
		$bookings 	= Flight::bookings_list();
		
		$data['reviews'] 	= $reviews;
		$data['bookings'] 	= $bookings;
		$data['flights'] 	= $flights;
        
		$data['columnNames']= ['flight_number','origin','destination','departure_time','arrival_time','price','capacity'];        
		
		// dd($data);
		
		return view('flights/index',$data);
    }

    public function add()
    {
        return view('flights/add');
    }

    public function addPost()
    {
        $Flight_data = array(
             'flight_number' => Input::get('flight_number'),
             'origin' => Input::get('origin'),
             'destination' => Input::get('destination'),
             'departure_time' => Input::get('departure_time'),
             'arrival_time' => Input::get('arrival_time'),
             'price' => Input::get('price'),
             'capacity' => Input::get('capacity'),
        );
        $Flight_id = Flight::insert($Flight_data);
        return redirect('flights')->with('message', 'Flight successfully added');
    }

    public function delete($id)
    {
        $Flight = Flight::find($id);
        $Flight->delete();
        return redirect('flights')->with('message', 'Flight deleted successfully.');
    }

    public function edit($id)
    {
        $data['flights'] = Flight::find($id);
        return view('flights/edit', $data);
    }

    public function editPost()
    {
        $id = Input::get('flights_id');

        $data = array(
          'flight_number' => Input::get('flight_number'),
          'origin' => Input::get('origin'),
          'destination' => Input::get('destination'),
          'departure_time' => Input::get('departure_time'),
          'arrival_time' => Input::get('arrival_time'),
          'price' => Input::get('price'),
          'capacity' => Input::get('capacity'),
        );
        Flight::where('id', '=', $id)->update($data);
        return redirect('flights')->with('message', 'Flight Updated successfully');
    }

    public function changeStatus($id)
    {
        $Flight = Flight::find($id);
        $Flight->status = !$Flight->status;
        $Flight->save();
        return redirect('flights')->with('message', 'Change Flight status successfully');
    }

    public function view($id)
    {
        $data['Flight'] = Flight::find($id);
        return view('flights/view', $data);
    }

}
