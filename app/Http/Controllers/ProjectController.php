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
    public function index(Request $request)
    {	
        if(Auth::user()->role=='admin'){
            if(!$request->has('query'))
		        $projects = \App\Project::all();
            else{
                $projects = \App\Project::where(function($query) use ($request){
            $query->where('name','like','%'.$request->input('query').'%');
       })->get();     
            }
        }elseif(Auth::user()->role=='manager'){ 
            if(!$request->has('query'))
		        $projects = Auth::user()->manageProjects;   
            else{
                $projects = \App\Project::where(function($query) use ($request){
            $query->where('name','like','%'.$request->input('query').'%');
       })->where('manager_id','=',Auth::user()->id)->get();} 
        }else{
            return redirect('/');
        }
        return view('layouts.projects.index') -> with('projects', $projects);
    }

    public function showProject($id = null)
    {	
        $project = \App\Project::find($id);
        
		
            if(Auth::user()->role == "admin")
                if(!$project)
                    return view('layouts.projects.edit');   
                else
                    return view('layouts.projects.edit') -> with('project', $project);

       return redirect('/');        
    }

    public function showRaport($id = null)
    {	
        $project = \App\Project::find($id);
        
		
            if(Auth::user()->role != "user" && $project)
                    return view('layouts.projects.raport') -> with('project', $project);

       return redirect('/');        
    }

    public function saveProject(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'description' => 'required|min:3|max:1024',
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
    public function hintUser(Request $request, $id){
       $arr = \App\ProjectUser::where('project_id','=',$id)->pluck('user_id')->toArray();
       return \App\User::where(function($query) use ($request){
            $query->where('name','like','%'.$request->input('query').'%')->
            orWhere('surname','like','%'.$request->input('query').'%')->
            orWhere('email','like','%'.$request->input('query').'%');
       })->where('role','=','user')->whereNotIn('id',$arr)->get()->toArray();
    }
    public function addUser($id, $pId){
        if(\App\ProjectUser::where('user_id','=',$id)->where('project_id','=',$pId)->get()->isEmpty())
            \App\ProjectUser::create(['user_id'=>$id,'project_id'=>$pId]);
       return redirect()->back();
    }
    public function deleteUser($id){
        \App\ProjectUser::find($id)->delete();
       return redirect()->back();
    }
}
