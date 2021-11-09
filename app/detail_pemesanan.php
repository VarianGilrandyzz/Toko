<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail_pemesanan extends Model
{
    //
    protected $table = 'detail_pemesanan';
     public function barang()
    {
        return $this->belongsTo('App\barang','id_barang','id_barang');

    }

}
