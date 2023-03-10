<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use File;
use Illuminate\Http\Request;
use Image;

class BannerController extends Controller
{
    public function index()
    {
        $data = Banner::latest()->get();
        return view('banner.list', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $image = $request->file('gambar');
        $namafile = time() . '.' . $image->getClientOriginalExtension();

        Image::make($image)->resize(400, 400, function ($constraint) {
            /** thumbnail */
            $constraint->aspectRatio();
        })->save(public_path('/img/banner/') . $namafile);
        // $image->move('image/banner-original/', $namafile);

        $gallery = new Banner;
        $gallery->judul = $request->judul;
        $gallery->gambar = $namafile;
        $gallery->url = "/public/img/banner/" . $namafile;
        // dd($gallery);
        $gallery->save();
        return redirect()->back()->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $dataBanner = Banner::findOrFail($id);
        // dd($dataBanner);
        return view('banner.edit', compact('dataBanner'));
    }

    public function update(Request $request, Banner $dataBanner, $id)
    {
        // dd($request->all());
        $dataBanner = Banner::findOrfail($id);
        // dd($dataBanner->gambar);
        $request->validate([
            'judul' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if (File::exists(public_path('/img/banner/' . $dataBanner->gambar))) {  // cek didalem id itu ada file/gambare nggak
            // delete file lama
            File::delete(public_path('/img/banner/' . $dataBanner->gambar));
            // File::delete(public_path('/public/img/banner-original/' . $dataBanner->gambar));
        } else {
            return redirect()->back()->with(['error' => 'Data Tidak Ditemukan!']);
        }
        // upload gambar baru
        $image = $request->file('gambar');
        $namafile = time() . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(400, 400, function ($constraint) {  // thumbnail
            $constraint->aspectRatio();
        })->save('public/img/banner/' . $namafile);
        // $image->move('image/banner-original/', $namafile); // ukuran file asli
        // perubahan nama & gambar
        $dataBanner->judul = $request->judul;
        $dataBanner->gambar = $namafile;
        $dataBanner->save();
        return redirect()->route('banner')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id)
    {
        $dataBanner = Banner::findOrfail($id);
        //  && File::exists(public_path('/image/banner-original/'.$dataBanner->file))  |   && File::exists(public_path('/image/banner-original/'.$data_banner->file))
        if (File::exists(public_path('/img/banner/' . $dataBanner->banner))) {
            File::delete(public_path('/img/banner/' . $dataBanner->banner));
            // File::delete(public_path('/image/banner-original/' . $dataBanner->file));
            $dataBanner->delete();
            return redirect()->back()->with(['error' => 'Data Berhasil Dihapus!']);
        } else {
            return redirect()->back()->with(['error' => 'Data Tidak Ditemukan!']);
        }

    }
}
