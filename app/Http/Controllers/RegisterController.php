<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    //

    public function showRegisterationForm()
    {
        return view('register');
    }

    public function processRegisterationForm(Request $request)
    {



        $ValidatedData = $request->validate(

            [
                'first_name' => 'required|string|max:100|regex:/^[a-zA-Z]+$/',
                'last_name' => 'required|string|max:100|regex:/^[a-zA-Z]+$/',
                'email' => 'required|email|max:100|unique:users_cms,email',
                'password' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@!?$%&*])[a-zA-Z\d@!?$%&*]+$/',
                'confirm_password' => 'required|same:password'

            ]
        );

        $user = new User();


        $user->first_name = $ValidatedData['first_name'];
        $user->last_name = $ValidatedData['last_name'];
        $user->email = $ValidatedData['email'];
        $user->password = $ValidatedData['password'];
        $user->role_code = 'cw';
        if ($user->save()) {
            return redirect()->route('show-register')->with('message', 'registeration successfull!');

        }
    }
   

}

