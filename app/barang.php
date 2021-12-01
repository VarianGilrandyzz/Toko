<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    //
    protected $table = 'barang';

    protected $fillable = [
        'nama_barang', 'harga', 'deskripsi', 'gambar'
    ];

    protected $primaryKey = 'id_barang';
    public $timestamps = false;
}
