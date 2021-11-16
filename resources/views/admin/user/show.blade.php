@extends('adminlte::page')

@section('title', 'User Detail')

@section('content_header')
    <h1>User Detail</h1>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Profile</div>

                <div class="card-body">
                   <table class="table table-light">
                     <tbody>
                       <tr>
                         <td>Nama : </td>
                         <td>{{$user->name}}</td>
                       </tr>
                       <tr>
                         <td>email : </td>
                         <td>{{$user->email}}</td>
                       </tr>
                       <tr>
                         <td>Akses : </td>
                         <td>
                            @if ($user->is_admin == 1)
                              Pemilik
                            @else
                              Pegawai
                            @endif  
                         </td>
                       </tr>
                     </tbody>
                   </table>
                    @if (Auth::user()->is_admin == 1)
                      <a class="btn btn-primary" type="button" href="{{ route('user.edit', ['user'=>$user->id]) }}">Edit</a>
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
