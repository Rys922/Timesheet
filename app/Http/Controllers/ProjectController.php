<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

class ProjectController extends Controller
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
        if(Auth::user()->role=='admin'){
		$projects = \App\Project::all();
        }else{
        $projects = Auth::user()->manageProjects;    
        }
        return view('layouts.projects.index') -> with('projects', $projects);
    }

    public function showProject($id = null)
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
