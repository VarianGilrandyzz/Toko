<?php

namespace App\Http\Controllers;

use App\Barang;
use App\detail_pemesanan;
use App\pembeli;
use App\pemesanan;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = "1,2,3,4";
        $date = date('Y m d');
        if (isset($_GET['status'])) {
            $status= $_GET['status'];
        };
        if (isset($_GET['date'])) {
            $date = $_GET['date'];
        };
        return view('admin.pemesanan.index', 
            ['data'=>pemesanan::where('status',$status)
                ->where('tgl_pemesanan','>=',$date)
                ->get(),
             'status' => $status
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pemesanan.create',[
            'pembeli'=>pembeli::all(),
            'barang' => Barang::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        try {
            $total = 0;
            for ($i = 0; $i < count($input['id']); $i++) {
                $barng = Barang::find($input['id'])->first();
                $total += ( $barng->harga * $input['qtw'][$i]);
            }

            //simpan pemesanan
            $pemesanan = pemesanan::create([
                'tgl_pemesanan' => date('Y-m-d H:i:s'),
                'total_biaya' => $total,
                'status' => 1,
                'id_pembeli' => $input['id_pembeli']
            ]);

            // simpan detail pemesanan
            for ($i = 0; $i < count($input['id']); $i++) {
                $detail = detail_pemesanan::create([
                    'id_pemesanan' => $pemesanan->id_pemesanan,
                    'id_barang' => $input['id'][$i],
                    'jumlah' => $input['qtw'][$i]
                ]);
            }

            //redirect
            return redirect()->route('pemesanan.index')->with('info', 'transaksi berhasil');
        } catch (\Throwable $th) {

            dd($th);
            return redirect()->route('pemesanan.index')->with('danger', 'transaksi gagal');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.pemesanan.show', ['data'=>pemesanan::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = pemesanan::find($id);
        $input = $request->all();

        try {
            $status_awal = $data->status;
            $data->update($input);
            return redirect(route('pemesanan.index') . '?status='.$status_awal)->with('info', 'pemesanan berhasil di perbarui');
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->route('pemesanan.index')->with('error', 'pemesanan tidak dapat di perbarui');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
