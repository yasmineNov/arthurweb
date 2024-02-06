@extends('layouts.main')

@section('container')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="/">Home</a> <span class="mx-2 mb-0">/</span> <strong
                        class="text-black">Katalog Produk</strong></div>
            </div>
        </div>
    </div>
    <div class="site-section">
        <div class="container">
            <div class="row mb-5">
                {{-- <div class="col-md-9 order-2">

          <div class="col-md-3 order-1 mb-5 mb-md-0"> --}}
                {{-- <div class="border p-4 rounded mb-4">
              <h3 class="mb-3 h6 text-uppercase text-black d-block">PROMO</h3>
              <ul class="list-unstyled mb-0">
                <li class="mb-1"><a href="#" class="d-flex"><span>Men</span> <span class="text-black ml-auto">(2,220)</span></a></li>
                <li class="mb-1"><a href="#" class="d-flex"><span>Women</span> <span class="text-black ml-auto">(2,550)</span></a></li>
                <li class="mb-1"><a href="#" class="d-flex"><span>Children</span> <span class="text-black ml-auto">(2,124)</span></a></li>
              </ul>
            </div> --}}

                {{-- <div class="border p-4 rounded mb-4">
              <h3 class="mb-3 h6 text-uppercase text-black d-block">KATEGORI</h3>
              <ul class="list-group list-group-flush">
                @foreach ($kategori as $item)

                <li class="list-group-item">{{$item->namaKategori}}</li>
                @endforeach
              </ul>
            </div>
          </div> --}}
            </div>

            {{-- SEMUA KATEGORI --}}
            {{-- <div class="col-md-12 order-2">
                <div class="row">
                    <div class="col-md-12 mb-0 d-flex justify-content-between">
                        <div class="float-md-left mb-4">
                            <h2 class="text-black">Semua Kategori</h2>
                        </div>
                    </div>
                </div>
                <div class="row mb-5">
                    @foreach ($katalog as $item)
                                <div class="col-lg-3 col-md-6 col-sm-6 d-flex">
                                    <div class="card w-100 my-2 shadow-2-strong">
                                <figure class="block-4-image">
                                    <img src="{{ asset('storage/image-produk/' . $item->img) }}" class="card-img-top"
                                        style="aspect-ratio: 1 / 1" />
                                </figure>
                                <div class="block-4-text p-4">

                                    <p class="mb-0 h-5">{!! substr($item->namaProduk, 0, 25) !!}</p>
                                    @if (isset($item->varian[0]))
                                        <h6 class="card-text text-danger">Rp
                                            @foreach ($item->varian as $i => $varian)
                                                {{ ($i == 0 ? $varian->harga : $i + 1 == count($item->varian)) ? $varian->harga : '' }}
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
            </div> --}}


            <div class="col-md-12 order-2">
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
                                            {{-- <div class="col-sm-6 col-lg-3 mb-4" data-aos="fade-up">
                                                <div class="block-2 text-center border"> --}}
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
            </div>

        </div>
    </div>
@endsection
