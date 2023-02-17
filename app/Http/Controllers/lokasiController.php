<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class lokasiController extends Controller
{
    public function index()
    {
        return view('lokasi.list');
    }

    public function viewData()
    {
        $data = Lokasi::latest()->get();
        return $data->toJson();
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'long' => 'required',
            'lat' => 'required',
            'lokasi' => 'required'
        ]);
        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        //create post
        $post = Lokasi::create([
            // 'idUser' => auth()->id(),
            'long'     => $request->long,
            'lat'   => $request->lat,
            'lokasi'   => $request->lokasi,
        ]);
        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Ditambahkan!',
            'data'    => $post
        ]);
    }
}
