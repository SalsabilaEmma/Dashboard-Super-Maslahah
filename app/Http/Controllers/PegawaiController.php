<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Validator;

class PegawaiController extends Controller
{
    public function getDataPegawai(Request $request)
    {
        // dd($request->all());
        $nipPegawai = $request->input('nip');
        $pegawai = Pegawai::where('nip', $nipPegawai)->first();
        // dd($pegawai);
        return response()->json($pegawai);
    }

    public function index()
    {
        // return view('pegawai.list');

        return view('pegawai.list', [
            'data' => Pegawai::latest()->get(),
        ]);
    }

    public function viewData()
    {
        $data = Pegawai::latest()->get();
        return $data->toJson();
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'nip' => 'required|numeric',
            'nama' => 'required',
            'tglLahir' => 'required',
            'noKtp' => 'required|numeric',
            'jenisKelamin' => 'required',
            'statusPerkawinan' => 'required',
            'alamat' => 'required',
            'telepon' => 'required|numeric',
            'tglMasuk' => 'required',
            'rekeningTabungan' => 'required|numeric',
            'penempatan' => 'required',
            'statusPegawai' => 'required',
            'jabatan' => 'required',
            'kantor' => 'required',
        ]);
        //check if validation fails
        if ($validator->fails()) {
            // dd(response()->json($validator->errors()));
            return redirect()->route('pegawai')->with('error','Gagal Menyimpan Data');
        }
        // dd('simpen dah');
        //create data
        $data = Pegawai::create([
            'idUser' => auth()->id(),
            'nip' => $request->nip,
            'noKtp' => $request->noKtp,
            'nama' => $request->nama,
            'tglLahir' => $request->tglLahir,
            'jenisKelamin' => $request->jenisKelamin,
            'statusPerkawinan' => $request->statusPerkawinan,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'tglMasuk' => $request->tglMasuk,
            'penempatan' => $request->penempatan,
            'jabatan' => $request->jabatan,
            'kantor'     => $request->kantor,
            'statusPegawai' => $request->statusPegawai,
            'rekeningTabungan' => $request->rekeningTabungan,
        ]);
        // dd($data);
        return redirect()->back()->with('success', ' Data Berhasil Ditambahkan!');
    }


    public function edit($id)
    {
        $dataPegawai = Pegawai::find($id);
        // dd($data);
        return view('pegawai.edit', compact('dataPegawai'));
    }

    public function update(Request $request, $id)
    {
        $dataPegawai = Pegawai::findOrFail($id);
        $request->validate([
            'nip' => 'required|numeric',
            'nama' => 'required',
            'tglLahir' => 'required',
            'noKtp' => 'required|numeric',
            'jenisKelamin' => 'required',
            'statusPerkawinan' => 'required',
            'alamat' => 'required',
            'telepon' => 'required|numeric',
            'tglMasuk' => 'required',
            'rekeningTabungan' => 'required|numeric',
            'penempatan' => 'required',
            'statusPegawai' => 'required',
            'jabatan' => 'required',
            'kantor' => 'required',
        ]);
        $dataPegawai->nip = $request->nip;
        $dataPegawai->noKtp = $request->noKtp;
        $dataPegawai->nama = $request->nama;
        $dataPegawai->tglLahir = $request->tglLahir;
        $dataPegawai->jenisKelamin = $request->jenisKelamin;
        $dataPegawai->statusPerkawinan = $request->statusPerkawinan;
        $dataPegawai->telepon = $request->telepon;
        $dataPegawai->alamat = $request->alamat;
        $dataPegawai->tglMasuk = $request->tglMasuk;
        $dataPegawai->penempatan = $request->penempatan;
        $dataPegawai->jabatan = $request->jabatan;
        $dataPegawai->kantor     = $request->kantor;
        $dataPegawai->statusPegawai = $request->statusPegawai;
        $dataPegawai->rekeningTabungan = $request->rekeningTabungan;
        // dd($dataPegawai);
        $dataPegawai->save();
        return redirect()->route('pegawai')->with('success', ' Data Berhasil Diubah!');
    }

    public function destroy($id)
    {
        $dataPegawai = Pegawai::find($id);
        $dataPegawai->delete();
        return redirect()->back()->with(['error' => 'Data Berhasil Dihapus!']);
    }
}
