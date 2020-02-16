<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelAdmin extends Model
{
    public $timestamps = false;

    protected $table = 'admin';
    protected $primaryKey = 'id_admin';
    protected $fillable = ['username','password'];
}
