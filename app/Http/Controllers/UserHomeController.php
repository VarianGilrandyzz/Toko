<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;

class UserHomeController extends Controller
{
    function index()
    {
        $barang = Barang::all();
        return view('home.index', ['barang' => $barang]);
    }

    function pemesanan()
    {
        $barang = Barang::all();
        return view('home.pemesanan',['barang'=>$barang]);
    }
}
