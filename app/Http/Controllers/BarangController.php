<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function __construct()
    {
        // Protect all functions except some:
        $this->middleware('is_admin',['except' => ['index', 'show']]);
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.barang.index',['items'=> Barang::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.barang.create');
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
        $this->validate($request, [
            'nama_barang' => ['required','max:30','string'],
            'harga' => ['required', 'numeric'],
        ]);

        try {
            Barang::create($input);
            return redirect()->route('barang.index')->with('info','barang berhasil di tambahkan');
        } catch (\Throwable $th) {
            return redirect()->route('barang.index')->with('error', 'barang tidak dapat di tambahkan');
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
        return view('admin.barang.show',['barang'=>Barang::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.barang.edit', ['barang' => Barang::find($id)]);

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
        $barang = Barang::find($id);
        $input = $request->all();

        $this->validate($request, [
            'nama_barang' => ['required', 'max:30', 'string'],
            'harga' => ['required', 'numeric'],
        ]);

        try {
            $barang->update($input);
            return redirect()->route('barang.index')->with('info', 'barang berhasil di perbarui');
        } catch (\Throwable $th) {
            return redirect()->route('barang.index')->with('error', 'barang tidak dapat di perbarui');
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
        $data = Barang::find($id);

        try {
            $data->delete();
            return redirect()->route('barang.index')->with('info', 'barang berhasil di hapus');
        } catch (\Throwable $th) {
            return redirect()->route('barang.index')->with('error', 'barang tidak dapat di hapus');
        }
    }
}
