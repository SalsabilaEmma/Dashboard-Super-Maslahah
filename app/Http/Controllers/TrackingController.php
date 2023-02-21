<?php

namespace App\Http\Controllers;

// use App\Models\Lokasi;
use App\Models\Tracking;
use Illuminate\Http\Request;
use Validator;

class TrackingController extends Controller
{
    public function index()
    {
        // $initialMarkers = [
        //     [
        //         'position' => [
        //             'lat' => 28.625485,
        //             'lng' => 79.821091
        //         ],
        //         'draggable' => true
        //     ],
        //     [
        //         'position' => [
        //             'lat' => -7.6369953598456375,
        //             'lng' => 111.54262959498016,
        //         ],
        //         'draggable' => false
        //     ]
        // ]; , compact('initialMarkers')
        return view('tracking.maps');
    }

    public function viewMap()
    {
        $initialMarkers = Tracking::latest()->get();
        return $initialMarkers->toJson();
    }

    public function indexLokasi()
    {
        return view('lokasi.list');
    }

    public function viewData()
    {
        $data = Tracking::latest()->get();
        dd($data->toJson());
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
        $post = Tracking::create([
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
