@extends('layouts.main')

@section('container')
<div class="bg-light py-3">
  <div class="container">
    <div class="row">
      <div class="col-md-12 mb-0"><a href="/">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Artikel</strong></div>
    </div>
  </div>
</div>

    <div class="container mb-5">
      <div class="row mt-5 mb-0">

        {{-- Kolom artikel Start --}}
        <div class="col-md-9 order-2">
          <div class="row">
            <div class="col-md-12 mb-2">
              <div class="text-right"><h2 class="text-black h2">Postingan Artikel</h2></div>
            </div>
          </div>
          <div class="row mb-5">

          @foreach ($data2 as $artikel)
          <div class="border-bottom">
            <div class="row g-0 mb-3">
              <div class="col-md-4 mt-3 d-flex align-items-center justify-content-center">
                <a href="{{ route('artikel.show',$artikel->idArtikel) }}">
                  <img src="{{asset('storage/image-artikel/'.$artikel->img)}}" class="img-artikel" style="aspect-ratio: 1 / 1" alt="...">
                </a>
              </div>
              <div class="col-md-8 mt-2">
                <div class="card-body d-flex flex-column">
                  <a href="{{ route('artikel.show',$artikel->idArtikel) }}">
                    <h2 class="title-artikel text-center mb-0">{{$artikel->judul}}</h2>
                  </a>  
                  <p class="card-text mt-0">{!!substr ($artikel->konten, 0,175)!!}.....<br></p> 
                         
                  {{-- <div class="d-flex flex-row-reverse">
                    <a class="btn btn-primary" href="{{ route('artikel.show',$artikel->idArtikel) }}">Selengkapnya</a>
                </div> --}}
                </div>
                {{-- <p class="text-center">___________________________________________________________</p>  --}}
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
        {{-- kolom artikel end --}}

        {{-- Kolom samping --}}
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
        {{-- kolom samping end --}}

      </div>
    </div>


@endsection


