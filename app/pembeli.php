<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pembeli extends Model
{
    //
    protected $table = 'pembeli';
    protected $primaryKey = 'id_pembeli';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'nama_lengkap', 'alamat', 'no_telp'
    ];

    function pemesanan()
    {
        return $this->hasMany('App\pemesanan', 'id_pembeli', 'id_pembeli');
    }
}
