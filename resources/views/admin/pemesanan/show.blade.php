@extends('adminlte::page')

@section('title', 'Detail data->pembeli')

@section('content_header')
    <h1>Detail Transaksi : {{$data->pembeli->nama_pembeli}}</h1>
@stop

@section('content')
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
                            <a class="btn btn-primary" href="http://wa.me/62{{$data->pembeli->no_telp}}" target="blank">WA <i class="fa fa-whatsapp-square" aria-hidden="true"></i></a>
                          </td>
                       </tr>
                       <tr>
                         <td>Alamat : </td>
                         <td><a href="http://map.google.com/?q={{$data->pembeli->alamat}}" target="_blank">{{$data->pembeli->alamat}}</a></td>
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
                    @include('componen.btnBack')
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
      @media only screen and (max-width: 768px) {
        table.dataTable{
          width: auto!important
        }
      }
    </style>
@stop

@section('plugins.Datatables', true)

@section('js')
  <script>
    var table = $('#tabel').DataTable({
      responsive: true,
      paging: false
    });
  </script>
@endsection