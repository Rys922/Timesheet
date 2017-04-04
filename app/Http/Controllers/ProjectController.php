<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
		$projects = \App\Project::all();
		
        return view('layouts.projects.index') -> with('projects', $projects);
    }

    public function showProject($id = null)
    {	
        $project = \App\Project::find($id);
        
		if(!$project)
            return view('layouts.projects.edit');   

        return view('layouts.projects.edit') -> with('project', $project);
    }
}
