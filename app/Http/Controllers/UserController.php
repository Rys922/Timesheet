<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = \App\User::orderBy('role','desc')->get();

        return view('layouts.users.index')->with('users',$users);
    }

    public function blockUser($id)
    {
        $user = \App\User::whereId($id)->update(['blocked'=> 1]);

        return redirect() -> back();
    }
}
