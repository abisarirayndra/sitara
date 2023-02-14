<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Prestasi;
use App\Models\Lampiran;
use File;

class SiswaController extends Controller
{
    public function kelas(){
        return view('siswa.kelas');
    }

    public function daftar_nama(Request $request){
        $tingkat = $request->tingkat;
        $siswa = Siswa::where('tingkat', $tingkat)->orderBy('kelas','asc')->get();

        return view('siswa.daftar_nama', compact('siswa','tingkat'));
    }

    public function daftar_prestasi($id){
        $prestasi = Prestasi::where('siswa_id', $id)->get();
        $siswa = Siswa::find($id);

        return view('siswa.daftar_prestasi', compact('prestasi','siswa'));
    }

    public function form_prestasi($id){
        $siswa = Siswa::find($id);

        return view('siswa.form_prestasi', compact('siswa'));
    }

    public function upload_prestasi(Request $request){
        $prestasi = Prestasi::create($request->all());

        if($request->hasfile('file')){
            foreach($request->file('file') as $key => $file)
            {
                $path = $file->store('public/files');
                $name = $file->getClientOriginalName();

                $insert[$key]['name'] = $name;
                $insert[$key]['path'] = $path;

                Lampiran::create([
                    'prestasi_id' => $prestasi->id,
                    'jenis' => "Foto",
                    'file' => $name,
                ]);

            }
        }


        return redirect()->back();
    }
}
