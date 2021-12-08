<?php

namespace App\Http\Controllers;

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
        if (isset($_GET['status'])) {
            $status= $_GET['status'];
        };
        return view('admin.pemesanan.index', ['data'=>pemesanan::where('status',$status)->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
