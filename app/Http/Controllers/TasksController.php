<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\project;
use App\TaskUser;
use App\User;
use App\Task;
use App\company;


class TasksController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      //
      if (Auth::user()->role_id < 3) {
        $tasks = Task::all();
        return view('tasks.index')
            ->with('tasks', $tasks);
      }
      elseif (Auth::check()) {
        // code...
        $tasks = Task::where('user_id',Auth::user()->id)->get();
        return view('tasks.index', ['tasks'=>$tasks]);
      }else {
        return view('Auth.login');
      }

  }


  public function adduser(Request $request)
  {
    //add users to task
    $task = Task::find($request->input('task_id'));
    if(Auth::user()->id == $task->user_id){

      $user = User::where('email', $request->input('email'))->first();

      if( $user === null){
        return redirect()->route('tasks.show' , ['task'=>$task->id])
        ->with('errors' ,  $request->input('email').' doesn\'t exist');
      }

      $taskuser = TaskUser::where('user_id',$user->id)
                          ->where('task_id',$task->id)
                          ->first();
      if ($taskuser) {
        return redirect()->route('tasks.show' , ['task'=>$task->id])
                         ->with('success' ,  $request->input('email').' is already a member of this task');
      }

      if($user && $task){
        $task->users()->attach($user->id);

        return redirect()->route('tasks.show' , ['task'=>$task->id])
                         ->with('success' ,  $request->input('email').' was added to task successfullly!');
      }
    }
    return redirect()->route('tasks.show' , ['task'=>$task->id])
    ->with('error' , 'User failed to add to task');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create( $project_id = null )
  {
      //dynamic dropdown for projects options
      $projects = null;
      if(!$project_id){
        $projects = Project::where('user_id', Auth::user()->id)->get();
      }

      return view('tasks.create', ['project_id'=>$project_id], ['projects'=>$projects]);
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
        $task = Task::create([
          'name'=> $request->input('name'),
          'days'=>$request->input('days'),
          'project_id' =>$request->input('project_id'),
          'user_id' => Auth::user()->id
        ]);

        if($task){
          return redirect()->route('tasks.show' , ['task'=>$task->id])
          ->with('success' , 'Task updated successfullly!');
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
  public function show(Task $task)
  {
      //
    //  $task = Task::where('$id', $task)->first;
      $task = Task::find($task->id);
      return view('tasks.show', ['task'=>$task]);
  }

  /**
   * Show the form for editing the specified resource.
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Task $task)
  {
      //
      $task = Task::find($task->id);
      return view('tasks.edit', ['task'=>$task]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request,Task $task)
  {
      //sava data
      $taskUpdate= Task::where('id', $task->id)
              ->update([
                'name'=> $request->input('name'),
                'description'=>$request->input('description')
              ]);

      if($taskUpdate){
        return redirect()->route('tasks.show', ['task'=>$task->id])
        ->with('success' , 'Task updated successfullly!');
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
  public function destroy(Task $task)
  {
      //
      $findtask= Task::find($task->id);
        if($findtask->delete()){
          //redirect
          return redirect()->route('tasks.index')
          ->with('success' , 'Task deleted successfullly');
        }
        return back()->withInput->with('error' , 'This task could not be deleted');
  }
}
