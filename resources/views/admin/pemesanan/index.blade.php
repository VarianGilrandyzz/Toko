@extends('adminlte::page')

@section('title', 'Daftar pemesanan')

@section('content_header')
    <div class="row">
      <div class="col-auto mr-auto">
        <h1>Daftar pemesanan</h1>
      </div>
      <div class="col-auto">
        <a class="btn btn-primary" href="{{ route('pemesanan.create') }}">Tambahkan pemesanan Baru</a>
      </div>
  </div>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    {{-- {{-filter date data-  --}}
                    <form action="" method="get">
                      <input type="hidden" name="status" value="{{$_GET['status']}}">
                      <div class="row justify-content-end">
                      <div class="col-4">
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Pilih Hari</label>
                          </div>
                          <input class="form-control" type="date" name="date">
                          <div class="input-group-prepend">
                            <button class="btn btn-outline-secondary" type="submit">Terapkan</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    </form>
                    {{-- {{-filter date data-  --}}

                    <table class="table table-light" id="tabel">
                     <thead>
                       <td>ID</td>
                       <td>Tgl</td>
                       <td>Total Biaaya</td>
                       <td>Nama Pembeli</td>
                       <td>Action</td>
                     </thead>
                     <tbody>
                       @foreach ($data as $pemesanan)
                          <tr>
                            <td>{{$pemesanan->id_pemesanan}}</td>
                            <td>{{$pemesanan->tgl_pemesanan}}</td>
                            <td>{{$pemesanan->total_biaya}}</td>
                            <td>{{$pemesanan->pembeli->nama_lengkap}}</td>
                            <td>
                              <a class="btn btn-info" href="{{ route('pemesanan.show', ['pemesanan'=>$pemesanan->id_pemesanan]) }}">Detail</a>
                              <button 
                                class="btn btn-warning" 
                                data-toggle="modal" 
                                data-target="#hapus" 
                                data-name="{{$pemesanan->pembeli->nama_lengkap}}"
                                data-url="{{ route('pemesanan.update', ['pemesanan'=>$pemesanan->id_pemesanan]) }}"
                              >
                                Ubah Status
                              </button>
                            </td>
                          </tr>
                       @endforeach
                     </tbody>
                   </table>
                </div>

                {{-- Modal Hapus Data --}}
                <div class="modal" tabindex="-1" role="dialog" id="hapus">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <form action="" method="POST" id="formHapus">
                      @csrf
                      <input type="hidden" name="_method" value="put" >
                      <div class="modal-header">
                        <h5 class="modal-title">Ubah Status Pemesanan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p></p>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select id="status" class="form-control" name="status">
                              <option value="1" selected>Mengantri</option>
                              <option value="2">Dikirim</option>
                              <option value="3">Selesai</option>
                              <option value="4">Dibatalkan</option>
                            </select>
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">back</button>
                        <button type="submit" class="btn btn-warning">Perbarui</button>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
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
      responsive: true
    });

    $('#hapus').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var name = button.data('name')
      var url = button.data('url') // Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)
      modal.find('.modal-body p').text('Ubah status pesanan dari : ' + name)
      modal.find('#formHapus').attr('action',url)
    })

    @include('componen.toast')    
  </script>
@endsection