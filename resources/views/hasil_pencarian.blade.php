@extends('layouts.main')

@section('container')
<div class="bg-light py-3">
  <div class="container">
    <div class="row">
      <div class="col-md-12 mb-0"><a href="/">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Hasil Pencarian</strong></div>
    </div>
  </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12">
                <h2 class="text-black">Hasil Pencarian untuk "{{ $query }}"</h2>
            </div>
        </div>

        <div class="row mb-5">
            @if ($produk->count() > 0)
                @foreach ($produk as $item)
                    <div class="col-sm-6 col-lg-3 mb-4" data-aos="fade-up">
                        <div class="block-2 text-center border">
                            <figure class="block-4-image">
                                <img src="{{ asset('storage/image-produk/' . $item->img) }}" class="card-img-top" style="aspect-ratio: 1 / 1" />
                            </figure>
                            <div class="block-4-text p-4">
                                <p class="mb-0 h-5">{{ $item->namaProduk }}</p>
                                <p class="text-primary font-weight-bold">{{ $item->harga }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-md-12">
                    <p>Tidak ada produk yang sesuai dengan kata kunci pencarian.</p>
                </div>
            @endif
        </div>
    </div>
</div>


@endsection


