<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    //
    protected $table = 'barang';
    protected $primaryKey = 'id_barang';
    protected $incrementing = true;
    public $timestamps = false;

    

}
