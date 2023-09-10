<header class="header shop">
    {{-- topbar --}}
    <nav class="site-navigationtop navbar-light bg-light border-bottom" role="navigation">
        <div class="container d-md-block d-none">
        <!-- Konten container hanya akan muncul pada tampilan desktop -->
        <div class="row">
            <div class="col-md-6">
              <ul class="site-menu d-flex align-items-center justify-content-start">
                <li><a class="nav-link text-dark" href="https://wa.me/087858860888"><img src="{{asset('images/whatsapp.png')}}"></a></li>
                <li><a class="nav-link text-dark" href="https://www.instagram.com/arthurcitramedia/"><img src="{{asset('images/instagram.png')}}"></a></li>
                <li><a class="nav-link text-dark" href="https://shopee.co.id/arthuradv?smtt=0.0.9"><img src="{{asset('images/shopee.png')}}"></a></li>
                <li><a class="nav-link text-dark" href="https://www.tokopedia.com/archive-arthuradv"><img src="{{asset('images/tokped.png')}}"></a></li>
              </ul>
            </div>
            <div class="col-md-6">
              <ul class="site-menu d-flex align-items-center justify-content-end">
                @auth
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Hai! {{ auth()->user()->name }} 
                  </a>

                  @can('admin')
                  <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                  @endcan

                  {{-- <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li> --}}

                  <li><hr class="dropdown-divider"></li>
                    <form action="/logout" method="post">
                      @csrf
                        <button type="submit" class="dropdown-item">KELUAR</button>
                    </form>
                </li>
                @else
                <li><a class="btn btn-light" href="/login">Masuk</a></li>
                <li><a class="btn btn-primary" href="/register">Daftar</a></li>
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
  
                  <div class="col-6 col-md-4 order-3 order-md-3 d-flex flex-row-reverse text-right">
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
            <!-- Header Inner -->
      <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="container">
          <ul class="site-menu js-clone-nav d-none d-md-block">
            <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
            <li class="nav-item has-children">
              <a class="nav-link" href="/katalog">Katalog</a>
              <ul class="dropdown">
                <li class="has-children">
                  <a href="#">OUTDOOR</a>
      
                  <ul class="dropdown">
                    <li class="has-children">
                      <a href="#">BANNER</a>
                      <ul class="dropdown">
                        <li><a class="nav-link" href="/deskripsikatalog">V280gr</a></li>
                        <li><a href="#">V340gr</a></li>
                        <li><a href="#">K440gr</a></li>
                      </ul>
                    </li>
      
                    <li class="has-children">
                      <a href="#">BACKLITE</a>
                      <ul class="dropdown">
                        <li><a href="#">BL. CHINA</a></li>
                        <li><a href="#">BL. JERMAN</a></li>
                      </ul>
                    </li>
      
                    <li class="has-children">
                      <a href="#">STIKER OUTDOOR</a>
                      <ul class="dropdown">
                        <li><a href="#">ST. CAMEL OUTDOOR</a></li>
                        <li><a href="#">ST. ONEWAY OUTDOOR</a></li>
                      </ul>
                    </li>
      
                  </ul>
                </li>
                <li class="has-children">
                  <a href="#">INDOOR</a>
                  <ul class="dropdown">
                    <li class="has-children">
                      <a href="#">STIKER INDOOR</a>
                      <ul class="dropdown">
                        <li><a href="#">ST. CAMEL INDOOR</a></li>
                        <li><a href="#">ST. ONEWAY INDOOR</a></li>
                        <li><a href="#">ST. TRANSPARAN INDOOR</a></li>
                        <li><a href="#">ST. AVERY INDOOR</a></li>
                        <li><a href="#">ST. SANDBLAST INDOOR</a></li>
                      </ul>
                    </li>
                    <li class="has-children">
                      <a href="#">STIKER BACKLITE INDOOR</a>
                      <ul class="dropdown">
                        <li><a href="#">STB. CAMEL INDOOR</a></li>
                        <li><a href="#">STB. TRANSPARAN INDOOR</a></li>
                        <li><a href="#">STB. AVERY INDOOR</a></li>
                      </ul>
                    </li>
                    <li><a href="#">ALBATROS</a></li>
                    <li><a href="#">LUSTER</a></li>
                    <li><a href="#">DURATRAN</a></li>
                    <li><a href="#">KANVAS</a></li>
                  </ul>
                </li>
                <li class="has-children">
                  <a href="#">UV</a>
                  <ul class="dropdown">
                    <li><a href="#">ID CARD</a></li>
                    <li><a href="#">HUMAN STANDEE</a></li>
                    <li><a href="#">GANTUNGAN KUNCI</a></li>
                    <li><a href="#">NEONBOX</a></li>
                    <li><a href="#">OSCAR / CCI</a></li>
                  </ul>
                </li>
                <li class="has-children">
                  <a href="#">STANDING</a>
                  <ul class="dropdown">
                    <li><a href="#">XBANNER</a></li>
                    <li><a href="#">MINI XBANNER</a></li>
                    <li><a href="#">ROLL BANNER</a></li>
                    <li><a href="#">TRIPOD BANNER</a></li>
                  </ul>
                </li>
                <li class="has-children">
                  <a href="#">LASER CUTTING</a>
                  <ul class="dropdown">
                    <li><a href="#">AKRILIK</a></li>
                    <li><a href="#">MDF</a></li>
                    <li><a href="#">PLAKAT</a></li>
                  </ul>
                </li>
                <li class="has-children">
                  <a href="#">A3+</a>
                  <ul class="dropdown">
                    <li><a href="#">ARTPAPER</a></li>
                    <li><a href="#">STIKER PNC</a></li>
                    <li><a href="#">KARTU NAMA</a></li>
                    <li><a href="#">BROSUR</a></li>
                    <li><a href="#">TIKET GELANG</a></li>
                    <li><a href="#">POSTER</a></li>
                    <li><a href="#">SERTTIFIKAT</a></li>
                    <li><a href="#">VOUCHER & KUPON</a></li>
                    <li><a href="#">TENTCARD</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="nav-item has-children">
              <a class="nav-link" href="/frontartikel">Artikel</a>
              <ul class="dropdown">
                <li><a href="#">Menu One</a></li>
                <li><a href="#">Menu Two</a></li>
                <li><a href="#">Menu Three</a></li>
              </ul>
            </li>
      
            <li class="nav-item"><a class="nav-link" href="/about">Tentang Kami</a></li>
            <li class="nav-item"><a class="nav-link" href="/member">Member</a></li>
      
            <div class="d-md-none">
              <div class="row">
                <div class=" d-flex col-12 text-right">
                  <!-- <li><a class="nav-link" href="#"><img src="images/instagram.png" alt="Instagram"></a></li>
                  <li><a class="nav-link" href="#"><img src="images/tokped.png" alt="tiktok"></a></li>
                  <li><a class="nav-link" href="#"><img src="images/whatsapp.png" alt="whatsapp"></a></li>
                  <li><a class="nav-link" href="#"><img src="images/shopee.png" alt="shopee"></a></li> -->
                  <li class="nav-item"><a class="nav-link" href="https://wa.me/087858860888"><img src="images/whatsapp.png"></a></li>
                  <li class="nav-item"><a class="nav-link" href="https://www.instagram.com/arthurcitramedia/"><img src="images/instagram.png"></a></li>
                  <li class="nav-item"><a class="nav-link" href="https://shopee.co.id/arthuradv?smtt=0.0.9"><img src="images/shopee.png"></a></li>
                  <li class="nav-item"><a class="nav-link" href="https://www.tokopedia.com/archive-arthuradv"><img src="images/tokped.png"></a></li>
                </div>
                <div class="col-12 text-right mt-2">
                  <li class="nav-item"><a class="btn btn-light" href="/register">Daftar</a></li>
                  <li class="nav-item"><a class="btn btn-primary" href="/login">Masuk</a></li>
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
  
</script>
