@extends('home.layout')

@section('body')
    <main id="main" data-aos="fade-up">
    
      @include('componen.breadcrumbs',['page'=>'lihatPemesanan'])

<div class="container">
<form method='get'>
  <div class="form-group mt-4">
    <input type="text" class="form-control" name='id_pemesanan' id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan id pemesanan anda">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@if($data!=null)
<div class="container">
<hr>
<div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-body">
                  <h2>Data Pembeli</h2>
                   <table class="table table-light">
                     <tbody>
                       <tr>
                         <td>Nama : </td>
                         <td>{{$data->pembeli->nama_lengkap}}</td>
                       </tr>
                       <tr>
                          <td>No. Telp : </td>
                          <td>
                            +62{{$data->pembeli->no_telp}}
                          </td>
                       </tr>
                       <tr>
                         <td>Alamat : </td>
                         <td><a href="http://map.google.com/?q={{$data->pembeli->alamat}}" target="_blank">{{$data->pembeli->alamat}}</a></td>
                       </tr>
                       <tr>
                         <td>Status : </td>
                         <td>
                         @if($data->status == 1 )
                         Mengantri
                         @elseif($data->status == 2)
                         Dikirim
                         @elseif($data->status == 3)
                         Selesai
                         @else
                         Dibatalkan
                         @endif</td>
                       </tr>
                     </tbody>
                   </table>
                    <h2>Data Transaksi</h2>
                    <table class="table table-light" id="tabel">
                       <thead>
                         <td>id Barang</td>
                         <td>Nama</td>
                         <td>Harga Satuan</td>
                         <td>Jumlah</td>
                       </thead>
                     <tbody>
                        @foreach ($data->detail_pemesanan as $item)
                        <tr>
                            <td>
                              <input type="checkbox">
                              {{$item->barang->id_barang}}
                            </td>
                            <td>{{$item->barang->nama_barang}}</td>
                            <td>{{$item->barang->harga}}</td>
                            <td>{{$item->jumlah}}</td>
                        </tr>
                        @endforeach
                     </tbody>
                   </table>
                  <h4 class="text-right">Total : {{$data->total_biaya}}</h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
  </main>
@endsection
