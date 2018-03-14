<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Task;

class TaskController extends Controller
{
  // User Todo Tasks
    public function index(){

      if(!Auth::user()){
        return back();
      }else{
        $todos = Task::where('user_id', Auth::id())->get();
        $complete = Task::where('user_id', Auth::id())->where('completed', 1)->get();
        $user = Auth::user();

        return view('task/index', compact('todos', 'complete', 'user'));
      }
    }
  // Create Tasks
    public function store(request $request){
      $task = new Task;

      $task::create([
        "title"=>$request->title,
        "notes"=>$request->notes,
        "user_id"=> Auth::id()
      ]);

      return redirect('/tasks');
    }

  // Update task status
    public function update($id){
      $taskStatus =Task::where('id',$id)->first();

      if($taskStatus->completed==1){
        $taskStatus =Task::where('id',$id)->where('completed', 1)
        ->update([
          'completed'=>0
        ]);
        return back();
      }else {
        $taskStatus =Task::where('id',$id)->where('completed', 0)
        ->update([
          'completed'=>1
        ]);
        return back();
      }
    }
  // Remove task
    public function delete($id){
      $task = Task::where('id',$id)->first();
      $task->delete();

      return redirect('/tasks');
    }
}
