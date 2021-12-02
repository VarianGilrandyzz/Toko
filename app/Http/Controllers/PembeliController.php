<?php

namespace App\Http\Controllers;

use App\pembeli;
use Illuminate\Http\Request;

class PembeliController extends Controller
{
    public function __construct()
    {
        // Protect all functions except some:
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = pembeli::all();
        return view('admin.pembeli.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pembeli.create');
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
        // dd($input['no_telp']);
        $this->validate($request, [
            'nama_lengkap' => ['required', 'max:30', 'string'],
            'no_telp' => ['required', 'digits_between:11,13', 'numeric'],
            'alamat' => ['required', 'max:50', 'string']
        ]);

        try {
            pembeli::create($input);
            return redirect()->route('pembeli.index')->with('info', 'pembeli berhasil di tambahkan');
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->route('pembeli.index')->with('error', 'pembeli tidak dapat di tambahkan');
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
        return view('admin.pembeli.show',['pembeli'=>pembeli::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.pembeli.edit', ['pembeli' => pembeli::find($id)]);
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
        $data = pembeli::find($id);
        $input = $request->all();
        // dd($input['no_telp']);
        $this->validate($request, [
            'nama_lengkap' => ['required', 'max:30', 'string'],
            'no_telp' => ['required', 'digits_between:11,13'],
            'alamat' => ['required', 'max:50', 'string']
        ]);

        try {
            $data->update($input);
            return redirect()->route('pembeli.index')->with('info', 'pembeli berhasil di perbarui');
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->route('pembeli.index')->with('error', 'pembeli tidak dapat di perbarui');
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
        $data = pembeli::find($id);

        try {
            $data->delete();
            return redirect()->route('pembeli.index')->with('info', 'pembeli berhasil di hapus');
        } catch (\Throwable $th) {
            return redirect()->route('pembeli.index')->with('error', 'pembeli tidak dapat di hapus');
        }
    }
}
