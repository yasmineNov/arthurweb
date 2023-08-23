<!DOCTYPE html>
<html lang="en">

<head>
  <title>ACM &mdash; {{$title}}</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="{{asset('https://fonts.googleapis.com/css?family=Mukta:300,400,700')}}">
  <link rel="stylesheet" href="{{asset('fonts/icomoon/style.css')}}">

  <link rel="stylesheet" href="{{asset('assets/fontawesome/css/all.min.css')}} ">
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
  <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}">
  <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/aos.css')}}">
  
  <!-- CSS Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  {{-- <link rel="stylesheet" href="css/style.css"> --}}

</head>

<body>
  @include('partials.topnav')

  <div class="site-wrap">

    <nav id="navbar_top" class=" ">
      <div class="container-fluid">
        <header class="site-navbar" role="banner">
          <div class="site-navbar-top">
            <div class="container">
              <div class="row align-items-center">

                <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
                  <form action="" class="site-block-top-search">
                    <span class="icon icon-search2"></span>
                    <input type="text" class="form-control border-0" placeholder="Search">
                  </form>
                </div>

                <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
                  <div class="site-logo">
                    <a class="nav-link" href="/" class="js-logo-clone">
                      <img src=" {{ asset('images/acmLogo.png') }}" alt="Image" class="img-fluid rounded mb-3">
                    </a>
                  </div>
                </div>

                <div class="col-6 col-md-4 order-3 order-md-3 text-right">
                  <div class="site-top-icons">
                    <ul>
                      <li><a href="#"><span class="icon icon-person"></span></a></li>
                      <li><a href="#"><span class="icon icon-heart-o"></span></a></li>
                      <li>
                        <a href="/keranjang" class="site-cart">
                          <span class="icon icon-shopping_cart"></span>
                          <span class="count">2</span>
                        </a>
                      </li>
                      {{-- <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li> --}}
                    </ul>
                  </div>
                </div>

              </div>
            </div>
          </div>

          <div class="md-right text-right">
            <div class="site-top-icons">
              <ul>
                <li class="d-inline-block d-md-none ml-md-right"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
              </ul>
            </div>
          </div>

          @include('partials.navbar')
        </header>
      </div>
    </nav>
    {{-- container dibawah ini adalah sebuah tempat yang menampung variabel yang berisi bahan utama yg berbeda2 yang hanya ditampung di main.blade.php --}}
    <div class='container mt-4'>
      @yield('container')
    </div>

    @include('partials.footer')

  </div>
  
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {

      window.addEventListener('scroll', function() {

        if (window.scrollY > 50) {
          document.getElementById('navbar_top').classList.add('fixed-top');
          // add padding top to show content behind navbar
          navbar_height = document.querySelector('.navbar').offsetHeight;
          document.body.style.paddingTop = navbar_height + 'px';
        } else {
          document.getElementById('navbar_top').classList.remove('fixed-top');
          // remove padding top from body
          document.body.style.paddingTop = '0';
        }
      });
    });
  </script>
</body>

</html>