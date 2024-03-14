@extends('layouts.main')

@section('container')
<div class="bg-light py-3">
  <div class="container">
    <div class="row">
      <div class="col-md-12 mb-0"><a href="/">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">About</strong></div>
    </div>
  </div>
</div>

{{-- <div class="text-center title text-uppercase mt-4 mb-0"><h1>Tentang Kami</h1></div>
<div class="site-section site-blocks-2">
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="100">
        <a class="block-2-item" href="#">
          <figure class="image">
            <img src="images/pict1.jpg" alt="" class="img-fluid">
          </figure>
        </a>
      </div>
      <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="100">
        <a class="block-2-item" href="#">
          <figure class="image">
            <img src="images/pict2.jpg" alt="" class="img-fluid">
          </figure>         
        </a>
      </div>
      <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="200">
        <a class="block-2-item" href="#">
          <figure class="image">
            <img src="images/pict3.jpg" alt="" class="img-fluid">
          </figure>
        </a>
      </div>
    </div>
  </div>
</div> --}}

  {{-- <div class="site-section site-section-sm site-blocks-1"> --}}
      <div class="container mt-5">
          <div class="row">
              <div class="col-md-6 col-lg-6 mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
              {{-- <div class="col-md-6 col-lg-6 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay=""> --}}
                  <div>
                      <a href="#">
                          <img src="images/pict1.jpg" alt="" class="img-fluid">
                      </a>
                      <span><span><span>
                  </div>
              </div>
              <div class="col-md-6 col-lg-6 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
                  <div>
                    <br><br><br>
                    <header>
                      <h1>Sekilas Tentang Kami </h1>
                    </header>
                    <div class="font-weight-bold text-justify">
                    <p>Arthur Citra Media merupakan salah satu penyedia jasa periklanan elektronik dan non-elektronik nasional yang berdiri sejak 2018. Filosofi kami adalah untuk menjawab tantangan dan menjadi salah satu solusi kebutuhan industri periklanan Indonesia yang selalu berkembang akhir- akhir ini.</p>
                  </div>
                  </div>
              </div>
          </div>
      </div>
  {{-- </div> --}}

  {{-- <div class="site-section site-section-sm site-blocks-1"> --}}
    <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-6 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
            <div>
              <br><br><br>
              <h2 class="sub-title mt-3 mb-1">Visi</h2>
              <p>Menjadi solusi patner periklanan kreatif dan terpercaya di indonesia</p>
              <h2 class="sub-title mt-3 mb-1">Misi</h2>
    <p class="text-justify">1. Menyediakan solusi kreatif periklanan dengan harga yang kompetitif dan tetap mengandalkan kualitas.<br>2. Membangun Kemitraan jangka panjang dengan patner bisnis kami dengan landasan kepercayaan dan saling menguntungkan.<br>3. Menyediakan tempat dan budaya kerja yang kondusif.<br>4. Partisipatif dalam pembangunan ekonomi Indonesia.</p>
            </div>
        </div>
            <div class="col-md-6 col-lg-6 mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
                <div>
                  <br>
                    <a href="#">
                        <img src="images/pict2.jpg" alt="" class="img-fluid">
                    </a>
                    <span><span><span>
                </div>
            </div>
            
        </div>
    </div>
{{-- </div> --}}

<section class="bg-section1 mt-5 pt-5">
  <div class="mt-2 text-center">
      <h1>MENGAPA MEMILIH KAMI ? </h1>
  </div>
  <div class="site-section site-section-sm site-blocks-1">
      <div class="container">
          <div class="row">
              <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
                  <div class="icon mr-4 align-self-start">
                      <span class="fa-solid fa-tag"></span>
                  </div>
                  <div class="text">
                      <h2 class="text-uppercase">Harga Termurah</h2>
                      <p>Arthur sering banget ngadain promo tiap event besar loh!! jadi pantengin terus web dan sosmed
                          kami & jangan sampai kalian ketinggalan promonya ya!</p>
                  </div>
              </div>
              <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
                  <div class="icon mr-4 align-self-start">
                      <span class="fa-solid fa-palette"></span>
                  </div>
                  <div class="text">
                      <h2 class="text-uppercase">Warna Terjamin</h2>
                      <p>Warna pudar & bergaris? Nggak banget kan! kami berani jamin deh kalian nggak akan nemuin
                          kejadian kayak gitu kalau kalian pakai jasa printing kami</p>
                  </div>
              </div>
              <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
                  <div class="icon mr-4 align-self-start">
                      <span class="fa-solid fa-circle-check"></span>
                  </div>
                  <div class="text">
                      <h2 class="text-uppercase">Kualitas Terjaga</h2>
                      <p>Temukan cacat saat serah terima barang? Kami akan dengan senang hati melayani & menerima
                          komplain kalian. jadi masih ragu cetak di Arthur?</p>
                  </div>
              </div>
          </div>
      </div>
  </div>

</section>

<div class="text text-center mb-4">
  <h2 class="sub-title text-uppercase mt-3 mb-3">Lokasi</h2>
  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d31658.956388491606!2d112.7281303!3d-7.3123165!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb35c6e838c1%3A0xe95770d2b91ea8d0!2sArthur%20Citra%20Media!5e0!3m2!1sid!2sid!4v1690739281585!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  <h5 class="mt-3 mb-3">Jl. Bratang Binangun No.9 Surabaya</h5>
</div>

              
@endsection