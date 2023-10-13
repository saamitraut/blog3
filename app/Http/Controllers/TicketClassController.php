<?php 

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\TicketClass as TicketClass;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Hash;

class TicketClassController extends Controller {

    public function index(Request $request)
    {
        $data['ticket_classs'] = TicketClass::all();
        $data['ticket_classs'] = TicketClass::paginate($request->get('pagination_limit', 5));
        $data['columnNames'] = ['name','description'];
        return view('ticket_classs/index', $data);
    }

    public function add()
    {
        return view('ticket_classs/add');
    }

    public function addPost()
    {
        $TicketClass_data = array(
             'name' => Input::get('name'),
             'description' => Input::get('description'),
        );
        $TicketClass_id = TicketClass::insert($TicketClass_data);
        return redirect('ticket_classs')->with('message', 'TicketClass successfully added');
    }

    public function delete($id)
    {
        $TicketClass = TicketClass::find($id);
        $TicketClass->delete();
        return redirect('ticket_classs')->with('message', 'TicketClass deleted successfully.');
    }

    public function edit($id)
    {
        $data['ticket_classs'] = TicketClass::find($id);
        return view('ticket_classs/edit', $data);
    }

    public function editPost()
    {
        $id = Input::get('ticket_classs_id');

        $data = array(
          'name' => Input::get('name'),
          'description' => Input::get('description'),
        );
        TicketClass::where('id', '=', $id)->update($data);
        return redirect('ticket_classs')->with('message', 'TicketClass Updated successfully');
    }

    public function changeStatus($id)
    {
        $TicketClass = TicketClass::find($id);
        $TicketClass->status = !$TicketClass->status;
        $TicketClass->save();
        return redirect('ticket_classs')->with('message', 'Change TicketClass status successfully');
    }

    public function view($id)
    {
        $data['TicketClass'] = TicketClass::find($id);
        return view('ticket_classs/view', $data);
    }

    // Add other methods here...
}
