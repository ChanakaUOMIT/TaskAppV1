<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    //
    public function store(Request $request){

        //Show all data as Array
        //dd($request-> all());

        $task=new Task;

        //validation
        $this->validate($request,[
            'task' =>'required|max:100|min:5',
        ]);
        
        $task->task=$request->task;
        $task->save();

        //Store the full dala 
        $data=Task::all();
        //display All the data
        //dd($data);

        //return stored data
        return view('tasks')->with('tasks', $data);

        //return redirect() -> back();
        //return view('/login');
        //return redirect() -> view('/');
    }

    public function  UpdateTaskAsCompleted($id){
        $task=Task::find($id);
        $task->iscompleted=1;
        $task->save();
        return redirect() -> back();

    }

    public function UpdateTaskAsNotCompleted($id){
        $task=Task::find($id);
        $task->iscompleted=0;
        $task->save();
        return redirect() -> back();
    }

    public function deletetask($id){
        $task=Task::find($id);
        $task->delete();
        return redirect() -> back();
    }
}
