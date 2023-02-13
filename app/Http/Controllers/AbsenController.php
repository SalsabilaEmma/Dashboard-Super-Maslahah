<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Pegawai;
use Carbon\Carbon;
use Dotenv\Parser\Value;
use Illuminate\Http\Request;
use Validator;

class AbsenController extends Controller
{
    public function index()
    {
        // $data = Absen::latest()->get();
        $data = Absen::with('pegawai')->get();
        $dataPegawai = Pegawai::latest()->get();
        // dd($data);
        return view('absen.list', compact('data', 'dataPegawai'));
    }

    public function getDataPegawai(Request $request)
    {
        // dd($request->all());
        $idPegawai = $request->input('id');
        $pegawai = Pegawai::where('id', $idPegawai)->first();
        // dd($pegawai);
        return response()->json($pegawai);
    }
    public function add()
    {
        $data = Absen::latest()->get();
        // $today = Carbon::now()->isoFormat('YYYY-MM-DD');
        $today = Carbon::now();
        // dd($today);
        $timezone = Carbon::now();
        $timezone->timezone = 'Asia/Jakarta';
        $time = $timezone->toTimeString();
        // dd($timezone);
        $dataPegawai = Pegawai::latest()->get();
        return view('absen.add', compact('data', 'dataPegawai', 'timezone', 'time'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|numeric',
            'status' => 'required',
            'jamMasuk' => 'nullable',
            // 'jamPulang' => 'required|nullable'
        ]);
        // dd($request->all());
        //check if validation fails
        // if ($validator->fails()) {
        //     return response()->json($validator->errors(), 422);
        // }
        $dataAbsen = new Absen;
        // 'idUser' => auth()->id(),
        $dataAbsen->idPegawai = $request->idPegawai;
        $dataAbsen->tanggal = $request->tanggal;
        $dataAbsen->status = $request->status;
        if ($dataAbsen->status == "Hadir") {
            $dataAbsen->jamMasuk = $request->jamMasuk;
        } else {
            $dataAbsen->jamMasuk = null;
        }
        $dataAbsen->jamPulang = $request->jamPulang;
        // dd($dataAbsen);
        $dataAbsen->save();
        return redirect()->route('absensi')->with('success', 'Data Berhasil Ditambahkan!');
    }
    public function edit($id)
    {
        $dataAbsen = Absen::findOrFail($id);
        $dataPegawai = Pegawai::all();
        $today = Carbon::now();
        return view('absen.edit', compact('dataAbsen', 'dataPegawai', 'today'));
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $dataAbsen = Absen::findOrFail($id);
        $request->validate([
            'tanggal' => 'required',
            'status' => 'required',
            'jamMasuk' => 'required|nullable',
            'jamPulang' => 'required|nullable'
        ]);
        $dataAbsen->idPegawai = $request->idPegawai;
        $dataAbsen->tanggal = $request->tanggal;
        $dataAbsen->status = $request->status;
        $dataAbsen->jamMasuk = $request->jamMasuk;
        $dataAbsen->jamPulang = $request->jamPulang;
        // dd($dataAbsen);
        $dataAbsen->save();
        return redirect()->route('absensi')->with('success', ' Data Berhasil Diubah!');
    }
    public function destroy($id)
    {
        $dataAbsen = Absen::find($id);
        $dataAbsen->delete();
        return redirect()->back()->with(['error' => 'Data Berhasil Dihapus!']);
    }
}
