@extends('adminlte::page')

@section('title', 'User Detail')

@section('content_header')
    <h1>User Detail</h1>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Add User</div>
                <div class="card-body">
                   <form action="{{ route('barang.store') }}" method="POST">
                      {{ csrf_field() }}

                      <div class="input-group mb-3">
                          <div class="input-group-append">
                              <div class="input-group-text">
                                  <i class="fas fa-sitemap"></i>
                              </div>
                          </div>
                          <input type="text" name="nama_barang" class="form-control {{ $errors->has('nama_barang') ? 'is-invalid' : '' }}"
                                value="{{ old('nama_barang') }}" placeholder="Nama Barang" autofocus>
                          @if($errors->has('nama_barang'))
                              <div class="invalid-feedback">
                                  <strong>{{ $errors->first('nama_barang') }}</strong>
                              </div>
                          @endif
                      </div>

                      <div class="input-group mb-3">
                          <div class="input-group-append">
                              <div class="input-group-text">
                                  @
                              </div>
                          </div>
                          <input type="text" name="harga" class="form-control {{ $errors->has('harga') ? 'is-invalid' : '' }}"
                                value="{{ old('harga') }}" placeholder="Harga Barang" autofocus>                    
                          @if($errors->has('harga'))
                              <div class="invalid-feedback">
                                  <strong>{{ $errors->first('harga') }}</strong>
                              </div>
                          @endif
                      </div>
                      
                      
                      {{-- add button --}}
                      <button type="submit" class="btn {{ config('adminlte.classes_auth_btn', 'btn btn-primary') }}">
                          <span class="fas fa-plus"></span>
                          Tambahkan Barang
                      </button>
                        @include('componen.btnBack')
                  </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

