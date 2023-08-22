@extends('layouts.main')

@section('container')
<div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0"><a href="/">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Artikel Single</strong></div>
      </div>
    </div>
  </div>

  {{-- @foreach ($data as $artikel)
  <div class="card mb-3">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="{{asset('storage/image-artikel/'.$artikel->img)}}" class="card-img-top" style="aspect-ratio: 11 / 8" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h3 class="card-title">{{$artikel->judul}}</h3>
          <p class="card-text">{{substr ($artikel->konten, 0,145)}}.....</p> 
          <a class="btn btn-info" href="{{ route('artikel.show',$artikel->idArtikel) }}">Read More</a>

        </div>
      </div>
    </div>
  </div>
  @endforeach --}}
  
  @foreach ($data as $artikel)
  <div class="card mb-3">
      <img src="{{asset('storage/image-artikel/'.$artikel->$idArtikel->img)}}" class="card-img-top" style="aspect-ratio: 11 / 8" alt="...">
      <div class="col-md-8">
        <div class="card-body">
          <h3 class="card-title">
            @if ($artikel->$idArtikel->img)
              <img src="{{ asset('storage/image-artikel/' . $artikel->img) }}" alt="Gambar artikel" width="100">
            @else
              <p>Tidak ada gambar</p>
            @endif
          </h3>
          <p class="card-text">{{ $artikel->$idArtikel->$judul }}</p>                
          <p class="card-text">{{ $artikel->$idArtikel->$konten }}</p>                
          <a class="btn btn-info" href="{{ route('artikel.show',$artikel->idArtikel) }}">Read More</a>
        </div>
      </div>
   </div>
   @endforeach




 <h1>Ini Adalah halaman Artikel single</h1>

 <article>
    <h2> Judul </h2>
    <h5> Author </h5>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. In eos tempore quasi rem, magni perferendis id quia quisquam et dignissimos expedita accusantium ipsam doloribus consequuntur reiciendis, beatae hic, nulla vero alias eveniet. Tempore voluptatem iusto nisi, dolorum nam quasi consequuntur ipsum iure quos enim, mollitia eos commodi dignissimos corrupti quisquam nesciunt, illo sapiente. Similique ratione quibusdam quos voluptate, doloremque nesciunt!</p>
 </article>

 <a href="/artikel">Kembali ke Semua Postingan</a>

@endsection