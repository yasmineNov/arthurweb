@extends('layouts.main')

@section('container')
    <!-- intro -->
    <section class="pt-3">
        <div class="container">
            <div class="row gx-3">
                {{-- <main class="col-lg-9">
                   
                </main> --}}
                <div class="slider">

                  @foreach ($dataSlider as $item)
                  <a href="{{ $item->url }}" class="card-banner-link">
                      <div class="card-banner p-5 bg-primary rounded-5"
                          style="height: 350px; background-image: url('{{ asset('storage/image-slider/' . $item->img) }}'); background-size: cover; background-position: center;">
                          {{-- <div style="max-width: 500px;">
                              <h2 class="text-white">
                                  {{ $item->judul }}
                              </h2>
                              <p class="text-white">{{ $item->body }}</p>
                              <button class="btn btn-light shadow-0 text-primary"> View more </button>
                          </div> --}}
                      </div>
                  </a>
              @endforeach

                </div>
            </div>
            <!-- row //end -->
        </div>
        <!-- container end.// -->
    </section>
    <!-- intro -->
    <section class="pt-5">
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
            <h3>Produk Terbaru</h3>
        </header>

        <div class="row">
            @foreach ($data1 as $item)
                <div class="col-lg-3 col-md-6 col-sm-6 d-flex">
                    <div class="card w-100 my-2 shadow-2-strong">
                        {{-- <img src="{{asset('storage/image-produk/'.$item->img)}}" class="card-img-top" style="aspect-ratio: 1 / 1" /> --}}
                        <img src="{{ asset('storage/image-produk/' . $item->img) }}" class="card-img-top"
                            style="aspect-ratio: 1 / 1" />
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $item->namaProduk }}</h5>
                            <p class="card-text text-primary">{{ $item->kategori->namaKategori }}</p>
                            @if (isset($item->varian[0]))
                                <h6 class="card-text text-danger">Rp
                                    @foreach ($item->varian as $i => $varian)
                                        {{ ($i == 0 ? ($varian->harga ) : $i + 1 == count($item->varian)) ? $varian->harga : '' }}
                                        @if ($i == 0)
                                         -
                                        @endif
                                    @endforeach
                                </h6>
                            @else
                                <h6 class="card-text text-danger">Rp {{ $item->harga }}</h6>
                            @endif
                            <div class="d-flex align-items-end pt-3 px-0 pb-0 mt-auto">
                                <a href="{{ route('produk.show', $item->idProduk) }}"
                                    class="btn btn-light shadow-0 me-1">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

    <!-- Features -->
    <section>
      <div class="container mb-5">
          <div class="card p-4 bg-primary">
              <div class="row align-items-center">
                  <div class="col">
                      <h4 class="mb-0 text-white">Semua Kategori Produk</h4>
                      <p class="mb-0 text-white-50">Temukan Produk Digital Printing yang ingin kamu cari</p>
                  </div>
                  <div class="col-auto"><a class="btn btn-white text-primary shadow-0" href="#">Discover</a></div>
              </div>
          </div>
      </div>
  </section>
  <!-- Features -->
    {{-- KATALOG --}}
    {{-- <div class="col-md-12 order-2">
      <div class="row">
          <div class="col-md-12 mb-0 d-flex justify-content-between">
              <div class="float-md-left mb-4">
                  @foreach ($kategori as $kategoriItem)
                      @php
                          $produkKategori = $katalog->where('idKategori', $kategoriItem->idKategori);
                      @endphp

                      @if ($produkKategori->count() > 0)
                          <h2 class="text-black">{{ $kategoriItem->namaKategori }}</h2>

                          <div class="row mb-5">
                              @foreach ($produkKategori as $produkItem)
                                          <div class="col-lg-3 col-md-6 col-sm-6 d-flex">
                                              <div class="card w-100 my-2 shadow-2-strong">
                                          <figure class="block-4-image">
                                              <img src="{{ asset('storage/image-produk/' . $produkItem->img) }}"
                                                  class="card-img-top" style="aspect-ratio: 1 / 1" />
                                          </figure>
                                          <div class="block-4-text p-4">
                                              <p class="mb-0 h-5">{{ $produkItem->namaProduk }}</p>
                                              </p>
                                              @if (isset($produkItem->varian[0]))
                                                  <h6 class="card-text text-danger">Rp
                                                      @foreach ($produkItem->varian as $i => $varian)
                                                          {{ ($i == 0 ? $varian->harga : $i + 1 == count($produkItem->varian)) ? $varian->harga : '' }}
                                                          @if ($i == 0)
                                                              -
                                                          @endif
                                                      @endforeach
                                                  </h6>
                                              @else
                                                  <h6 class="card-text text-danger">Rp {{ $produkItem->harga }}</h6>
                                              @endif
                                              <div class="d-flex align-items-end pt-3 px-0 pb-0 mt-auto">
                                                  <a href="{{ route('produk.show', $produkItem->idProduk) }}"
                                                      class="btn btn-light shadow-0 me-1">Detail</a>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              @endforeach
                          </div>
                      @endif
                  @endforeach



              </div>
          </div>
      </div>
  </div> --}}

  <div class="col-md-12 order-2">
    <div class="row">
        <div class="col-md-12 mb-0 d-flex justify-content-between">
            <div class="float-md-left mb-4">
                <!-- Mulai perulangan untuk setiap kategori -->
                @foreach ($kategori as $kategoriItem)
                    <h2 class="text-black">{{ $kategoriItem->namaKategori }}</h2>

                    <div class="row mb-5">
                        @foreach ($katalog as $produkItem)
                            {{-- Periksa apakah produk saat ini termasuk dalam kategori yang sedang diproses --}}
                            @if ($produkItem->kategori->idKategori == $kategoriItem->idKategori)
                                <div class="col-lg-3 col-md-6 col-sm-6 d-flex">
                                    <div class="card w-100 my-2 shadow-2-strong">
                                        <figure class="block-4-image">
                                            <img src="{{ asset('storage/image-produk/' . $produkItem->img) }}"
                                                class="card-img-top" style="aspect-ratio: 1 / 1" />
                                        </figure>
                                        <div class="block-4-text p-4">
                                            <p class="mb-0 h-5">{{ $produkItem->namaProduk }}</p>
                                            @if (isset($produkItem->varian[0]))
                                                <h6 class="card-text text-danger">Rp
                                                    @foreach ($produkItem->varian as $i => $varian)
                                                        {{ ($i == 0 ? $varian->harga : $i + 1 == count($produkItem->varian)) ? $varian->harga : '' }}
                                                        @if ($i == 0)
                                                            -
                                                        @endif
                                                    @endforeach
                                                </h6>
                                            @else
                                                <h6 class="card-text text-danger">Rp {{ $produkItem->harga }}</h6>
                                            @endif
                                            <div class="d-flex align-items-end pt-3 px-0 pb-0 mt-auto">
                                                <a href="{{ route('produk.show', $produkItem->idProduk) }}"
                                                    class="btn btn-light shadow-0 me-1">Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endforeach
                <!-- Akhiri perulangan untuk setiap kategori -->
            </div>
        </div>
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
    

    <!-- Recommended -->
    {{-- <section>
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
</section> --}}
    <!-- Recommended -->

