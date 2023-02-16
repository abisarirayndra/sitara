<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id','jenis','tingkat','wilayah','juara','nama_kejuaraan','penyelenggara','nomor_piagam',
        'tanggal','tempat_pelaksanaan',
    ];
}
