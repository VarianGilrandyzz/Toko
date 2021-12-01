@extends('home.layout')

@section('body')
    <main id="main" data-aos="fade-up">
    
      @include('componen.breadcrumbs',['page'=>'Pemesanan'])

      <form action="#" method="GET">
        <!-- Produk Section -->
        <section class="featured-services">
          <div class="container" data-aos="fade-up">
            <div class="section-title">
              <h2>Pilih Barang</h2>
            </div>

            {{-- Data Testing --}}
            <div class="row">
              @foreach ($barang as $item)
                  @include('componen.produkCard',['btn'=>true])
              @endforeach
            </div>
          </div>
        </section>
        <!-- End Produk Section -->

        <!-- Produk Services Section -->
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
                  <input type="text" class="form-control" id="InputNama" placeholder="Masukan Nama">
                </div>
                <div class="form-group col-md-6">
                  <label for="phone">Telepon/WA</label>
                  <input type="tel" class="form-control" id="phone" placeholder="Masukan Nomor Telepon/WA">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <textarea name="alamat" id="alamat" class="form-control" rows="5">Alamat Lengkap</textarea>
            </div>
            <div class="form-group">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                  Saya Setuju dengan Persyaratan Pembelian
                </label>
              </div>
            </div>
            {{-- End alamat --}}
            <button type="submit" class="btn btn-primary">Lakukan Pemesanan</button>
          </div>
        </section>

      </form>

  </main>
@endsection