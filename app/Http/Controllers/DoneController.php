<?php

namespace App\Http\Controllers;

use App\Models\doneList;
use Illuminate\Http\Request;

class DoneController extends Controller
{
    public function display(){
        $list = doneList::all();
        return view('done/index',[
            'list' => $list
        ]);
    }

    public function clearTask($id){
        $task = doneList::findOrFail($id);
        $task->delete();
        return redirect(url('done-list'));
    }

    public function clearAll(){
        $all = doneList::all();
        foreach($all as $item){
            $item->delete();
        }

        return redirect(url('/'));
    }
}
