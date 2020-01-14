<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelSiswa extends Model
{
    public $timestamps = false;

    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';
    Protected $fillable = ['nisn', 'nama_siswa', 'kelas', 'sekolah', 'tahun_ajaran'];
}
