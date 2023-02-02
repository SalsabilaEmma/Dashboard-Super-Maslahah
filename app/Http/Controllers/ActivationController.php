<?php

namespace App\Http\Controllers;

use App\Models\Activation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ActivationController extends Controller
{
    public function index()
    {
        // return view('aktivasi.list');

        return view('aktivasi.list', [
            'data' => Activation::latest()->get(),
        ]);
    }

    public function viewData()
    {
        $data = Activation::latest()->get();
        return $data->toJson();
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'cif' => 'required|numeric',
            'nip' => 'required|numeric',
            'ttl' => 'required',
            'noHp' => 'required|numeric',
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

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create data
        $data = Activation::create([
            'idUser' => auth()->id(),
            'cif'     => $request->cif,
            'nip' => $request->nip,
            'ttl' => $request->ttl,
            'noHp' => $request->noHp,
            'noKtp' => $request->noKtp,
            'tipeHp' => $request->tipeHp,
            'statusAktivasi' => $request->statusAktivasi,
            'kodeUnik' => $request->kodeUnik,
            'aksesAbsen' => $request->aksesAbsen,
            'aksesMpay' => $request->aksesMpay,
            'aksesKpai' => $request->aksesKpai,
            'aksesKunKer' => $request->aksesKunKer,
            'aksesListPekerjaan' => $request->aksesListPekerjaan,
        ]);
        dd($data);
        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Ditambahkan!',
            'data'    => $data
        ]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
