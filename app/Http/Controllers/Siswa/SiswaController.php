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
        $prestasi = Prestasi::where('siswa_id', $id)->orderBy('id', 'desc')->get();
        $siswa = Siswa::find($id);

        return view('siswa.daftar_prestasi', compact('prestasi','siswa'));
    }

    public function form_prestasi($id){
        $siswa = Siswa::find($id);

        return view('siswa.form_prestasi', compact('siswa'));
    }

    public function upload_prestasi(Request $request){
        $prestasi = Prestasi::create($request->all());

        if($request->hasfile('piagam')){
            foreach($request->file('piagam') as $key => $file)
            {
                $path = public_path('files/');
                $name = $file->getClientOriginalName();
                $file->move($path, $name);

                Lampiran::create([
                    'prestasi_id' => $prestasi->id,
                    'jenis' => "Piagam",
                    'file' => $name,
                ]);

            }
        }
        if($request->hasfile('file')){
            foreach($request->file('file') as $key => $file)
            {
                $path = public_path('files/');
                $name = $file->getClientOriginalName();
                $file->move($path, $name);

                Lampiran::create([
                    'prestasi_id' => $prestasi->id,
                    'jenis' => "Foto",
                    'file' => $name,
                ]);

            }
        }

        if($request->hasfile('videos')){
            foreach($request->file('videos') as $key => $file)
            {
                $path = public_path('files/');
                $name = $file->getClientOriginalName();
                $file->move($path, $name);

                Lampiran::create([
                    'prestasi_id' => $prestasi->id,
                    'jenis' => "Video",
                    'file' => $name,
                ]);

            }
        }


        return redirect()->route('daftar_prestasi', $request->siswa_id)->with('success','Prestasi Berhasil Ditambahkan');
    }

    public function edit_prestasi($id){
        $prestasi = Prestasi::find($id);
        $siswa = Siswa::find($prestasi->siswa_id);
        $piagam = Lampiran::where('prestasi_id', $id)->where('jenis', "Piagam")->get();
        $foto = Lampiran::where('prestasi_id', $id)->where('jenis', "Foto")->get();
        $video = Lampiran::where('prestasi_id', $id)->where('jenis', "Video")->get();

        return view('siswa.update_prestasi', compact('piagam','prestasi', 'siswa','foto','video'));
    }

    public function hapus_prestasi($id){
        $prestasi = Prestasi::find($id);
        $lampiran = Lampiran::where('prestasi_id', $id)->get();
        if($lampiran){
            foreach($lampiran as $key => $file)
            {
                if($file->file && file_exists(public_path('files/'. $file->file))){
                    File::delete(public_path('files/'. $file->file));
                }
            }
        }
        $prestasi->delete();
        return redirect()->back()->with('success','Prestasi Berhasil Dihapus');
    }

    public function update_prestasi($id, Request $request){
        $prestasi = Prestasi::find($id);
        $prestasi->update($request->all());

        if($request->hasfile('piagam')){
            foreach($request->file('piagam') as $key => $file)
            {
                $path = public_path('files/');
                $name = $file->getClientOriginalName();
                $file->move($path, $name);

                Lampiran::create([
                    'prestasi_id' => $prestasi->id,
                    'jenis' => "Piagam",
                    'file' => $name,
                ]);

            }
        }
        if($request->hasfile('file')){
            foreach($request->file('file') as $key => $file)
            {
                $path = public_path('files/');
                $name = $file->getClientOriginalName();
                $file->move($path, $name);

                Lampiran::create([
                    'prestasi_id' => $prestasi->id,
                    'jenis' => "Foto",
                    'file' => $name,
                ]);

            }
        }

        if($request->hasfile('videos')){
            foreach($request->file('videos') as $key => $file)
            {
                $path = public_path('files/');
                $name = $file->getClientOriginalName();
                $file->move($path, $name);

                Lampiran::create([
                    'prestasi_id' => $prestasi->id,
                    'jenis' => "Video",
                    'file' => $name,
                ]);

            }
        }

        return redirect()->route('daftar_prestasi', $prestasi->siswa_id)->with('success','Prestasi Berhasil Diupdate');
    }

    public function hapus_file($id){
        $lampiran = Lampiran::find($id);
        if($lampiran){
            if($lampiran->file && file_exists(public_path('files/'. $lampiran->file))){
                File::delete(public_path('files/'. $lampiran->file));
            }
        }
        $lampiran->delete();
        return redirect()->back()->with('success', 'Hapus File Berhasil');
    }
}
