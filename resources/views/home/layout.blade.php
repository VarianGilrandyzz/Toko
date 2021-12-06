<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="{{ asset('/vendor/fontawesome-free/css/all.min.css') }}">
  <link href="{{ asset('/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  {{-- <link href="{{ asset('/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet"> --}}
  <link href="{{ asset('/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/custom.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: BizLand - v3.7.0
  * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">contact@example.com</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>+1 5589 55488 55</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.html">Ladida<span>.</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt=""></a>-->

      @include('componen.navbar')

    </div>
  </header>
  <!-- End Header -->

  @yield('body')

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Toko Ladida<span>.</span></h3>
            <p>
              Jl. Kyai Ghozali, RT.01/RW.03, 
              Rogotrunan, Kec. Lumajang, 
              Kabupaten Lumajang, 
              Jawa Timur 67316 <br><br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Produk</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Layanan</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Bantuan</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Kontak</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Cek Pemesanan</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Other Link</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('login') }}">Admin Area</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Social Networks</h4>
            <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong><span>BizLand</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bizland-bootstrap-business-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('/vendor/waypoints/noframework.waypoints.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('/js/main.js') }}"></script>

  <script src="{{ asset('/js/cart.js') }}"></script>
  <script src="{{ asset('/js/custom.js') }}"></script>
  <script>
    const cart = new Cart();
    updateIconCart(cart.cartCount());
  </script>

  @yield('js')

</body>

</html>