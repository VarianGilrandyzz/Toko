@extends('adminlte::page')

@section('title', 'User Detail')

@section('content_header')
    <h1>Detail Barang</h1>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-body">
                   <table class="table table-light">
                     <tbody>
                       <tr>
                         <td>Nama : </td>
                         <td>{{$barang->nama_barang}}</td>
                       </tr>
                       <tr>
                         <td>Harga (@): </td>
                         <td>{{$barang->harga}}</td>
                       </tr>
                     </tbody>
                   </table>
                    @if (Auth::user()->is_admin == 1)
                      <a class="btn btn-primary" type="button" href="{{ route('barang.edit', ['barang'=>$barang->id_barang]) }}">Edit</a>
                    @endif
                    @include('componen.btnBack')
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop


@section('js')

@endsection
