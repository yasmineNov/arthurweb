@extends('layouts.main')

@section('container')
<div class="bg-light py-3">
  <div class="container">
    <div class="row">
      <div class="col-md-12 mb-0"><a href="/">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">About</strong></div>
    </div>
  </div>
</div>

{{-- <div class="container text-center mt-3 mb-3">
  <img src="images/home1.jpg" alt="Digital Printing" width="700">
</div>   --}}
<div class="text-center title text-uppercase mt-4 mb-0"><h1>Tentang Kami</h1></div>
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
</div>

<div class="text-center title text-uppercase mt-4 mb-3"><h1>arthur citra Media</h1></div>
<div class="text-center des-title mb-0">
  <h5>Arthur Citra Media merupakan salah satu penyedia jasa periklanan elektronik dan non-elektronik nasional yang berdiri sejak 2018. Filosofi kami adalah untuk menjawab tantangan dan menjadi salah satu solusi kebutuhan industri periklanan Indonesia yang selalu berkembang akhir- akhir ini.</h5>
</div>
  <div class="container">
        <div class="text text-center mb-4">
            <h2 class="sub-title text-uppercase mt-3 mb-3">Visi</h2>
            <h5>Menjadi solusi patner periklanan kreatif dan terpercaya di indonesia</h5>
        </div>
        <div class="text">
          <h2 class="text-center sub-title text-uppercase mt-3 mb-3">Misi</h2>
          <h5 class="text-justify">1. Menyediakan solusi kreatif periklanan dengan harga yang kompetitif dan tetap mengandalkan kualitas.</h5>
          <h5>2. Membangun Kemitraan jangka panjang dengan patner bisnis kami dengan landasan kepercayaan dan saling menguntungkan.</h5>
          <h5>3. Menyediakan tempat dan budaya kerja yang kondusif.</h5>
          <h5>4. Partisipatif dalam pembangunan ekonomi Indonesia.</h5>
        </div>
      </div>
  </div>
</div>

<div class="text text-center mb-4">
  <h2 class="sub-title text-uppercase mt-3 mb-3">Lokasi</h2>
  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d31658.956388491606!2d112.7281303!3d-7.3123165!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb35c6e838c1%3A0xe95770d2b91ea8d0!2sArthur%20Citra%20Media!5e0!3m2!1sid!2sid!4v1690739281585!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

              
@endsection