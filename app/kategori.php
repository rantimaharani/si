<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    protected $fillable = ['nama_kategori','slug'];

    public function daftar_roti(){
        return $this->hasMany('App\daftar_roti','id_kategori');
    }
}
