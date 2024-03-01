<footer class="site-footer border-top">
    <div class="container">
      <div class="row">
        
        <div class="col-md-6 col-lg-3">
          <div class="block-5 mb-5">
            <h3 class="footer-heading mb-4">Arthur Citra Media</h3>
            <ul class="list-unstyled">
              <li><a class="nav-link" href="{{ URL('/') }}">Home</a></li>
              <li><a class="nav-link" href="{{ URL('/frontartikel') }}">Artikel</a>
              <li><a class="nav-link"  href="{{URL('/kalkulator')}}">Kalkulator</a></li>
              <li><a class="nav-link" href="{{ URL('/about') }}">Tentang Kami</a></li>   
            </ul>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
          <h3 class="footer-heading mb-4">Sosial media</h3>
          <ul class="site-menu d-flex align-items-center justify-content-start" style="list-style: none; padding-left: 0;">
              <li><a class="nav-link text-dark" href="https://wa.me/087858860888"><img src="{{ asset('images/whatsapp.png') }}" style="width: 25px; height: 25px;"></a></li>
              <li><a class="nav-link text-dark" href="https://www.instagram.com/arthurcitramedia/"><img src="{{ asset('images/instagram.png') }}" style="width: 25px; height: 25px;"></a></li>
              <li><a class="nav-link text-dark" href="https://shopee.co.id/arthuradv?smtt=0.0.9"><img src="{{ asset('images/shopee.png') }}" style="width: 25px; height: 25px;"></a></li>
              <li><a class="nav-link text-dark" href="https://www.tokopedia.com/archive-arthuradv"><img src="{{ asset('images/tokped.png') }}" style="width: 25px; height: 25px;"></a></li>
          </ul>
      </div>
      
      
        <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
          <h3 class="footer-heading mb-4">Kategori</h3>
          <ul class="list-unstyled">
            {{-- @foreach ($data1 as $kategori)

               <li>{{ $kategori->namaKategori }}</li>    

             @endforeach
             --}}
          </ul>
          
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="block-5 mb-5">
            <h3 class="footer-heading mb-4">Contact Info</h3>
            <ul class="list-unstyled">
              <li class="address">Jl. Bratang Binangun No.9 Surabaya, Jawa Timur</li>
              <li class="phone"><a href="https://wa.me/087858860888">WA.0878-5886-0888</a></li>
              <li class="email">acmbratang@gmail.com</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row pt-5 mt-5 text-center">
        <div class="col-md-12">
          <p>
          Copyright By Arthur Citra Media
          </p>
        </div>
        
      </div>
    </div>
  </footer>