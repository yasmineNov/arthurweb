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
                    <label for="formFileSm" class="form-label">Tambahkan foto</label>
                    <input class="form-control form-control-sm" id="formFileSm" type="file" />
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama produk</label>
                        <input class="form-control" type="text" placeholder="Default input">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">kategori</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Deskripsi</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection