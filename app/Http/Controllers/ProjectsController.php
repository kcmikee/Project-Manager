<?php

namespace App\Http\Controllers;

use App\project;
use App\company;
use App\ProjectUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      //
      if (Auth::check()) {
        // code...
        $projects = Project::where('user_id',Auth::user()->id)->get();
        return view('projects.index', ['projects'=>$projects]);
      }else {
        return view('Auth.login');
      }

  }


  public function adduser(Request $request)
  {
    //add users to project
    $project = Project::find($request->input('project_id'));
    if(Auth::user()->id == $project->user_id){

      $user = User::where('email', $request->input('email'))->first();
      $projectuser = ProjectUser::where('user_id',$user->id)
                                ->where('project_id',$project->id)
                                  ->first();
      if ($projectuser) {
        return redirect()->route('projects.show' , ['project'=>$project->id])
        ->with('success' ,  $request->input('email').' is already a member of this project');
      }

      if($user && $project){
        $project->users()->attach($user->id);

        return redirect()->route('projects.show' , ['project'=>$project->id])
        ->with('success' ,  $request->input('email').' was added to project successfullly!');
      }
    }
    return redirect()->route('projects.show' , ['project'=>$project->id])
    ->with('error' , 'User failed to add to project');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create( $company_id = null )
  {
      //
      $companies = null;
      if(!$company_id){
        $companies = Company::where('user_id', Auth::user()->id)->get();
      }

      return view('projects.create', ['company_id'=>$company_id], ['companies'=>$companies]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      //
      if(Auth::check()){
        $project = Project::create([
          'name'=> $request->input('name'),
          'description'=>$request->input('description'),
          'company_id' =>$request->input('company_id'),
          'user_id' => Auth::user()->id
        ]);

        if($project){
          return redirect()->route('projects.show' , ['project'=>$project->id])
          ->with('success' , 'Project updated successfullly!');
        }
      }
            return back()->withInput()->with('errors' , 'something went wrong, Try Again');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Project $project)
  {
      //
    //  $project = Project::where('$id', $project)->first;
      $project = Project::find($project->id);
      return view('projects.show', ['project'=>$project]);
  }

  /**
   * Show the form for editing the specified resource.
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Project $project)
  {
      //
      $project = Project::find($project->id);
      return view('projects.edit', ['project'=>$project]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request,Project $project)
  {
      //sava data
      $projectUpdate= Project::where('id', $project->id)
              ->update([
                'name'=> $request->input('name'),
                'description'=>$request->input('description')
              ]);

      if($projectUpdate){
        return redirect()->route('projects.show', ['project'=>$project->id])
        ->with('success' , 'Project updated successfullly!');
      }
      //redirect
      return back()->withInput();
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Project $project)
  {
      //
      $findproject= Project::find($project->id);
        if($findproject->delete()){
          //redirect
          return redirect()->route('projects.index')
          ->with('success' , 'Project deleted successfullly');
        }
        return back()->withInput->with('error' , 'This project could not be deleted');
  }
}
