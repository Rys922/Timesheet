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
        $user = \App\User::whereId($id)->where('blocked','=',0)->update(['blocked'=> 1]);
        if(!$user)
        \App\User::whereId($id)->where('blocked','=',1)->update(['blocked'=> 0]);
        
        return redirect() -> back();
    }

    public function forcePassword($id)
    {
        $user = \App\User::whereId($id)->where('forced','=',0)->update(['forced'=> 1]);
        if(!$user)
        \App\User::whereId($id)->where('forced','=',1)->update(['forced'=> 0]);
        
        return redirect() -> back();
    }
}
