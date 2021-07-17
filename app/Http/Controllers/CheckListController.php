<?php

namespace App\Http\Controllers;

use App\Models\CheckList;
use App\Models\Task;
use Illuminate\Http\Request;

class CheckListController extends Controller
{
    public function __construct()
    {
        //just loged in user can do these functions
        $this->middleware(['auth']);
    }


    public function index()
    {

        return view('addCheckList');
    }

    public function home(Request $request)
    {
        //get check list of user
        $checkLists = CheckList::get()->where('user_id', auth()->user()->id);
        //get count of done check lists
        $checkListDoneCount = $checkLists->where('status','Done')->count();
        //if user choice filter the data
        if ($request->input('sort') && $request->input('sort') != 'Oldest') 
           $this->sortMyTasks($request->input('sort'), $checkLists);

        return view('home', [
            'checkLists' => $checkLists,
            'checkListDoneCount' => $checkListDoneCount
        ]);
    }

    public function sortMyTasks($type, $checkLists)
    {
        
       
            foreach ($checkLists as $checkList) {
                if ($type == 'Latest')
                $checkList->task = $checkList->task->reverse();
                else if($type == 'todo')
                $checkList->task =  $checkList->task->sortBy('status')->reverse();
                else if($type == 'Done')
                $checkList->task =  $checkList->task->sortBy('status');
            }
    }

    //add a new checkList
    public function store(Request $request, CheckList $checkList)
    {
        $this->validate($request, [
            'checkListTitle' => 'required',
        ]);


        $checkList->title =  $request->get('checkListTitle');
        $checkList->user_id =  auth()->user()->id;

        //store in db
        $checkList->save();


        return redirect('/');
    }

    //make check list done
    public function done($checkListId)
    {
        //get check list from db
        $checkList = CheckList::find($checkListId);
      
        //authrize (or we can use policies)
        if (auth()->user()->id != $checkList->user_id)
            return  response(403);
            //make every task in this check list done
            foreach($checkList->task as $task){
                $task = Task::find($task->id);
                $task->status = 'Done';
                $task->save();
            }
        $checkList->status = 'Done';
        $checkList->save();
        return back();
    }

    public function editView($checkListId)
    {

        $checkList = CheckList::find($checkListId);
        return view('editCheckList', [
            'checkList' => $checkList
        ]);
    }
    public  function edit(Request $request, $checkListId)
    {
        $checkList = CheckList::find($checkListId);

        if (auth()->user()->id != $checkList->user_id)
        return  response(403);

        $checkList->title = $request->checkListTitle;
        $checkList->save();
        return redirect('/');
    }

    public function destroy($checkListId)
    {
        //authorize delete method (or we can use policies)
        if (CheckList::find($checkListId)->user_id == auth()->user()->id)
            CheckList::destroy($checkListId);

        return redirect('/');
    }
}
