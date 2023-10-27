@extends('layouts.main')

@section('container')
<!-- intro -->
<section class="pt-3">
  <div class="container">
    <div class="row gx-3">
      <main class="col-lg-9">
        <div class="slider">

          <div class="card-banner p-5 bg-primary rounded-5" style="height: 350px;">
            <div style="max-width: 500px;">
              <h2 class="text-white">
                Great products with <br />
                best deals
              </h2>
              <p class="text-white">No matter how far along you are in your sophistication as an amateur astronomer, there is always one.</p>
              <a href="#" class="btn btn-light shadow-0 text-primary"> View more </a>
            </div>
          </div>

          <div class="card-banner p-5 bg-danger rounded-5" style="height: 350px;">
            <div style="max-width: 500px;">
              <h2 class="text-white">
                Great products with <br />
                best deals
              </h2>
              <p class="text-white">No matter how far along you are in your sophistication as an amateur astronomer, there is always one.</p>
              <a href="#" class="btn btn-light shadow-0 text-primary"> View more </a>
            </div>
          </div>

          <div class="card-banner p-5 bg-warning rounded-5" style="height: 350px;">
            <div style="max-width: 500px;">
              <h2 class="text-white">
                Great products with <br />
                best deals
              </h2>
              <p class="text-white">No matter how far along you are in your sophistication as an amateur astronomer, there is always one.</p>
              <a href="#" class="btn btn-light shadow-0 text-primary"> View more </a>
            </div>
          </div>
        </div>
      </main>
      <aside class="col-lg-3">
        <div class="card-banner h-100 rounded-5" style="background-color: #f87217;">
          <div class="card-body text-center pb-5">
            <h5 class="pt-5 text-white">Amazing Gifts</h5>
            <p class="text-white">No matter how far along you are in your sophistication</p>
            <a href="#" class="btn btn-outline-light"> View more </a>
          </div>
        </div>
      </aside>
    </div>
    <!-- row //end -->
  </div>
  <!-- container end.// -->
</section>
<!-- intro --> 
<section class="pt-5">
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

</section>

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
      <h3>Best Seller Items</h3>
    </header>

    <div class="row">
      @foreach ($data1 as $item)
      <div class="col-lg-3 col-md-6 col-sm-6 d-flex">
        <div class="card w-100 my-2 shadow-2-strong">
          <img src="{{asset('storage/image-produk/'.$item->img)}}" class="card-img-top" style="aspect-ratio: 1 / 1" />
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">{{ $item->namaProduk }}</h5>
            <p class="card-text text-primary">{{ $item->kategori->namaKategori }}</p>
            <h6 class="card-text text-danger">Rp {{ $item->harga }}</h6>
            <div class="d-flex align-items-end pt-3 px-0 pb-0 mt-auto">
              
            <form action="{{url('cart', $item->idProduk)}}" method="POST">
              @csrf
              <input type="hidden" name="_method" value="POST"> <!-- Perbarui method menjadi POST -->
              <input class="btn btn-primary shadow-0 me-1" type="submit" value="add cart">
            </form>

              <a href="{{ route('produk.show', $item->idProduk) }}" class="btn btn-light shadow-0 me-1">Detail</a>
            </div>
          </div>
        </div>
      </div>    
      @endforeach

    </div>
  </div>

{{-- <div class="site-section block-8">
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
</div> --}}
<!-- Features -->
<section>
  <div class="container">
    <div class="card p-4 bg-primary">
      <div class="row align-items-center">
        <div class="col">
          <h4 class="mb-0 text-white">Best products and brands in store</h4>
          <p class="mb-0 text-white-50">Trendy products and text to build on the card title</p>
        </div>
        <div class="col-auto"><a class="btn btn-white text-primary shadow-0" href="#">Discover</a></div>
      </div>
    </div>
  </div>
</section>
<!-- Features -->

