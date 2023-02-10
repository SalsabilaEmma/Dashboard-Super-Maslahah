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

    /** ajax */
    public function indexKanban()
    {
        $user = auth()->id();
        $task = Kanban::where('idUser', $user)->latest()->get();
        return $task->toJson();
    }


    public function Store(Request $request)
    {
        // dd(auth()->id());
        //define validation rules
        $validator = Validator::make($request->all(), [
            'status' => 'required',
            'judul' => 'required|max:255',
            'issues' => 'required',
            'due_date' => 'required',
            'priority' => 'required',
            'sprintpoint' => 'required'
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create post
        $post = Kanban::create([
            'idUser' => auth()->id(),
            'status'     => $request->status,
            'judul'   => $request->judul,
            'issues'   => $request->issues,
            'due_date'   => $request->due_date,
            'priority'   => $request->priority,
            'sprintpoint'   => $request->sprintpoint,
        ]);
        // dd($post);
        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Ditambahkan!',
            'data'    => $post
        ]);
    }
    // public function show(Kanban $post)
    // {
    //     //return response
    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Detail Data Post',
    //         'data'    => $post
    //     ]);
    // }

    public function update(Request $request)
    {
        $post = Kanban::findOrfail($request->id);
        // dd($post);
        //define validation rules
        $validator = Validator::make($request->all(), [
            'status' => 'required',
            'judul' => 'required|max:255',
            'issues' => 'required',
            'due_date' => 'required',
            'priority' => 'required',
            'sprintpoint' => 'required'
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // $post->idUser = auth()->id();
        $post->status = $request->status;
        $post->judul = $request->judul;
        $post->issues = $request->issues;
        $post->due_date = $request->due_date;
        $post->priority = $request->priority;
        $post->sprintpoint = $request->sprintpoint;
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
        $cancel = 'Cancel';
        $post->status = $cancel;
        $post->save();

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Dibatalkan!',
            'data'    => $post
        ]);
    }
    public function dragstatus(Request $request)
    {
        $dragstatus = Kanban::findOrfail($request->idIssues);
        $boardAsal = $request->idBoardAsal;
        $boardTujuan = $request->idBoardTujuan;
        if ($boardTujuan == "_todo") {
            $dragstatus->status = "To Do";
        } elseif ($boardTujuan == "_doing") {
            $dragstatus->status = "In Progress";
        } else {
            $dragstatus->status = "Done";
        }
        $dragstatus->save();
        // dd('bismillah');

        //return response
        return response()->json([
            'success' => true,
            // 'message' => 'Data Berhasil Dibatalkan!',
            'data'    => $dragstatus
        ]);
    }
}
