@extends('layouts.mainadmin')

@section('container')
<div id="layoutSidenav_content">
    <main>

        <div class="container-fluid px-4">
            <a class="btn btn-primary" href="/slider" role="button"><i class="fa-solid fa-circle-arrow-left"></i> Kembali</a>
            <h1 class="mt-4">tambahkan Slider</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item nav-link"><a href="/">Dashboard</a></li>
                <li class="breadcrumb-item active">tambahkan slider</li>
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
                    <form method='post' action='{{url('slider')}}' enctype="multipart/form-data">
                        @csrf

                        <div class="my-3 p-3 bg-body rounded shadow-sm">
        
                            <div class="mb-3 row">
                                <label for="image" class="col-sm-2 col-form-label">Gambar</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name='image' id="image">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name='judul' id="judul">
                                </div>
                            </div>
                            
                            <div class="mb-3 row">
                                <label for="url" class="col-sm-2 col-form-label">url</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name='url' id="url">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="body" class="col-sm-2 col-form-label">body</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name='body' id="body">
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