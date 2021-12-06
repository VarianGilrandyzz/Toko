<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail_pemesanan extends Model
{
    //
    protected $table = 'detail_pemesanan';
    public $timestamps = false;

    protected $fillable = [
        'id_pemesanan', 'id_barang', 'jumlah'
    ];

     public function barang()
    {
        return $this->belongsTo('App\barang','id_barang','id_barang');
    }

}