<!-- Features -->
<section>
  <div class="container">
      <div class="card p-4 bg-primary">
          <div class="row align-items-center">
              <div class="col">
                  <h4 class="mb-0 text-white">Artikel Arthur</h4>
                  <p class="mb-0 text-white-50">Temukan Tips dan Artikel Seputar Digital Printing</p>
              </div>
              <div class="col-auto"><a class="btn btn-white text-primary shadow-0" href="#">Discover</a></div>
          </div>
      </div>
  </div>
</section>
<!-- Features -->

    {{-- blog --}}
    <section class="mt-5 mb-4">
        <div class="container text-dark">
            <header class="mb-4">
                <h3>Artikel</h3>
            </header>

            <div class="row">
                @foreach ($dataPost as $artikel)
                    <div class="col-lg-3 col-md-6 col-sm-6 d-flex">
                        <div class="card w-80 my-2 shadow-2-strong">
                            <a href="{{ route('artikel.show', $artikel->idArtikel) }}">
                                <img src="{{ asset('storage/image-artikel/' . $artikel->img) }}" class="card-img-top"
                                    style="aspect-ratio: 1 / 1" alt="...">
                            </a>
                            <div class="mt-2 text-muted small d-block mb-1">
                                <div class="card-body d-flex flex-column">
                                    <a href="{{ route('artikel.show', $artikel->idArtikel) }}">
                                        <h5 class="title-artikel text-center mt-2 mb-0">{{ $artikel->judul }}</h5>
                                    </a>
                                    <p class="text-center mt-0">{!! substr($artikel->konten, 0, 65) !!}.....</p>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@section('javascript')
    <script>
        $('.slider').slick({
            arrows: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            pauseOnHover: false,
        });
    </script>
@endsection
