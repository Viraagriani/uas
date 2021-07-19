<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'beritas';
    protected $fillable = ['nama_berita','headline','isi_berita','id_berita'];

    public function kategor(){
        return $this->belongsTo(Kategori::class,'id_berita');
    }
}
