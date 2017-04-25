<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Auth;

class CommentController extends Controller
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
        $comments = Auth::user()->comments;
		
        return view('layouts.comments.index') -> with('comments', $comments);
    }
    public function showNewComment($id)
    {	
        $comment = \App\Comment::find($id);

        return view('layouts.comments.edit')->with('task_id',$id);   
    }

    public function showComment($id = null)
    {	
        $comment = \App\Comment::find($id);

        return view('layouts.comments.edit') -> with('comment', $comment);
    }

    public function saveComment(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'content' => 'required',
            'workday' => 'required|date',
            'time' => 'required|numeric'       
            ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        if($request->input('id')){
            \App\Comment::whereId($request->input('id'))
            ->update(['content'=>$request->input('content'), 
            'workday'=>$request->input('workday'), 
            'time'=>$request->input('time')]);   
        } else{
            \App\Comment::create(['content'=>$request->input('content'), 
            'workday'=>$request->input('workday'), 
            'time'=>$request->input('time'),
            'user_id'=>Auth::user()->id,
            'task_id' => $request->input('task_id')]);
        }
        return redirect(route('projects'));
    }
}
