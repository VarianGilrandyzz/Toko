@extends('home.layout')

@section('title','Toko Ladida')

@section('body')

  @include('componen.hero')

  <main id="main">

         <!-- ======= Produk Section ======= -->
    <section id="produk" class="featured-services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Barang/Produk</h2>
          <h3>Daftar <span>Produk atau Barang</span> Kami</h3>
        </div>

        <div class="row">
          @foreach ($barang as $item)
              @include('componen.produkCard',['btn'=>false])
          @endforeach
        </div>
      </div>
    </section><!-- End Featured Services Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Layanan</h2>
          <h3>Periksa <span>Layanan Kami</span></h3>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4><a href="">Pembelian Barang</a></h4>
              <p>Melayani Pembelian barang kami melalui situs web kami atau datang secara langsung untuk lebih banyak pilihan di toko kami</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4><a href="">Jasa Antar</a></h4>
              <p>Menerima jasa pengantaran barang dari pembelian di toko kami</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4><a href="">Jasa Pemasangan/Perbaikan</a></h4>
              <p>Menerima Jasa pemasangan tabung gas maupun perbaikan kompor gas</p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Services Section -->
   
    <!-- ======= Frequently Asked Questions Section ======= -->
    @include('componen.faq')
    <!-- End Frequently Asked Questions Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <h3><span>Hubungi Kami</span></h3>
          <p>Hubungi Kami di alamat serta nomer telepon/WA berikut</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-6">
            <div class="info-box mb-4">
              <i class="bx bx-map"></i>
              <h3>Our Address</h3>
              <p>Jln. Kyai Ghozali No. 48</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-envelope"></i>
              <h3>Email Us</h3>
              <p>contact@example.com</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-phone-call"></i>
              <h3>Call Us</h3>
              <p>088X XXXX XXXX</p>
            </div>
          </div>

        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-6 ">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d273.1171532785009!2d113.22754999971767!3d-8.127850055900439!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd65df6d1f05b0d%3A0x5cecd21793ede2bd!2sToko%20Ladida!5e0!3m2!1sid!2sid!4v1638249559340!5m2!1sid!2sid" width="100%" height="384" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          </div>

          <div class="col-lg-6">
            <form action="mailto:muhammadisak.rizki@gmail.com" method="post" enctype=”multipart/form-data” role="form" class="php-email-form">
              <div class="row">
                <div class="col form-group">
                  <input type="text" name="ContactName" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->    
@endsection