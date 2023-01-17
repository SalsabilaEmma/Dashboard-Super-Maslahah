<?php

namespace App\Http\Controllers;

use App\Models\Kanban;
use Illuminate\Http\Request;

class KanbanController extends Controller
{
    /**  User Side -------------------------------------------------------------------------------------------------- */
    public function index()
    {
        // $issues = Kanban::all(); 
        // dd($issues);
        return view('kanban.board', [
            'task' => Kanban::all(),
        ]);
    }

    public function indexKanban()
    {
        $task = Kanban::all();
        return $task->toJson();
    }

    public function store(Request $request) 
    {
        $task = $this->validate($request, [
            'status' =>'required',
            'judul' =>'required|max:255',
            'issues' =>'required',
            'due_date' => 'required',
            'priority' => 'required'
        ]);
        Kanban::create($task);
        // dd($task);
        return redirect()->back()->with(['sucess' => 'Data Berhasil Disimpan!']);
    }

    public function update()
    {
        # code...
    }
}
