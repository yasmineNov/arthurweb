@extends('layouts.mainadmin')

@section('container')
<div id="layoutSidenav_content">
    <main>

        <div class="container-fluid px-4">
            <a class="btn btn-primary" href='{{url('slider')}}'role="button"><i class="fa-solid fa-circle-arrow-left"></i> Kembali</a>
            <h1 class="mt-4">Edit Slider</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item nav-link"><a href="/">Dashboard</a></li>
                <li class="breadcrumb-item active">Edit slider</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <!-- START FORM -->
                    @if ($errors->any())
                    <div class="pt-3">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $item)
                                <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                    
                    <div class="my-3 p-3 bg-body rounded shadow-sm">
                    @endif
                    <form method='post' action='{{ url('slider/' . $data->idSlide) }}' enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="my-3 p-3 bg-body rounded shadow-sm">
                            <div class="mb-3 row">
                                <label for="image" class="col-sm-2 col-form-label">Gambar</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name='image' id="image">
                                    <p></p>
                                    @if ($data->img)
                                        <img src="{{ asset('storage/image-slider/' . $data->img) }}" alt="Gambar Produk" width="100">
                                    @else
                                        <p>Tidak ada gambar</p>
                                    @endif
                                </div>
                            </div>
                          
                            <div class="mb-3 row">
                                <label for="url" class="col-sm-2 col-form-label">url</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name='url' value="{{ $data->url }}"id="url">
                                </div>
                            </div>
                      
                            <div class="mb-3 row">
                                <label for="jurusan" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
                            </div>

                        </div>
                    </form>
                    <!-- AKHIR FORM -->
                </div>
            </div>
        </div>
    </main>
</div>
@endsection