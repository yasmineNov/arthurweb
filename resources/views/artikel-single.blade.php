@extends('layouts.main')

@section('container')
<div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0"><a href="{{ URL('/') }}" >Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Artikel Single</strong>
        </div>
      </div>
    </div>
  </div>
  {{-- <a class="btn btn-primary mt-3" href="/frontartikel" role="button"><i class="fa-solid fa-circle-arrow-left"></i> Kembali</a> --}}

  <div class="container mb-5">
    <div class="row mt-5 mb-0">
    {{-- Kolom samping --}}
      <div class="col-md-3 order-1 mb-5 mb-md-0">
        <div class="border p-4 rounded mb-4">
          <div class="mb-4">
            <h3 class="mb-3 h6 text-uppercase text-black d-block">Recent Post</h3>
      
              @foreach ($data2 as $artikel)
              <p><i class="fa fa-star"></i>    {{$artikel->judul}}</p>
              @endforeach

          </div>
        </div>
      </div>
    {{-- kolom samping end --}}
    <div class="col-md-9 order-2">
        <div class="article-center title-artikel mb-3">
          <h1>{{$artikel->judul}}</h1>
        </div>
        <div class="text-centre article-center mt-4 mb-3">             
          <img src="{{asset('storage/image-artikel/'.$artikel->img)}}" class="article-img" alt="...">
        </div>
      <div class="text-black mb-5 article-center">
        <p>{!!($artikel->konten)!!}</p>
      </div>
    </div>
    </div>
</div>
 @endsection