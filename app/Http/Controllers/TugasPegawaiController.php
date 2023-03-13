<?php

namespace App\Http\Controllers;

use App\Models\Kanban;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Validator;

class TugasPegawaiController extends Controller
{
    public function index()
    {
        $data = Kanban::latest()->get();
        // dd($data);
        return view('tugas_pegawai.list', compact('data'));
    }
    public function add()
    {
        $dataPegawai = Pegawai::latest()->get();
        return view('tugas_pegawai.add', compact('dataPegawai'));
    }
    public function Store(Request $request)
    {
        dd($request->all());
        //define validation rules
        $validator = Validator::make($request->all(), [
            'userRequest' => 'required',
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
            'nip'         => auth()->user()->nip,
            'userRequest' => $request->userRequest,
            'status'      => $request->status,
            'judul'       => $request->judul,
            'issues'      => $request->issues,
            'due_date'    => $request->due_date,
            'priority'    => $request->priority,
            'sprintpoint' => $request->sprintpoint,
        ]);
        // dd($post);
        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Ditambahkan!',
            'data'    => $post
        ]);
    }
}
