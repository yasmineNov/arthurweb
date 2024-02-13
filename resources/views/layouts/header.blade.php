<header class="header shop">
    {{-- topbar --}}
    <nav class="site-navigationtop navbar-light bg-light border-bottom" role="navigation">
        <div class="container d-md-block d-none">
            <!-- Konten container hanya akan muncul pada tampilan desktop -->
            <div class="row">
                <div class="col-md-6">
                    <ul class="site-menu d-flex align-items-center justify-content-start">
                        <li><a class="nav-link text-dark" href="https://wa.me/087858860888"><img
                                    src="{{ asset('images/whatsapp.png') }}"></a></li>
                        <li><a class="nav-link text-dark" href="https://www.instagram.com/arthurcitramedia/"><img
                                    src="{{ asset('images/instagram.png') }}"></a></li>
                        <li><a class="nav-link text-dark" href="https://shopee.co.id/arthuradv?smtt=0.0.9"><img
                                    src="{{ asset('images/shopee.png') }}"></a></li>
                        <li><a class="nav-link text-dark" href="https://www.tokopedia.com/archive-arthuradv"><img
                                    src="{{ asset('images/tokped.png') }}"></a></li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="site-menu d-flex align-items-center justify-content-end">
                        @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Hai! {{ auth()->user()->name }}
                                </a>
                                {{-- <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Hai! {{ auth()->user()->name }}
                  </a> --}}

                                @can('admin')
                                <li><a class="dropdown-item" href="{{ URL('/dashboard') }}">Dashboard</a></li>
                            @endcan

                            {{-- <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li> --}}

                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <form action="{{URL('/logout')}}" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item">KELUAR</button>
                            </form>
                            </li>
                        @else
                            <li><a class="btn btn-light" href="{{ URL('/login') }}">Masuk</a></li>
                            <li><a class="btn btn-primary" href="{{ URL('/register') }}">Daftar</a></li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    {{-- end topbar --}}

    {{-- middle navbar --}}
    <nav id="navbar_top" class=" ">
        <div class="container-fluid">
            <header class="site-navbar" role="banner">
                <div class="site-navbar-top">
                    <div class="container">
                        <div class="row align-items-center">

                            <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
                                <div class="row">

                                    <form action='{{url('search')}}'  method="GET" class="site-block-top-search">
                                        <ul class="site-menu d-flex align-items-center justify-content-start">
                                            <input type="text" class="form-control border-0" name="query"
                                                placeholder="Cari Produk">
                                            <button type="submit" class="btn btn-link"><i
                                                    class="icon icon-search2"></i></button>
                                        </ul>

                                    </form>
                                </div>
                            </div>

                            <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
                                <div class="site-logo">
                                    <a class="nav-link" href="{{ URL('/') }}" class="js-logo-clone">
                                        <img src=" {{ asset('images/acmLogo.png') }}" alt="Image"
                                            class="img-fluid rounded mb-3">
                                    </a>
                                </div>
                            </div>

                            <div class="col-6 col-md-4 order-3 order-md-3 d-flex flex-row-reverse text-right">
                                <div class="site-top-icons">
                                    {{-- @can('guest') --}}
                                    @if (Route::has('login'))
                                        @auth
                                            <ul>
                                                <li><a href="#"><span class="icon icon-person"></span></a></li>
                                                <li><a href="#"><span class="icon icon-heart-o"></span></a></li>
                                                <li>
                                                    <a href="{{ URL('/keranjang') }}"  class="site-cart">
                                                        <span class="icon icon-shopping_cart">
                                                        </span>
                                                        {{-- <span class="count">{{ Cart::getTotalQuantity()}}</span> --}}
                                                        <span class="count">{{ $count }}</span>
                                                    </a>
                                                </li>
                                                {{-- <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li> --}}
                                            </ul>
                                        @endauth
                                    @else
                                        <ul>
                                            <li><a href="#"><span class="icon icon-person"></span></a></li>
                                            <li><a href="#"><span class="icon icon-heart-o"></span></a></li>
                                            <li>
                                                <a href="{{ URL('/keranjang') }}" class="site-cart">
                                                    <span class="icon icon-shopping_cart">
                                                    </span>
                                                    {{-- <span class="count">{{ Cart::getTotalQuantity()}}</span> --}}
                                                    <span class="count">0</span>
                                                </a>
                                    @endif
                                    {{-- @endcan --}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="md-right text-right">
                    <div class="site-top-icons">
                        <ul>
                            <li class="d-inline-block d-md-none ml-md-right"><a href="#"
                                    class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
                        </ul>
                    </div>
                </div>
                <!-- Header Inner -->
                <nav class="site-navigation text-right text-md-center" role="navigation">
                    <div class="container">
                        <ul class="site-menu js-clone-nav d-none d-md-block">
                            <li class="nav-item"><a class="nav-link" href="{{ URL('/') }}">Home</a></li>
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="{{ URL('/katalog') }}">Katalog</a>
                            </li> --}}
                            <li class="nav-item">
                                <a class="nav-link" href="{{ URL('/frontartikel') }}">Artikel</a>
                            </li>

                            <li class="nav-item"><a class="nav-link"  href="{{URL('/kalkulator')}}">Kalkulator</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ URL('/about') }}">Tentang Kami</a></li>

                            <div class="d-md-none">
                                <div class="row">
                                    <div class=" d-flex col-12 text-right">
                                        <!-- <li><a class="nav-link" href="#"><img src="images/instagram.png" alt="Instagram"></a></li>
                  <li><a class="nav-link" href="#"><img src="images/tokped.png" alt="tiktok"></a></li>
                  <li><a class="nav-link" href="#"><img src="images/whatsapp.png" alt="whatsapp"></a></li>
                  <li><a class="nav-link" href="#"><img src="images/shopee.png" alt="shopee"></a></li> -->
                                        <li class="nav-item"><a class="nav-link"
                                                href="https://wa.me/087858860888"><img src="images/whatsapp.png"></a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link"
                                                href="https://www.instagram.com/arthurcitramedia/"><img
                                                    src="images/instagram.png"></a></li>
                                        <li class="nav-item"><a class="nav-link"
                                                href="https://shopee.co.id/arthuradv?smtt=0.0.9"><img
                                                    src="images/shopee.png"></a></li>
                                        <li class="nav-item"><a class="nav-link"
                                                href="https://www.tokopedia.com/archive-arthuradv"><img
                                                    src="images/tokped.png"></a></li>
                                    </div>
                                    <div class="col-12 text-right mt-2">
                                        <li class="nav-item"><a class="btn btn-light" href="{{ URL('/register') }}">Daftar</a>
                                        </li>
                                        <li class="nav-item"><a class="btn btn-primary" href="{{ URL('/login') }}">Masuk</a></li>
                                    </div>
                                </div>
                            </div>
                        </ul>
                    </div>
                </nav>
                {{-- end header inner --}}
            </header>
        </div>
    </nav>
    {{-- end middle navbar --}}


</header>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const navItems = document.querySelectorAll(".nav-item");

        navItems.forEach(navItem => {
            navItem.addEventListener("mouseenter", function() {
                this.classList.add("hovered");
            });

            navItem.addEventListener("mouseleave", function() {
                this.classList.remove("hovered");
            });
        });
    });

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
    document.addEventListener("DOMContentLoaded", function() {
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
</script>
