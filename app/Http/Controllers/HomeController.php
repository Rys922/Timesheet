<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use Hash;

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

    public function changePassword(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'password' => 'confirmed|required|min:3',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        
        \App\User::whereId(Auth::user()->id)->update(['forced'=> 0,'password'=>Hash::make($request->input('password'))]);
        return redirect('/');
    }
}
