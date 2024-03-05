<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\User;

class DashboardController extends Controller
{

    public function showDashboardPosts()
    {

        if (session()->get('role') == 'admin') {
            $posts = Posts::orderBy('created_at' , 'desc')->with('author')->get();
        } else {
            $userID = session()->get('user_id');
            $posts = Posts::orderBy('created_at','desc')->with('author')->get()->where('user_id', $userID);
        }
        $data = compact('posts');
        return view('dashboard', $data);

    }

    public function showDashboardUsers()
    {

        $users = User::orderBy('created_at','desc')->get();
        $data = compact('users');
        return view('dashboard', $data);

    }

}
