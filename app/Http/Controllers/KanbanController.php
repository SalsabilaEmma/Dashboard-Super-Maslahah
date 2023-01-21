<?php

namespace App\Http\Controllers;

use App\Models\Kanban;
use Illuminate\Http\Request;
// use Validator;
use Illuminate\Support\Facades\Validator;

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
    public function storeAsli(Request $request)
    {
        $task = $this->validate($request, [
            'status' => 'required',
            'judul' => 'required|max:255',
            'issues' => 'required',
            'due_date' => 'required',
            'priority' => 'required'
        ]);
        Kanban::create($task);
        return redirect()->back()->with(['sucess' => 'Data Berhasil Disimpan!']);
    }

    //ajax

    public function indexKanban()
    {
        $task = Kanban::all();
        return $task->toJson();
    }


    public function Store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'status' => 'required',
            'judul' => 'required|max:255',
            'issues' => 'required',
            'due_date' => 'required',
            'priority' => 'required'
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create post
        $post = Kanban::create([
            'status'     => $request->status,
            'judul'   => $request->judul,
            'issues'   => $request->issues,
            'due_date'   => $request->due_date,
            'priority'   => $request->priority,
        ]);

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Ditambahkan!',
            'data'    => $post
        ]);
    }
    public function show(Kanban $post)
    {
        //return response
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Post',
            'data'    => $post
        ]);
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $post = Kanban::findOrfail($request->id);
        // dd($post);
        //define validation rules
        $validator = Validator::make($request->all(), [
            'status' => 'required',
            'judul' => 'required|max:255',
            'issues' => 'required',
            'due_date' => 'required',
            'priority' => 'required'
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $post->status = $request->status;
        $post->judul = $request->judul;
        $post->issues = $request->issues;
        $post->due_date = $request->due_date;
        $post->priority = $request->priority;
        $post->save();
        // dd($post);

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Diubah!',
            'data'    => $post
        ]);
    }
    public function cancel(Request $request)
    {
        $post = Kanban::findOrfail($request->id);
        $cancel = '3';
        $post->status = $cancel;
        $post->save();

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Dibatalkan!',
            'data'    => $post
        ]);
    }
}
