<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelTahun extends Model
{
    public $timestamps = false;

    protected $table = 'tahun_ajaran';
    protected $primaryKey = 'id_tahunajaran';
    protected $fillable = ['tahun_ajaran'];
}
