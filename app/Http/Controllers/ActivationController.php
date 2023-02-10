<?php

namespace App\Http\Controllers;

use App\Models\Activation;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Notifications\Action;
use Illuminate\Support\Facades\Validator;

class ActivationController extends Controller
{
    public function index()
    {
        // $data = Activation::all();
        $data = Activation::with('pegawai')->get();
        $dataPegawai = Pegawai::latest()->get();
        return view('aktivasi.list', compact('data','dataPegawai'));
    }
    public function getDataPegawai(Request $request)
    {
        $nama = $request->input('nama');
        $pegawai = Pegawai::where('nama', $nama)->first();
        // dd($pegawai);
        return response()->json($pegawai);
    }
    public function add()
    {
        $dataAktivasi = Activation::get();
        $dataPegawai = Pegawai::latest()->get();
        return view('aktivasi.add', compact('dataAktivasi','dataPegawai'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'cif' => 'required|numeric',
            // 'nip' => 'required|numeric',
            // 'ttl' => 'required',
            // 'telepon' => 'required|numeric',
            // 'noKtp' => 'required|numeric',
            'tipeHp' => 'required',
            'statusAktivasi' => 'required',
            'kodeUnik' => 'required',
            'aksesAbsen' => 'required',
            'aksesMpay' => 'required',
            'aksesKpai' => 'required',
            'aksesKunKer' => 'required',
            'aksesListPekerjaan' => 'required',
        ]);
        //check if validation fails
        if ($validator->fails()) {
            // dd(response()->json($validator->errors()));
            return redirect()->route('aktivasi')->with('error', ' Field Must Be a Number');
        }
        // dd('simpen dah');
        //create data
        $data = Activation::create([
            // 'idUser' => auth()->id(),
            'id' => $request->id,
            'idPegawai' => $request->idPegawai,
            'cif'     => $request->cif,
            // 'nip' => $request->nip,
            // 'ttl' => $request->ttl,
            // 'telepon' => $request->telepon,
            // 'noKtp' => $request->noKtp,
            'tipeHp' => $request->tipeHp,
            'statusAktivasi' => $request->statusAktivasi,
            'kodeUnik' => $request->kodeUnik,
            'aksesAbsen' => $request->aksesAbsen,
            'aksesMpay' => $request->aksesMpay,
            'aksesKpai' => $request->aksesKpai,
            'aksesKunKer' => $request->aksesKunKer,
            'aksesListPekerjaan' => $request->aksesListPekerjaan,
        ]);
        // dd($data);
        return redirect()->route('aktivasi')->with('success', ' Data Berhasil Ditambahkan!');
    }

    public function storeStatus(Request $request, $id)
    {
        $dataStatus = Activation::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'statusAktivasi' => 'required'
        ]);
        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $dataStatus->statusAktivasi = $request->statusAktivasi;
        $dataStatus->save();
        return redirect()->back()->with('success', ' Status Aktivasi Berhasil Diubah!');
    }

    public function edit($id)
    {
        $dataAktivasi = Activation::findOrFail($id);
        // dd($dataAktivasi->pegawai->ttl);
        return view('aktivasi.edit', compact('dataAktivasi'));
    }

    public function update(Request $request, $id)
    {
        $dataAktivasi = Activation::findOrFail($id);
        $request->validate([
            'cif' => 'required|numeric',
            'nip' => 'required|numeric',
            'ttl' => 'required',
            'telepon' => 'required|numeric',
            'noKtp' => 'required|numeric',
            'tipeHp' => 'required',
            'statusAktivasi' => 'required',
            'kodeUnik' => 'required',
            'aksesAbsen' => 'required',
            'aksesMpay' => 'required',
            'aksesKpai' => 'required',
            'aksesKunKer' => 'required',
            'aksesListPekerjaan' => 'required',
        ]);
        $dataAktivasi->cif = $request->cif;
        $dataAktivasi->nip = $request->nip;
        $dataAktivasi->ttl = $request->ttl;
        $dataAktivasi->telepon = $request->telepon;
        $dataAktivasi->noKtp = $request->noKtp;
        $dataAktivasi->tipeHp = $request->tipeHp;
        $dataAktivasi->statusAktivasi = $request->statusAktivasi;
        $dataAktivasi->kodeUnik = $request->kodeUnik;
        $dataAktivasi->aksesAbsen = $request->aksesAbsen;
        $dataAktivasi->aksesMpay = $request->aksesMpay;
        $dataAktivasi->aksesKpai = $request->aksesKpai;
        $dataAktivasi->aksesKunKer = $request->aksesKunKer;
        $dataAktivasi->aksesListPekerjaan = $request->aksesListPekerjaan;
        // dd($dataAktivasi);
        $dataAktivasi->save();
        return redirect()->route('aktivasi')->with('success', ' Data Berhasil Diubah!');
    }

    public function destroy($id)
    {
        $dataAktivasi = Activation::find($id);
        $dataAktivasi->delete();
        return redirect()->back()->with(['error' => 'Data Berhasil Dihapus!']);
    }
}
