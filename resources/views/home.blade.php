@extends('layouts.main')

@section('container')
{{-- CAROUSEL START --}}

{{-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="images/yellow.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/red.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/blue.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div> --}}

{{-- CAROUSEL END --}}

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="jumbotron">
        <h1 class="display-4">SEMANGAT NGERJAIN WEB NYA!!</h1>
        <p class="lead">Yuk bisa yuk, selesai sesuai dateline :v </p>
        <hr class="my-4">
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
      </div>
    </div>
    <div class="carousel-item">
      <div class="jumbotron">
        <h1 class="display-4">IYA TAU, AGAK MUMET EMANG.. TAPI KUDU SEMANGAT & NIAT !!</h1>
        {{-- <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p> --}}
        <hr class="my-4"> 
        <p>It uses utility classes for typography</p> 
      </div>
    </div>
    <div class="carousel-item">
      <div class="jumbotron">
        <h1 class="display-4">PROMO 3</h1>
        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
        <hr class="my-4">
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<div class="mt-2 text-center"><h1>MENGAPA MEMILIH KAMI ? </h1></div>
<div class="site-section site-section-sm site-blocks-1">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
        <div class="icon mr-4 align-self-start">
          <span class="fa-solid fa-tag"></span>
        </div>
        <div class="text">
          <h2 class="text-uppercase">Harga Termurah</h2>
          <p>Arthur sering banget ngadain promo tiap event besar loh!! jadi pantengin terus web dan sosmed kami & jangan sampai kalian ketinggalan promonya ya!</p>
        </div>
      </div>
      <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
        <div class="icon mr-4 align-self-start">
          <span class="fa-solid fa-palette"></span>
        </div>
        <div class="text">
          <h2 class="text-uppercase">Warna Terjamin</h2>
          <p>Warna pudar & bergaris? Nggak banget kan! kami berani jamin deh kalian nggak akan nemuin kejadian kayak gitu kalau kalian pakai jasa printing kami</p>
        </div>
      </div>
      <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
        <div class="icon mr-4 align-self-start">
          <span class="fa-solid fa-circle-check"></span>
        </div>
        <div class="text">
          <h2 class="text-uppercase">Kualitas Terjaga</h2>
          <p>Temukan cacat saat serah terima barang? Kami akan dengan senang hati melayani & menerima komplain kalian. jadi masih ragu cetak di Arthur?</p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="site-section site-blocks-2">
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="100">
        <a class="block-2-item" href="#">
          <figure class="image">
            <img src="images/women.jpg" alt="" class="img-fluid">
          </figure>
          <div class="text">
            <span class="text-uppercase">Kategori</span>
            <h3>Indoor</h3>
          </div>
        </a>
      </div>
      <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="100">
        <a class="block-2-item" href="#">
          <figure class="image">
            <img src="images/children.jpg" alt="" class="img-fluid">
          </figure>
          <div class="text">
            <span class="text-uppercase">Kategori</span>
            <h3>Indoor</h3>
          </div>
        </a>
      </div>
      <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="200">
        <a class="block-2-item" href="#">
          <figure class="image">
            <img src="images/men.jpg" alt="" class="img-fluid">
          </figure>
          <div class="text">
            <span class="text-uppercase">Kategori</span>
            <h3>UV</h3>
          </div>
        </a>
      </div>

      <div class="col-sm-6 col-md-6 col-lg-4 mt-3 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="200">
        <a class="block-2-item" href="#">
          <figure class="image">
            <img src="images/women.jpg" alt="" class="img-fluid">
          </figure>
          <div class="text">
            <span class="text-uppercase">Kategori</span>
            <h3>A3</h3>
          </div>
        </a>
      </div>
      <div class="col-sm-6 col-md-6 col-lg-4 mt-3 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="200">
        <a class="block-2-item" href="#">
          <figure class="image">
            <img src="images/children.jpg" alt="" class="img-fluid">
          </figure>
          <div class="text">
            <span class="text-uppercase">Kategori</span>
            <h3>DTF</h3>
          </div>
        </a>
      </div>
      <div class="col-sm-6 col-md-6 col-lg-4 mt-3 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="200">
        <a class="block-2-item" href="#">
          <figure class="image">
            <img src="images/men.jpg" alt="" class="img-fluid">
          </figure>
          <div class="text">
            <span class="text-uppercase">Kategori</span>
            <h3>Produk Custom</h3>
          </div>
        </a>
      </div>
    </div>
  </div>
</div>

{{-- <div class="site-section block-3 site-blocks-2 bg-light">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-7 site-section-heading text-center pt-4">
        <h2>Featured Products</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="nonloop-block-3 owl-carousel">

            @foreach ($data1 as $item)
            <div class="card">
              <div class="image"><img src="{{asset('storage/image-produk/'.$item->img)}}" alt="" width="100"></div>
              <span class="title">{{ $item->namaProduk }}</span>
              <span class="price">{{ $item->harga }}</span>
            </div>
            @endforeach

          </div>
        </div>
      </div>
    </div>
  </div> --}}

  <div class="container my-5">
    <header class="mb-4">
      <h3>New products</h3>
    </header>

    <div class="row">
      @foreach ($data1 as $item)
      <div class="col-lg-3 col-md-6 col-sm-6 d-flex">
        <div class="card w-100 my-2 shadow-2-strong">
          <img src="{{asset('storage/image-produk/'.$item->img)}}" class="card-img-top" style="aspect-ratio: 1 / 1" />
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">{{ $item->namaProduk }}</h5>
            <p class="card-text">{{ $item->kategori->namaKategori }}</p>
            <p class="card-text">{{ $item->harga }}</p>
            <div class="card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto">
              <a href="#!" class="btn btn-primary shadow-0 me-1">Add to cart</a>
              <a href="#!" class="btn btn-light border px-2 pt-2 icon-hover"><i class="fas fa-heart fa-lg text-secondary px-1"></i></a>
            </div>
          </div>
        </div>
      </div>    
      @endforeach

    </div>
  </div>

<div class="site-section block-8">
  <div class="container">
    <div class="row justify-content-center  mb-5">
      <div class="col-md-7 site-section-heading text-center pt-4">
        <h2>Big Sale!</h2>
      </div>
    </div>
    <div class="row align-items-center">
      <div class="col-md-12 col-lg-7 mb-5">
        <a href="#"><img src="images/blog_1.jpg" alt="Image placeholder" class="img-fluid rounded"></a>
      </div>
      <div class="col-md-12 col-lg-5 text-center pl-md-5">
        <h2><a href="#">50% less in all items</a></h2>
        <p class="post-meta mb-4">By <a href="#">Carl Smith</a> <span class="block-8-sep">&bullet;</span> September 3, 2018</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam iste dolor accusantium facere corporis ipsum animi deleniti fugiat. Ex, veniam?</p>
        <p><a href="#" class="btn btn-primary btn-sm">Shop Now</a></p>
      </div>
    </div>
  </div>
</div>
@endsection