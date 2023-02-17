<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrackingController extends Controller
{
    public function index()
    {
        $initialMarkers = [
            [
                'position' => [
                    'lat' => 28.625485,
                    'lng' => 79.821091
                ],
                'draggable' => true
            ],
            [
                'position' => [
                    'lat' => -7.6369953598456375,
                    'lng' => 111.54262959498016,
                ],
                'draggable' => false
            ]
        ];
        return view('tracking.maps', compact('initialMarkers'));
    }
}
