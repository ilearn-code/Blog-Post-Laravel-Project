<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('login');

    }

    public function processLogin(Request $request)
    {



        $validatedData = $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required'
            ]
        );

        $user = new User();
        $user = $user->withTrashed()->where('email', $validatedData['email'])->first();


        if (!$user) {

            return redirect()->route('show-login')->withError('User Not Found');
        }

        if ($validatedData['password'] !== $user['password']) {
            return redirect()->route('show-login')->withError('Invalid password');
        }

        if ($user['status'] == '0') {
            return redirect()->route('show-login')->withError('User is disable/blocked');
        }
        if ($user['status'] == '2') {
            return redirect()->route('show-login')->withError('User is waiting to be approved by admin');

        }
        session()->put('first_name', $user->first_name);
        session()->put('user_id', $user->id);
        session()->put('role', $user->role_code);
        return redirect()->route('show-dashboard-posts');



    }
}
