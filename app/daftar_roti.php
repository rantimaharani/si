<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class daftar_roti extends Model
{
    protected $fillable = ['nama_roti','id_kategori','foto','deskripsi','slug'];

    public function kategori()
    {
        return $this->belongsTo('App\kategori','id_kategori');
    }
}
