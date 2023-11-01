<!DOCTYPE html>
<html lang="en">

<head>
    <title>ACM &mdash; {{ $title }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('https://fonts.googleapis.com/css?family=Mukta:300,400,700') }}">
    <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/slick-1.8.1/slick/slick.css') }}"/>

    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="css/style.css"> --}}

    {{-- google fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400&display=swap" rel="stylesheet">



</head>

<body>

    <div class="site-wrap ">
        @include('layouts/header')

        {{-- container dibawah ini adalah sebuah tempat yang menampung variabel yang berisi bahan utama yg berbeda2 yang hanya ditampung di main.blade.php --}}
        <div class='container mt-4'>
            @yield('container')
        </div>

        @include('partials.footer')

    </div>
    <script src="{{ asset('assets/slick-1.8.1/slick/slick.min.js') }}"></script>
    {{-- <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script> --}}
    <script src="js/jquery-ui.js"></script>
    <script src="{{ asset('assets/js/cdn.jsdelivr.net_npm_vue@2.6.14_dist_vue.js') }}"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/main.js"></script>
    @yield('javascript')
    {{-- <script>
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
      // JavaScript
document.addEventListener("DOMContentLoaded", function () {
    // Ambil semua elemen tautan menu
    const menuLinks = document.querySelectorAll(".nav-link");

    // Loop melalui setiap tautan menu
    menuLinks.forEach(link => {
        // Jika URL halaman saat ini cocok dengan tautan, tambahkan kelas "active"
        if (link.getAttribute("href") === window.location.pathname) {
            link.classList.add("active");
        }
    });
});

  </script> --}}
</body>

</html>
