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

  <div class="text-center title-artikel mt-5 mb-3">
    <h1>{{$artikel->judul}}</h1>
  </div>
  <div class="text-center mt-4 mb-3">             
    <img src="{{asset('storage/image-artikel/'.$artikel->img)}}" style="aspect-ratio: 11 / 8" class="img-artikel" alt="...">
  </div>
  <div class="text-right text-black mb-5">
    <p class="detail-artikel">{!!($artikel->konten)!!}</p>
  </div>
 @endsection