@extends('adminlte::page')

@section('title', 'Daftar Barang')

@section('content_header')
    <div class="row">
      <div class="col-auto mr-auto">
        <h1>Daftar Barang Jualan</h1>
      </div>
      <div class="col-auto">
        <a class="btn btn-primary" href="{{ route('barang.create') }}">Tambahkan Barang Baru</a>
      </div>
  </div>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <table class="table table-light" id="tabel">
                     <thead>
                       <td>ID</td>
                       <td>Nama Barang</td>
                       <td>Harga Satuan</td>
                       <td>Action</td>
                     </thead>
                     <tbody>
                       @foreach ($items as $barang)
                          <tr>
                            <td>{{$barang->id_barang}}</td>
                            <td>{{$barang->nama_barang}}</td>
                            <td>{{$barang->harga}}</td>
                            <td>
                              <a class="btn btn-primary" href="{{ route('barang.show', ['barang'=>$barang->id_barang]) }}">Show</a>
                              @if (Auth::user()->is_admin == 1)
                                  <a class="btn btn-warning" href="{{ route('barang.edit', ['barang'=>$barang->id_barang]) }}">Edit</a>
                                  <button 
                                    class="btn btn-danger" 
                                    data-toggle="modal" 
                                    data-target="#hapus" 
                                    data-name="{{$barang->nama_barang}}"
                                    data-url="{{ route('barang.destroy', ['barang'=>$barang->id_barang]) }}"
                                  >
                                    delete
                                  </button>
                              @endif
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
                      <div class="modal-header">
                        <h5 class="modal-title">Hapus Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p></p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">back</button>
                        <form action="" method="post" id="formHapus">
                          @csrf
                          <input type="hidden" name="_method" value="delete" />
                          <button type="submit" class="btn btn-danger">delete</button>
                        </form>
                      </div>
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
      modal.find('.modal-body p').text('Hapus Barang : ' + name)
      modal.find('.modal-footer #formHapus').attr('action',url)
    })

    @include('componen.toast')    
  </script>
@endsection