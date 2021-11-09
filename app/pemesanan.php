<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pemesanan extends Model
{
    //
    protected $table = 'pemesanan';
    protected $primaryKey = 'id_pemesanan';
    public $incrementing = true;
    public $timestamps = false;

    public function detail_pemesanan()
    {
        return $this->hasMany('App\detail_pemesanan','id_pemesanan','id_pemesanan');

    }
}
