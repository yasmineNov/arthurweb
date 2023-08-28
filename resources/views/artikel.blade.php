@extends('layouts.main')

@section('container')
<div class="bg-light py-3">
  <div class="container">
    <div class="row">
      <div class="col-md-12 mb-0"><a href="/">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Artikel</strong></div>
    </div>
  </div>
</div>

    <div class="container">

      <div class="row mt-3 mb-0">
        <div class="col-md-9 order-2">

          <div class="row">
            <div class="col-md-12 mb-5">
              <div class="text-center"><h5 class="text-black h2">Postingan Artikel</h5></div>
            </div>
          </div>
          <div class="row mb-5">

          @foreach ($data2 as $artikel)
            <div class="row g-0 mb-4">
              <div class="col-md-4 d-flex align-items-center justify-content-center">
                <img src="{{asset('storage/image-artikel/'.$artikel->img)}}" class="img-artikel" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title mb-0">{{$artikel->judul}}</h5>
                  <p class="card-text mt-0"><br>{!!substr ($artikel->konten, 0,145)!!}.....<br></p>         
                  <div class="d-flex flex-row-reverse">
                    <a class="btn btn-primary" href="{{ route('artikel.show',$artikel->idArtikel) }}">Selengkapnya</a>
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


@endsection


