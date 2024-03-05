<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Posts;

class AdminUsersController extends Controller
{

    public function deleteUser($id)
    {


        $user = User::find($id);
        if (!is_null($user)) {
            $user->status = '0';


            if ($user->save())


                $user->delete();



        }
        return redirect()->back();
    }

    public function editUser($id)
    {
        $user = User::find($id);

        if (is_null($user)) {
            return redirect('show-dashboard-users');
        } else {
            $title = "Edit User";
            $url = url('/user/update') . "/" . $id;
            return view('form-user', ['url' => $url, 'title' => $title, 'user_data' => $user]);
        }

    }

    public function updateUser($id, Request $request)
    {
     
            $ValidatedData = $request->validate([

                'first_name' => 'required|string|max:100|regex:/^[a-zA-Z]+$/',
                'last_name' => 'required|string|max:100|regex:/^[a-zA-Z]+$/',
                'email' => ['required', 'email', 'max:100', Rule::unique('users_cms', 'email')->ignore($id)],
               'password' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@!?$%&*])[a-zA-Z\d@!\?\$%\&\*]+$/',
                'confirm_password' => 'required|same:password',
                'status' => 'required|in:0,1,2',
                'role' => 'required|in:cw,admin'


            ]);


            $user = User::find($id);
            if (!$user) {
                return redirect('show-dashboard-users')->withError('error', 'User not found.');
            }
            $user->first_name = $ValidatedData['first_name'];
            $user->last_name = $ValidatedData['last_name'];
            $user->email = $ValidatedData['email'];
            $user->password = $ValidatedData['password'];
            $user->role_code = $ValidatedData['role'];
            $user->status = $ValidatedData['status'];

            if ($user->save()) {
                return redirect()->route('show-dashboard-users');
            }
      
            
    

    }


    public function addUser()
    {

        $title = "Add User";
        $url = url('/user/add');
        return view('form-user', ['url' => $url, 'title' => $title]);
    }

    public function processAddUser(Request $request)
    {
        $ValidatedData = $request->validate([

            'first_name' => 'required|string|max:100|regex:/^[a-zA-Z]+$/',
            'last_name' => 'required|string|max:100|regex:/^[a-zA-Z]+$/',
            'email' => 'required|email|max:100|unique:users_cms,email',
            'password' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@!?$%&*])[a-zA-Z\d@!\?\$%\&\*]+$/',
            'confirm_password' => 'required|same:password',
            'status' => 'required|in:0,1,2',
            'role' => 'required|in:cw,admin'

        ]);


        $user = new User();
        $user->first_name = $ValidatedData['first_name'];
        $user->last_name = $ValidatedData['last_name'];
        $user->email = $ValidatedData['email'];
        $user->password = $ValidatedData['password'];
        $user->role_code = $ValidatedData['role'];
        $user->status = $ValidatedData['status'];
        $user->save();

        return redirect()->back()->with('message', 'user added succesfully');
    }

}
