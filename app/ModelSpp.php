<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelSpp extends Model
{
    public $timestamps = false;

    protected $table = 'tarif_spp';
    protected $primaryKey = 'id_tarifspp';
    protected $fillable = ['tahun_ajaran', 'bulan', 'tarif_spp'];
}
