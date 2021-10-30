<?php

namespace App\Http\Controllers;

use App\Models\doneList;
use App\Models\TodoList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    private $rulse = [
        'name' => 'required|string|max:255',
        'estimatedTime' => 'required|numeric|max:99',
        'desc' => 'required|string|min:20',
    ];
    public function addTaskForm(){
        return view('todo/add');
    }

    public function addTask(Request $request){
        $request->validate($this->rulse);
        TodoList::create([
            'name' => $request->name,
            'desc' => $request->desc,
            'estimatedTime' => $request->estimatedTime,
            'user_id' => Auth::user()->id
        ]);

        return redirect(url('/'));
    }

    public function editPage($id){
        $data = TodoList::findOrFail($id);
        return view('todo/edit',[
            'data' => $data
        ]);
    }

    public function edit(Request $request, $id){
        $request->validate($this->rulse);
        $task = TodoList::findOrFail($id);
        $task->update([
            'name' => $request->name,
            'desc' => $request->desc,
            'estimatedTime' => $request->estimatedTime,
        ]);

        return redirect('/');
    }

    public function delete($id){
        $task = TodoList::findOrFail($id);
        $task->delete();
        return redirect('/');
    }

    public function moveToDoneList(Request $request, $id){
        $doneTask = TodoList::findOrFail($id);

        doneList::create([
            'name'=> $doneTask->name,
            'desc'=> $doneTask->desc,
            'user_id'=> $doneTask->user_id,
        ]);

        $doneTask->delete();
        return redirect(url('/'));
    }
}
