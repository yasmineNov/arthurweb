@extends('layouts.mainadmin')

@section('container')
<div id="layoutSidenav_content">
    <main>

        <div class="container-fluid px-4">
            <a class="btn btn-primary" href="/katalogproduk" role="button"><i class="fa-solid fa-circle-arrow-left"></i> Kembali</a>
            <h1 class="mt-4">edit produk</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item nav-link"><a href="/">Dashboard</a></li>
                <li class="breadcrumb-item active">edit produk</li>
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
                    <form method='post' action='{{url('produk/'.$data->idProduk)}}' enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="my-3 p-3 bg-body rounded shadow-sm">
                            <div class="mb-3 row">
                                <label for="image" class="col-sm-2 col-form-label">Gambar</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name='image' id="image">
                                    <p></p>
                                    @if ($data->img)
                                        <img src="{{ asset('storage/image-produk/' . $data->img) }}" alt="Gambar Produk" width="100">
                                    @else
                                        <p>Tidak ada gambar</p>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="namaProduk" class="col-sm-2 col-form-label">Nama Produk</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name='namaProduk' value="{{ $data->namaProduk }}" id="namaProduk">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="kategori" class="col-sm-2 col-form-label">kategori</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name='kategori'>
                                        <option selected>Pilih Kategori</option>
                                        {{-- @foreach ($kategori as $item)
                                        <option value="{{$item->idKategori}}">{{$item->namaKategori}}</option>
                                        @endforeach --}}
                                        @foreach ($kategori as $item)
                                        <option value="{{$item->idKategori}}" @if($data->idKategori == $item->idKategori) selected @endif>{{$item->namaKategori}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="gramasi" class="col-sm-2 col-form-label">Gramasi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name='gramasi' value="{{ $data->gramasi }}"  id="gramasi">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="jenis" class="col-sm-2 col-form-label">jenis</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name='jenis' value="{{ $data->jenis }}"  id="jenis">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="harga" class="col-sm-2 col-form-label">harga</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name='harga' value="{{ $data->harga }}"  id="harga">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="deskripsi" class="col-sm-2 col-form-label">deskripsi</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name='deskripsi' id="deskripsi" rows="5">{{ $data->deskripsi }}</textarea>
                                    {{-- <input type="text" class="form-control" name='deskripsi' value="{{ $data->deskripsi }}"  id="deskripsi"> --}}
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