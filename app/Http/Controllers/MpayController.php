<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MpayController extends Controller
{
    /** Master Rekening */
    public function indexRekening()
    {
        return view('mpay.master-rekening.rekening');
    }


    /** Mutasi Simpanan */
    public function indexMutasi()
    {
        return view('mpay.mutasi.mutasi');
    }
}
