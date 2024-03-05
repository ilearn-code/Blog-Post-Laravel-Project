<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    //

    public function logout()
    {
        request()->session()->forget('user_id');
        return view('login');
    }
}
