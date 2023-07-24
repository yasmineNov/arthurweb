@extends('layouts.mainadmin')

@section('container')
<div id="layoutSidenav_content">
    <main>

        <div class="container-fluid px-4">
            <a class="btn btn-primary" href="/katalogproduk" role="button"><i class="fa-solid fa-circle-arrow-left"></i> Kembali</a>
            <h1 class="mt-4">tambahkan produk</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item nav-link"><a href="/">Dashboard</a></li>
                <li class="breadcrumb-item active">tambahkan produk</li>
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
                    <form method='post' action='{{url('produk')}}'>
                        @csrf

                        <div class="my-3 p-3 bg-body rounded shadow-sm">
                            {{-- <div class="mb-3 row">
                <label for="idProduk" class="col-sm-2 col-form-label">Id Produk</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name='idProduk' id="idProduk">
                </div>
            </div> --}}
            
                            <div class="mb-3 row">
                                <label for="namaProduk" class="col-sm-2 col-form-label">Nama Produk</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name='namaProduk' id="namaProduk">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="kategori" class="col-sm-2 col-form-label">kategori</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name='kategori' id="kategori" aria-label="Default select example">
                                        <option selected>Pilih Kategori</option>
                                        <option value="1">Indoor</option>
                                        <option value="2">Outdoor</option>
                                        <option value="3">UV</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="harga" class="col-sm-2 col-form-label">harga</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name='harga' id="harga">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="deskripsi" class="col-sm-2 col-form-label">deskripsi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name='deskripsi' id="deskripsi">
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