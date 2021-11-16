<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        // Protect all functions except some:
        $this->middleware(['is_admin','auth']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.index',['users'=>User::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $input['password'] = Hash::make($input['password']);
        try {
            User::create($input);
            return redirect()->route('user.index')->with('info', 'data berhasil di tambahkan');
        } catch (\Throwable $th) {
            return redirect()->route('user.index')->with('error', $th);
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
        $data = User::find($id);
        return view('admin.user.show', ['user' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);
        return view('admin.user.update', ['user'=>$data]);
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
        $input = $request->all();
        $user = User::find($id);

        $this->validate($request, [
            'name' => ['string', 'max:255'],
            'email' => ['string', 'email', 'max:255'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        //array password di hapus apabila password tidak di perbarui
        if ($input['password'] == null) {
            unset($input['password']);
        }else{
            //enkripsi password
            $input['password'] = Hash::make($input['password']);
        }

        //set array is admin apabila chack box bernilai false
        if (!array_key_exists('is_admin',$input)) {
            $input['is_admin'] = 0;
        }
        
        

        try {
            $user->update($input);
            return redirect()->route('user.index')->with('success', 'Data berhasil di perbarui');
        } catch (\Throwable $th) {
            // dd($th);
            return redirect()->route('user.index')->with('error', 'Data Gagal di perbarui');
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
        $data = User::find($id);
        try {
            $data->delete();
            return redirect('/admin/user')->with('info', "Data telah di hapus");
        } catch (\Throwable $th) {
            // dd($th);
            return redirect('/admin/user')->with('error', 'data gagal di hapus');
        }
    }
}
