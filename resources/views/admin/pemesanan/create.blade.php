@extends('adminlte::page')

@section('title', 'Add pembeli')

@section('content_header')
    <h1>Tambah pembeli</h1>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Tambahkan pembeli</div>
                <div class="card-body">
                   <form action="{{ route('pembeli.store') }}" method="POST">
                      {{ csrf_field() }}

                      <div class="input-group mb-3">
                          <div class="input-group-append">
                              <div class="input-group-text">
                                  <i class="fas fa-sitemap"></i>
                              </div>
                          </div>
                          <input type="text" name="nama_lengkap" class="form-control {{ $errors->has('nama_lengkap') ? 'is-invalid' : '' }}"
                                value="{{ old('nama_lengkap') }}" placeholder="Nama pembeli" autofocus>
                          @if($errors->has('nama_lengkap'))
                              <div class="invalid-feedback">
                                  <strong>{{ $errors->first('nama_lengkap') }}</strong>
                              </div>
                          @endif
                      </div>

                      <div class="input-group mb-3">
                          <div class="input-group-append">
                              <div class="input-group-text">
                                  +62
                              </div>
                          </div>
                          <input type="number" name="no_telp" class="form-control {{ $errors->has('no_telp') ? 'is-invalid' : '' }}"
                                value="{{ old('no_telp') }}" placeholder="No. telp/WA pembeli" autofocus>                    
                          @if($errors->has('no_telp'))
                              <div class="invalid-feedback">
                                  <strong>{{ $errors->first('no_telp') }}</strong>
                              </div>
                          @endif
                      </div>

                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="fa fa-paragraph" aria-hidden="true"></i>
                                </div>
                            </div>
                            <textarea name="alamat" class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}"
                                    placeholder="Alamat pembeli" autofocus rows="5">{{ old('alamat') }}</textarea>      
                            @if($errors->has('alamat'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('alamat') }}</strong>
                                </div>
                            @endif
                        </div>  
                      
                      {{-- add button --}}
                      <button type="submit" class="btn {{ config('adminlte.classes_auth_btn', 'btn btn-primary') }}">
                          <span class="fas fa-plus"></span>
                          Tambahkan pembeli
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

