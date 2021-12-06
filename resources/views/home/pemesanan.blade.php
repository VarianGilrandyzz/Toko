@extends('home.layout')

@section('body')
    <main id="main" data-aos="fade-up">
    
      @include('componen.breadcrumbs',['page'=>'Pemesanan'])

      <form action="#" method="GET">
        <!-- Quantity Section -->
        <section class="inner-page">
          <div class="container">
            
            <div class="section-title">
              <h2>Tentukan Jumlah</h2>
            </div>
            <p>Daftar Barang</p>
            <div id="formJumlah" class="col">

            </div>

          </div>
        </section>
        <!-- end Quantity Section -->

        <!-- Identitas Section -->
        <section class="inner-page">
          <div class="container">
            
            <div class="section-title">
              <h2>Isi Identitas</h2>
            </div>
            
            {{-- Form alamat --}}
            <div class="form-group">
              <div class="form-row row">
                <div class="form-group col-md-6">
                  <label for="Input Nama">Nama</label>
                  <input type="text" class="form-control" id="InputNama" name="nama_lengkap" placeholder="Masukan Nama">
                </div>
                <div class="form-group col-md-6">
                  <label for="phone">Telepon/WA</label>
                  <input type="tel" class="form-control" id="phone" name="no_telp" placeholder="Masukan Nomor Telepon/WA">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <textarea name="alamat" id="alamat" class="form-control" rows="5" placeholder="Alamat Lengkap"></textarea>
            </div>
            <div class="form-group">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck" required>
                <label class="form-check-label" for="gridCheck">
                  Saya Setuju dengan Persyaratan Pembelian
                </label>
              </div>
            </div>
            {{-- End alamat --}}
            <button type="submit" class="btn btn-primary">Lakukan Pemesanan</button>
          </div>
        </section>
        {{-- end identitas section --}}

      </form>

  </main>
@endsection

@section('js')
    <script>
      function addForm() {
        const data = cart.getCart();
        const formJumlah = document.getElementById('formJumlah');
        let form = '<hr>';
        let i = 1;
        if (cart.cartCount()!=0) {
          data.forEach(e => {
            form += "<div class='input-group mb-3 row'>"+
              "<input type='hidden' name=[id]["+i+"] disabled value="+e.id+">"+
              "<label class='col-sm-2 col-form-label'> - "+e.nama+"</label>"+
              "<label class='col-sm-2 col-form-label'> @"+e.harga+"</label>"+
              "<label class='col-sm-2 col-form-label'>Jumlah : </label>"+
              "<select class='form-control col-sm-2 col-form-label' name=[qtw]["+i+"]'>"+
                "<option value='1'>1</option>"+
                "<option value='2'>2</option>"+
                "<option value='3'>3</option>"+
                "<option value='4'>4</option>"+
                "<option value='5'>5</option>"+
              "</select>"+
              "<button class='btn btn-danger col-sm-1' type='button' data-id="+e.id+" onclick='removeItem(this)'><i class='fa fa-trash' aria-hidden='true'></i></button>"+
              "</div><hr>"
              i++
          });
        }else{
          form+="Tidak ada Barang di Keranjang"
        }
        formJumlah.innerHTML = form
      }
      function removeItem(btn) {
        cart.removeItemCart(btn.dataset.id);
        addForm();
        updateIconCart(cart.cartCount());
      }
      addForm();
    </script>
@endsection