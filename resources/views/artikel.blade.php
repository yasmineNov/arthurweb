@extends('layouts.main')

@section('container')

  <div class="site-section">
    <div class="container">

      <div class="row mb-5">
        <div class="col-md-9 order-2">

          <div class="row">
            <div class="col-md-12 mb-5">
              <div class="float-md-left mb-4"><h2 class="text-black h5">Semua Artikel</h2></div>
              <div class="d-flex">
                <div class="dropdown mr-1 ml-md-auto">
                  <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Latest
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                    <a class="dropdown-item" href="#">Men</a>
                    <a class="dropdown-item" href="#">Women</a>
                    <a class="dropdown-item" href="#">Children</a>
                  </div>
                </div>
                <div class="btn-group">
                  <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuReference" data-toggle="dropdown">Reference</button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                    <a class="dropdown-item" href="#">Relevance</a>
                    <a class="dropdown-item" href="#">Name, A to Z</a>
                    <a class="dropdown-item" href="#">Name, Z to A</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Price, low to high</a>
                    <a class="dropdown-item" href="#">Price, high to low</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-5">

          @foreach ($data2 as $artikel)
          <div class="card mb-3">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="{{asset('storage/image-artikel/'.$artikel->img)}}" class="card-img-top" style="aspect-ratio: 11 / 8" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h3 class="card-title">{{$artikel->judul}}</h3>
                  <p class="card-text">{{substr ($artikel->konten, 0,145)}}.....</p>                
                  {{-- <div class="text-right">
                    <h6 class="card-text" href="{{ route('artikel.edit',$artikel->idArtikel) }}"><small class="text-body-secondary">read more >>>>></small></h6>
                  </div> --}}
                  <a class="btn btn-info" href="{{ route('artikel.show',$artikel->idArtikel) }}">Read More</a>

                </div>
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
            <h3 class="mb-3 h6 text-uppercase text-black d-block">Kategori</h3>
            <ul class="list-unstyled mb-0">
              <li class="mb-1"><a href="#" class="d-flex"><span>Outdoor</span></li>
              <li class="mb-1"><a href="#" class="d-flex"><span>Indoor</span></li>
              <li class="mb-1"><a href="#" class="d-flex"><span>UV</span></a></li>
            </ul>
          </div>

          <div class="border p-4 rounded mb-4">
            <div class="mb-4">
              <h3 class="mb-3 h6 text-uppercase text-black d-block">Recent Post</h3>
              
              @foreach ($data2 as $artikel)
              <p><i class="fa fa-star"></i>    {{$artikel->judul}}</p>
              @endforeach

          </div>
        </div>
      </div>
      
    </div>
  </div>

@endsection


