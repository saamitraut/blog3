<?php 

namespace App\Http\Controllers;
use App\Models\FlightBooking as FlightBooking;
use App\Models\Flight as Flight;
use App\Models\TicketClass as TicketClass;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Hash;

class FlightBookingsController extends Controller {

    public function index()
    {
        $data['flight_bookings'] = FlightBooking::all();
    $data['flights'] = Flight::list();
    $data['ticket_classes'] = TicketClass::list();
        $data['columnNames'] = ['flight_id','passenger_name','passport_number','ticket_class_id','booking_date'];
        return view('flight_bookings/index', $data);
    }

    public function add()
    {
        return view('flight_bookings/add');
    }

    public function addPost()
    {
        $FlightBooking_data = array(
             'flight_id' => Input::get('flight_id'),
             'passenger_name' => Input::get('passenger_name'),
             'passport_number' => Input::get('passport_number'),
             'ticket_class_id' => Input::get('ticket_class_id'),
             'booking_date' => Input::get('booking_date'),
        );
        $FlightBooking_id = FlightBooking::insert($FlightBooking_data);
        return redirect('flight_bookings')->with('message', 'FlightBooking successfully added');
    }

    public function delete($id)
    {
        $FlightBooking = FlightBooking::find($id);
        $FlightBooking->delete();
        return redirect('flight_bookings')->with('message', 'FlightBooking deleted successfully.');
    }

    public function edit($id)
    {
        $data['flight_bookings'] = FlightBooking::find($id);
        return view('flight_bookings/edit', $data);
    }

    public function editPost()
    {
        $id = Input::get('flight_bookings_id');

        $data = array(
          'flight_id' => Input::get('flight_id'),
          'passenger_name' => Input::get('passenger_name'),
          'passport_number' => Input::get('passport_number'),
          'ticket_class_id' => Input::get('ticket_class_id'),
          'booking_date' => Input::get('booking_date'),
        );
        FlightBooking::where('id', '=', $id)->update($data);
        return redirect('flight_bookings')->with('message', 'FlightBooking Updated successfully');
    }

    public function changeStatus($id)
    {
        $FlightBooking = FlightBooking::find($id);
        $FlightBooking->status = !$FlightBooking->status;
        $FlightBooking->save();
        return redirect('flight_bookings')->with('message', 'Change FlightBooking status successfully');
    }

    public function view($id)
    {
        $data['FlightBooking'] = FlightBooking::find($id);
        return view('flight_bookings/view', $data);
    }

    // Add other methods here...
}
