<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Prestasi;
use App\Models\Siswa;
use App\Models\Lampiran;
use Zip;
use File;

class AdminController extends Controller
{
    public function dashboard(){
        $user = Auth::user()->nama;
        $piagam = Lampiran::where('jenis', "Piagam")->get();
        $foto = Lampiran::where('jenis', "Foto")->get();
        $video = Lampiran::where('jenis', "Video")->get();
        $prestasi = Prestasi::orderBy('tingkat', 'asc')->orderBy('juara', 'asc')->get();

        return view('admin.dashboard', compact('user','prestasi','piagam','foto','video'));
    }

    public function kelas(){
        $user = Auth::user()->nama;
        return view('admin.kelas', compact('user'));
    }

    public function daftar_nama(Request $request){
        $user = Auth::user()->nama;

        $tingkat = $request->tingkat;
        $siswa = Siswa::where('tingkat', $tingkat)->orderBy('kelas','asc')->get();

        return view('admin.daftar_nama', compact('siswa','tingkat','user'));
    }

    public function daftar_prestasi($id){
        $user = Auth::user()->nama;

        $prestasi = Prestasi::where('siswa_id', $id)->orderBy('id', 'desc')->get();
        $siswa = Siswa::find($id);

        return view('admin.daftar_prestasi', compact('prestasi','siswa','user'));
    }

    public function form_prestasi($id){
        $user = Auth::user()->nama;

        $siswa = Siswa::find($id);

        return view('admin.form_prestasi', compact('siswa', 'user'));
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


        return redirect()->route('admin.daftar_prestasi', $request->siswa_id)->with('success','Prestasi Berhasil Ditambahkan');
    }

    public function edit_prestasi($id){
        $user = Auth::user()->nama;
        $prestasi = Prestasi::find($id);
        $siswa = Siswa::find($prestasi->siswa_id);
        $piagam = Lampiran::where('prestasi_id', $id)->where('jenis', "Piagam")->get();
        $foto = Lampiran::where('prestasi_id', $id)->where('jenis', "Foto")->get();
        $video = Lampiran::where('prestasi_id', $id)->where('jenis', "Video")->get();

        return view('admin.update_prestasi', compact('piagam','prestasi', 'siswa','foto','video','user'));
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

        return redirect()->route('admin.daftar_prestasi', $prestasi->siswa_id)->with('success','Prestasi Berhasil Diupdate');
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

    public function lihat_prestasi($id){
        $user = Auth::user()->nama;
        $prestasi = Prestasi::find($id);
        $siswa = Siswa::find($prestasi->siswa_id);
        $piagam = Lampiran::where('prestasi_id', $id)->where('jenis', "Piagam")->get();
        $foto = Lampiran::where('prestasi_id', $id)->where('jenis', "Foto")->get();
        $video = Lampiran::where('prestasi_id', $id)->where('jenis', "Video")->get();

        return view('admin.lihat_prestasi', compact('piagam','prestasi', 'siswa','foto','video','user'));
    }

    public function lampiran_prestasi(){
        $user = Auth::user()->nama;
        $piagam = Lampiran::where('jenis', "Piagam")->get();
        $foto = Lampiran::where('jenis', "Foto")->get();
        $video = Lampiran::where('jenis', "Video")->get();

        return view('admin.lampiran', compact('piagam','foto','video','user'));
    }

    public function download_files_zip(){
        return Zip::create('Lampiran_Prestasi.zip', File::files(public_path('files/')));
    }
}
