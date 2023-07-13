@extends('layouts.main')

@section('container')
<div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0"><a href="/">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Artikel</strong></div>
      </div>
    </div>
  </div>

  @foreach ($posts as $post)
      <article class="mb-5 mt-5">
      <h2>
        <a href="/artikel/{{ $post["slug"]}}">{{ $post["title"] }}</a>
      </h2>
      <h5>by: {{ $post["author"] }}</h5>
      <p>{{ $post["body"] }}</p>
  </article>  
  @endforeach

@endsection


