@extends('layouts.main')

@section('container')
    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="/">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Katalog Produk</strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">

        <div class="row mb-5">
          <div class="col-md-9 order-2">

            <div class="row">
              <div class="col-md-12 mb-0 d-flex justify-content-between">
                <div class="float-md-left mb-4">
                  <h2 class="text-black">Semua Kategori</h2>
                </div>
              </div>
            </div>
            <div class="row mb-5">

              @foreach ($katalog as $item)
              <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                <div class="block-4 text-center border">
                  <figure class="block-4-image">
                    <img src="{{asset('storage/image-produk/'.$item->img)}}" class="card-img-top" style="aspect-ratio: 1 / 1" />
                  </figure>
                  <div class="block-4-text p-4">
                    {{-- <h3><a href="shop-single.html">{{$katalog->img}}</a></h3> --}}
                    
                    <p class="mb-0">{{$item->namaProduk}}</p>
                    <p class="text-primary font-weight-bold">{{$item->harga}}</p>
                  </div>
                </div>
              </div>
              
              @endforeach
            </div>
            <div class="row" data-aos="fade-up">
              <div class="col-md-12 text-center">
                <div class="site-block-27">
                  <ul>
                    <li><a href="#">&lt;</a></li>
                    <li class="active"><span>1</span></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">&gt;</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3 order-1 mb-5 mb-md-0">
            <div class="border p-4 rounded mb-4">
              <h3 class="mb-3 h6 text-uppercase text-black d-block">PROMO</h3>
              <ul class="list-unstyled mb-0">
                <li class="mb-1"><a href="#" class="d-flex"><span>Men</span> <span class="text-black ml-auto">(2,220)</span></a></li>
                <li class="mb-1"><a href="#" class="d-flex"><span>Women</span> <span class="text-black ml-auto">(2,550)</span></a></li>
                <li class="mb-1"><a href="#" class="d-flex"><span>Children</span> <span class="text-black ml-auto">(2,124)</span></a></li>
              </ul>
            </div>

            <div class="border p-4 rounded mb-4">
              <h3 class="mb-3 h6 text-uppercase text-black d-block">KATEGORI</h3>
              <ul class="list-group list-group-flush">
                @foreach ($kategori as $item) 
                
                <li class="list-group-item">{{$item->namaKategori}}</li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>        

        <div class="col-md-9 order-2">
          <div class="row">
            <div class="col-md-12 mb-0 d-flex justify-content-between">
              <div class="float-md-left mb-4">
                <h2 class="text-black">Semua Kategori</h2>
              </div>
            </div>
          </div>
          <div class="row mb-5">
            @foreach ($katalog as $item)
            <div class="col-sm-6 col-lg-3 mb-4" data-aos="fade-up">
            <div class="block-2 text-center border">
                <figure class="block-4-image">
                  <img src="{{asset('storage/image-produk/'.$item->img)}}" class="card-img-top" style="aspect-ratio: 1 / 1" />
                </figure>
                <div class="block-4-text p-4">
                  
                  <p class="mb-0 h-5">{{$item->namaProduk}}</p>
                  <p class="text-primary font-weight-bold">{{$item->harga}}</p>
                </div>
              </div>
            </div>          
            @endforeach
          </div>
        </div>


        <div class="col-md-9 order-2">
          <div class="row">
            <div class="col-md-12 mb-0 d-flex justify-content-between">
              <div class="float-md-left mb-4">
                @if ($item != null)
                  @foreach ($kategori as $item) 
                  <h2 class="text-black">{{$item->namaKategori}}</h2>

                  <div class="row mb-5">
                    @foreach ($katalog as $item)
                    <div class="col-sm-6 col-lg-3 mb-4" data-aos="fade-up">
                    <div class="block-2 text-center border">
                        <figure class="block-4-image">
                          <img src="{{asset('storage/image-produk/'.$item->img)}}" class="card-img-top" style="aspect-ratio: 1 / 1" />
                        </figure>
                        <div class="block-4-text p-4">
                          
                          <p class="mb-0 h-5">{{$item->namaProduk}}</p>
                          <p class="text-primary font-weight-bold">{{$item->harga}}</p>
                        </div>
                      </div>
                    </div>          
                    @endforeach
                  </div>
                  @endforeach
                
                @else
                    <h2>nothing!!</h2>
                
                @endif

                

              </div>
            </div>
          </div>  
        </div>

      </div>
    </div>

@endsection