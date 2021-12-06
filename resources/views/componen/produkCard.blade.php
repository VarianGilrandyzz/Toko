<div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
  <div class="icon-box produk-card" data-aos="fade-up" data-aos-delay="200" 
    style="background:linear-gradient(to bottom, #063a758a, #106eea6b), url('/upload/{{$item['gambar']}}')">
    <h4 class="title"><a href="{{ route('pemesanan') }}" class="card-title">{{$item['nama_barang']}}</a></h4>
    <p class="description">{{$item['deskripsi']}}</p>
    <p class="description"><b>Rp. {{$item['harga']}}</b></p>
    <div class="btn-beli">
        <button class="btn btn-light add-btn" type="button" onclick="additem(this)"
          data-nama="{{$item['nama_barang']}}"
          data-id="{{$item['id_barang']}}"
          data-harga="{{$item['harga']}}"
        >Tambahkan</button>
    </div>
  </div>
</div>

