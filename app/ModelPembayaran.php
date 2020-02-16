<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelPembayaran extends Model
{

    protected $table = 'pembayaran';
    protected $primaryKey = 'id_pembayaran';
    Protected $fillable = ['nisn', 'nama_siswa', 'kelas', 'sekolah', 'tahun_ajaran', 'bulan', 'bukti_tf', 'status'];
}
