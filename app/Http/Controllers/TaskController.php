<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Auth;

class TaskController extends Controller
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

    public function index(Request $request)
    {	
        if(Auth::user()->role == 'admin'){
            if(!$request->has('query'))
		        $tasks = \App\Task::all();
            else{
                $tasks = \App\Task::where(function($query) use ($request){
            $query->where('name','like','%'.$request->input('query').'%');
       })->get();     
            }
        }elseif(Auth::user()->role=='manager'){ 
            if(!$request->has('query'))
		        $tasks = Auth::user()->manageProjects;   
            else{
                $tasks = \App\Task::where(function($query) use ($request){
            $query->where('name','like','%'.$request->input('query').'%');
       })->get(); 
            }
        }
        return view('layouts.tasks.index') -> with('tasks', $tasks);



    }

    public function showTask($id = null)
    {	
        $project = \App\Project::find($id);
        
		if(!$project)
            return view('layouts.projects.edit');   

        return view('layouts.projects.edit') -> with('project', $project);
    }
    
    

    public function saveProject(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'description' => 'required|min:3',
            'manager' => 'required|integer'       
            ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        if($request->input('id')){
            \App\Project::whereId($request->input('id'))->update(['name'=>$request->input('name'), 'description'=>$request->input('description'), 'manager_id'=>$request->input('manager')]);   
        } else{
        \App\Project::create(['name'=>$request->input('name'), 'description'=>$request->input('description'), 'manager_id'=>$request->input('manager')]);
        }
        return redirect(route('projects'));
    }

    public function deleteProject($ID){
        \App\Project::whereId($ID)->delete();
         return redirect(route('projects'));
    }
}
