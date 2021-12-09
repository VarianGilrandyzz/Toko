<?php

namespace App\Http\Controllers;

use App\Barang;
use App\detail_pemesanan;
use App\pembeli;
use App\pemesanan;
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

    function pemesananProses(Request $request){
        $input = $request->all();
        $this->validate($request, [
            'nama_lengkap' => ['required', 'max:30'],
            'no_telp' => ['required', 'digits_between:11,13'],
            'alamat' => ['required', 'max:50', 'string'],
            'agree' => ['required']
        ]);

        // dd($input);
        // menyimpan transaksi
        try {
            // simpan atau perbarui data pengguna
            $pembeli = pembeli::updateOrCreate(
                [
                    'no_telp' => $input['no_telp'],
                ], 
                [
                    'nama_lengkap' => $input['nama_lengkap'],
                    'alamat' => $input['alamat']
                ]
            );

            $total = 0;
            for ($i=0; $i < count($input['id']); $i++) { 
                $total += ($input['harga'][$i]* $input['qtw'][$i]);
            }

            //simpan pemesanan
            $pemesanan = pemesanan::create([
                'tgl_pemesanan' => date('Y-m-d H:i:s'),
                'total_biaya' => $total,
                'status' => 1,
                'id_pembeli' => $pembeli->id_pembeli
            ]);

            // simpan detail pemesanan
            for ($i=0; $i < count($input['id']); $i++) {
                $detail = detail_pemesanan::create([
                    'id_pemesanan' => $pemesanan->id_pemesanan,
                    'id_barang' => $input['id'][$i],
                    'jumlah' => $input['qtw'][$i]
                ]);
            }

            //redirect
            return redirect()->route('lihat.pemesanan',['id'=>$pemesanan->id_pemesanan])->with('info', 'transaksi berhasil');
        } catch (\Throwable $th) {
            return redirect()->route('pemesanan')->with('danger', 'transaksi gagal');
        }
    }

    function lihatPesanan()
    {

        // $data = pemesanan::find($id);
        // dd($data->pembeli);
        $data = null;
        if (isset($_GET['id_pemesanan'])){
            $data = pemesanan::find($_GET['id_pemesanan']);
        }
        return view('home.cekPemesanan',['data'=>$data]);
        // dd($data);
    }
}
