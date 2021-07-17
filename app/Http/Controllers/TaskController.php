<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct()
    {
        //just loged in user can do these functions
        $this->middleware(['auth']);
    }
    
    


     //add a new checkList
     public function store($checkListId,Request $request,Task $task)
     {

         $this->validate($request, [
             'taskTitle' => 'required',
         ]);
 
         
         $task->title =  $request->get('taskTitle');
         $task->check_list_id =  $checkListId;
 
         //store in db
         $task->save();
 
 
         return redirect('/');
     }

     public function done($tasktId){
        
        $task = Task::find($tasktId); 

        if(auth()->user()->id != $task->checkList->user_id)
        return  response(403);

        if($task->status == 'todo')
        $task->status = 'Done';
        else 
        $task->status = 'todo';
        $task->save();
        return back();
     }

     public function editView($taskId){
    
        $task = Task::find($taskId);  
        return view('editTask',[
            'task'=> $task
        ]);
     }
     public  function edit(Request $request,$taskId)
     {
      $task = Task::find($taskId);
      
      if(auth()->user()->id != $task->checkList->user_id)
      return  response(403);

      $task->title =$request->taskTitle; 
      $task->save();
      return redirect('/');
     }

     public function destroy($taskId){
    //authorize delete method (or we can use policies)
   if(Task::find($taskId)->checkList->user_id == auth()->user()->id)
   Task::destroy($taskId);

     return redirect('/');
}
}