<!-- Recommended -->
<section>
  <div class="container my-5">
    <header class="mb-4">
      <h3>Promo Items</h3>
    </header>

    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card my-2 shadow-0">
          <a href="#" class="">
            <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/9.webp" class="card-img-top rounded-2" style="aspect-ratio: 1 / 1"/>
          </a>
          <div class="card-body p-0 pt-3">
            <a href="#!" class="btn btn-light border px-2 pt-2 float-end icon-hover"><i class="fas fa-heart fa-lg px-1 text-secondary"></i></a>
            <h5 class="card-title">$17.00</h5>
            <p class="card-text mb-0">Blue jeans shorts for men</p>
            <p class="text-muted">
              Sizes: S, M, XL
            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card my-2 shadow-0">
          <a href="#" class="">
            <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/10.webp" class="card-img-top rounded-2"style="aspect-ratio: 1 / 1" />
          </a>
          <div class="card-body p-0 pt-2">
            <a href="#!" class="btn btn-light border px-2 pt-2 float-end icon-hover"><i class="fas fa-heart fa-lg px-1 text-secondary"></i></a>
            <h5 class="card-title">$9.50</h5>
            <p class="card-text mb-0">Slim fit T-shirt for men</p>
            <p class="text-muted">
              Sizes: S, M, XL
            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card my-2 shadow-0">
          <a href="#" class="">
            <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/11.webp" class="card-img-top rounded-2" style="aspect-ratio: 1 / 1"/>
          </a>
          <div class="card-body p-0 pt-2">
            <a href="#!" class="btn btn-light border px-2 pt-2 float-end icon-hover"><i class="fas fa-heart fa-lg px-1 text-secondary"></i></a>
            <h5 class="card-title">$29.95</h5>
            <p class="card-text mb-0">Modern product name here</p>
            <p class="text-muted">
              Sizes: S, M, XL
            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card my-2 shadow-0">
          <a href="#" class="">
            <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/12.webp" class="card-img-top rounded-2" style="aspect-ratio: 1 / 1"/>
          </a>
          <div class="card-body p-0 pt-2">
            <a href="#!" class="btn btn-light border px-2 pt-2 float-end icon-hover"><i class="fas fa-heart fa-lg px-1 text-secondary"></i></a>
            <h5 class="card-title">$29.95</h5>
            <p class="card-text mb-0">Modern product name here</p>
            <p class="text-muted">
              Material: Jeans
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Recommended -->

{{-- blog --}}
<section class="mt-5 mb-4">
  <div class="container text-dark">
    <header class="mb-4">
      <h3>Artikel</h3>
    </header>

    <div class="row">
      {{-- <div class="col-12"> --}}
        {{-- <br class="d-flex flex-row flex-nowrap overflow-auto"> --}}
        {{-- <div class="d-flex justify-content-center"> --}}
            @foreach ($dataPost as $artikel)
              <div class="col-lg-3 col-md-6 col-sm-6 d-flex">
                <div class="card w-80 my-2 shadow-2-strong">
                  <a href="{{ route('artikel.show',$artikel->idArtikel) }}">
                    <img src="{{asset('storage/image-artikel/'.$artikel->img)}}" class="card-img-top" style="aspect-ratio: 1 / 1" alt="...">
                  </a>
                  {{-- <div class="mt-2 text-muted small d-block mb-1">
                    <span>
                      <i class="fa fa-calendar-alt fa-sm"></i>
                        23.12.2022
                      </span> --}}
                  <div class="card-body d-flex flex-column">
                  <a href="{{ route('artikel.show',$artikel->idArtikel) }}">
                    <h5 class="title-artikel text-center mt-2 mb-0">{{$artikel->judul}}</h5>
                  </a>
                  <p class="text-center mt-0">{!!substr ($artikel->konten, 0,65)!!}.....</p> 
                  </div>
                </div>
              </div>
              <br>
            @endforeach 
        {{-- </div>  --}}
      {{-- </div> --}}
    </div>
      <!-- col.// -->
      {{-- <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <article>
          <a href="#" class="img-fluid">
            <img class="rounded w-100" src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/posts/2.webp" style="object-fit: cover;" height="160" />
          </a>
          <div class="mt-2 text-muted small d-block mb-1">
            <span>
              <i class="fa fa-calendar-alt fa-sm"></i>
              13.12.2022
            </span>
            <a href="#"><h6 class="text-dark">How we handle shipping</h6></a>
            <p>When you enter into any new area of science, you almost reach</p>
          </div>
        </article>
      </div>
      <!-- col.// -->
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <article>
          <a href="#" class="img-fluid">
            <img class="rounded w-100" src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/posts/3.webp" style="object-fit: cover;" height="160" />
          </a>
          <div class="mt-2 text-muted small d-block mb-1">
            <span>
              <i class="fa fa-calendar-alt fa-sm"></i>
              25.11.2022
            </span>
            <a href="#"><h6 class="text-dark">How to promote brands</h6></a>
            <p>When you enter into any new area of science, you almost reach</p>
          </div>
        </article>
      </div> --}}
      <!-- col.// -->
      {{-- <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <article>
          <a href="#" class="img-fluid">
            <img class="rounded w-100" src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/posts/4.webp" style="object-fit: cover;" height="160" />
          </a>
          <div class="mt-2 text-muted small d-block mb-1">
            <span>
              <i class="fa fa-calendar-alt fa-sm"></i>
              03.09.2022
            </span>
            <a href="#"><h6 class="text-dark">Success story of sellers</h6></a>
            <p>When you enter into any new area of science, you almost reach</p>
          </div>
        </article>
      </div> --}}
    </div>
  </div>
</section>
@endsection

@section('javascript')
    <script>
        $('.slider').slick({
        arrows : false,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        pauseOnHover: false,
        });
    </script>
@endsection