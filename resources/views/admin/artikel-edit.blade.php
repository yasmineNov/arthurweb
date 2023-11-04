@extends('layouts.mainadmin')

@section('container')
<div id="layoutSidenav_content">
    <main>

        <div class="container-fluid px-4">
            <a class="btn btn-primary" href="{{ URL('/artikelAdmin') }}" role="button"><i class="fa-solid fa-circle-arrow-left"></i> Kembali</a>
            <h1 class="mt-4">tambahkan Artikel</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item nav-link"><a href="{{ URL('/dashboard') }}" >Dashboard</a></li>
                <li class="breadcrumb-item active">tambahkan Artikel</li>
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
                    @endif
                    <form method='post' action='{{url('artikel', $data->idArtikel)}}' enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="my-3 p-3 bg-body rounded shadow-sm">
                           <div class="mb-3 row">
                                <label for="image" class="col-sm-2 col-form-label">Gambar</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name='image' id="image">
                                    <p></p>
                                    @if ($data->img)
                                        <img src="{{ asset('storage/image-artikel/' . $data->img) }}" alt="Gambar artikel" width="100">
                                    @else
                                        <p>Tidak ada gambar</p>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name='judul' value="{{ $data->judul }}"  id="judul">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="harga" class="col-sm-2 col-form-label">konten</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" name='konten' id="konten">{{ $data->konten }}</textarea>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="jurusan" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">Update</button></div>
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