<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Validator;

class UserSumaController extends Controller
{
    public function index()
    {
        $data = User::latest()->get();
        return view('user_suma.list', compact('data'));
    }
    public function update(Request $request)
    {
        $dataStatus = User::findOrFail($request->id);
        // dd($dataStatus->id);
        $validator = Validator::make($request->all(), [
            'status' => 'required'
        ]);
        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $dataStatus->status = $request->status;
        $dataStatus->save();
        return redirect()->back()->with('success', ' Status Berhasil Diubah!');
    }

}
