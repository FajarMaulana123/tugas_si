<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelSekolah extends Model
{
    public $timestamps = false;

    protected $table = 'sekolah';
    protected $primaryKey = 'id_sekolah';
    protected $fillable = ['nama_sekolah', 'email', 'password'];
}
