<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
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
        return view('layouts.app');
    }
    public function logout()
    {
        Auth::logout();
        return redirect(route('login'));
    }
    
    public function changePasswordView()
    {
        return view('auth.passwords.change');
    }

    public function changePassword()
    {
        return redirect() -> back();
    }
}
