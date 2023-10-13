<?php 

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User as User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Hash;

class UserController extends Controller {

    public function index(Request $request)
    {
        $data['users'] = User::all();
        $data['users'] = User::paginate($request->get('pagination_limit', 5));
        $data['columnNames'] = ['name','email','password','remember_token'];
        return view('users/index', $data);
    }

    public function add()
    {
        return view('users/add');
    }

    public function addPost()
    {
        $User_data = array(
             'name' => Input::get('name'),
             'email' => Input::get('email'),
             'password' => Input::get('password'),
             'remember_token' => Input::get('remember_token'),
        );
        $User_id = User::insert($User_data);
        return redirect('users')->with('message', 'User successfully added');
    }

    public function delete($id)
    {
        $User = User::find($id);
        $User->delete();
        return redirect('users')->with('message', 'User deleted successfully.');
    }

    public function edit($id)
    {
        $data['users'] = User::find($id);
        return view('users/edit', $data);
    }

    public function editPost()
    {
        $id = Input::get('users_id');

        $data = array(
          'name' => Input::get('name'),
          'email' => Input::get('email'),
          'password' => Input::get('password'),
          'remember_token' => Input::get('remember_token'),
        );
        User::where('id', '=', $id)->update($data);
        return redirect('users')->with('message', 'User Updated successfully');
    }

    public function changeStatus($id)
    {
        $User = User::find($id);
        $User->status = !$User->status;
        $User->save();
        return redirect('users')->with('message', 'Change User status successfully');
    }

    public function view($id)
    {
        $data['User'] = User::find($id);
        return view('users/view', $data);
    }

    // Add other methods here...
}
