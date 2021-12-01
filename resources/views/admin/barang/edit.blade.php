@extends('adminlte::page')

@section('title', 'Edit Barang')

@section('content_header')
    <h1>Tambah Barang</h1>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Tambahkan Barang</div>
                <div class="card-body">
                   <form action="{{ route('barang.update',['barang'=>$barang->id_barang]) }}" method="POST" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <input type="hidden" name="_method" value="PUT">

                      <div class="input-group mb-3">
                          <div class="input-group-append">
                              <div class="input-group-text">
                                  <i class="fas fa-sitemap"></i>
                              </div>
                          </div>
                          <input type="text" name="nama_barang" class="form-control {{ $errors->has('nama_barang') ? 'is-invalid' : '' }}"
                                value="{{$barang->nama_barang}}" placeholder="Nama Barang" autofocus>
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
                                value="{{$barang->harga}}" placeholder="Harga Barang" autofocus>                    
                          @if($errors->has('harga'))
                              <div class="invalid-feedback">
                                  <strong>{{ $errors->first('harga') }}</strong>
                              </div>
                          @endif
                      </div>

                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="fa fa-paragraph" aria-hidden="true"></i>
                                </div>
                            </div>
                            <textarea name="deskripsi" class="form-control {{ $errors->has('deskripsi') ? 'is-invalid' : '' }}"
                                    placeholder="Deskirpsi Barang (Max 100 Karakter)" autofocus rows="5">{{$barang->deskripsi}}</textarea>      
                            @if($errors->has('deskripsi'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('deskripsi') }}</strong>
                                </div>
                            @endif
                        </div>
                        <img src="/upload/{{$barang->gambar}}" alt="gambar Produk" height="200px"
                            onerror="this.onerror=null; this.src='/img/apple-touch-icon.png'">
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="fa fa-file-image" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="custom-file">
                            <input name="gambar" type="file" class="custom-file-input" id="inputGroupFile01">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                            @if($errors->has('gambar'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('gambar') }}</strong>
                                </div>
                            @endif
                        </div>
                      
                      
                      {{-- add button --}}
                      <button type="submit" class="btn {{ config('adminlte.classes_auth_btn', 'btn btn-primary') }}">
                          <span class="fas fa-plus"></span>
                          Simpan Barang
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

