@extends('adminlte::page')

@section('title', 'Add pembeli')

@section('content_header')
    <h1>Tambah Pemesanan</h1>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Tambahkan Pemesanan</div>
                <div class="card-body">
                   <form action="{{ route('pemesanan.store') }}" method="POST">
                      {{ csrf_field() }}

                      <div class="input-group mb-3">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                Pembeli
                            </div>
                        </div>
                        <select id="pembeli" class="form-control" name="id_pembeli">
                            @foreach ($pembeli as $item)
                                <option value="{{$item->id_pembeli}}">{{$item->nama_lengkap}} - {{$item->alamat}}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="row justify-content-between">
                        <div class="col-4">
                            <h4>Barang</h4>
                        </div>
                        <div class="col-4">
                            <button class="btn btn-primary btn-block" type="button" onclick="addForm()">Tambahkan Daftar Barang</button>
                        </div>
                    </div>
                        <hr>
                      <div class="row">
                          <div class="col">
                              <div id="formBaranag">
                        
                            </div>
                          </div>
                      </div>
                        <hr>
                      <div class="row">
                          {{-- add button --}}
                        <button type="submit" class="btn {{ config('adminlte.classes_auth_btn', 'btn btn-primary') }}">
                            <span class="fas fa-plus"></span>
                            Tambahkan pembeli
                        </button>
                        @include('componen.btnBack')
                      </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        function addForm() {
            formText = "<div class='form-row'>"+
                "<div class='col'>"+
                    "<select id='my-select' class='form-control' name='id[]'>"+
                        @foreach ($barang as $item)
                             "<option value={{$item->id_barang}}>{{$item->nama_barang}}</option>"+
                        @endforeach
                    "</select>"+
                "</div>"+
                "<div class='col'>"+
                    "<input class='form-control' type='number' name='qtw[]'>"+
                "</div>"+
            "</div>";
            document.getElementById('formBaranag').innerHTML += formText
        }
    </script>
@endsection
