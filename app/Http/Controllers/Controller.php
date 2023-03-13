<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Carbon\Carbon;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $time = Carbon::now();
        $totalPegawai = Pegawai::all()->count();
        $today = Carbon::today();
        $totalAbsensi = Absen::whereDate('tanggal', $today)->count();

        $data = User::with('pegawai')->get();
        // return $data;
        return view('index', compact('time', 'totalPegawai', 'today', 'totalAbsensi'));
    }
    // public function indexSuper()
    // {
    //     return view('index');
    // }
}
