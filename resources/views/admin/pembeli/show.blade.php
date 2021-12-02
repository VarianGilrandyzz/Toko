@extends('adminlte::page')

@section('title', 'Detail pembeli')

@section('content_header')
    <h1>Detail pembeli : {{$pembeli->nama_pembeli}}</h1>
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
                         <td>{{$pembeli->nama_lengkap}}</td>
                       </tr>
                       <tr>
                          <td>No. Telp : </td>
                          <td>
                            +62{{$pembeli->no_telp}}
                            <a class="btn btn-primary" href="http://wa.me/62{{$pembeli->no_telp}}" target="blank">WA <i class="fa fa-whatsapp-square" aria-hidden="true"></i></a>
                          </td>
                       </tr>
                       <tr>
                         <td>Alamat : </td>
                         <td>{{$pembeli->alamat}}</td>
                       </tr>
                     </tbody>
                   </table>
                    <a class="btn btn-primary" type="button" href="{{ route('pembeli.edit', ['pembeli'=>$pembeli->id_pembeli]) }}">Edit</a>
                    
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
