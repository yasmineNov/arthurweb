@extends('layouts.mainadmin')

@section('container')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Master Katalog Produk</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Katalog Produk</li>
               <li>
                
            </li>
            </ol>
        
            <div class="card mb-4">
                <div class="card-header">
                    @if (Session::has('success'))
                    <div class="pt-3">
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    </div>
                    @endif
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <div><i class="fas fa-table me-1"></i>
                            Katalog Produk
                        </div>
                        <a class="btn btn-primary" href='{{url('/tambahProduk')}}' role="button"><i class="fa-solid fa-plus"></i> Tambahkan Produk</a>
                    </div>
                </div>
                
    <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar </th>
                                <th>Nama Produk</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Deksripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Deksripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $i = $data->firstItem() ?>
                            @foreach ($data as $item)
                            <tr>
                                <td>{{ $i }}</td>
                                <td><img src="{{asset('storage/image-produk/'.$item->img)}}" alt="" width="100"></td>
                                <td>{{ $item->namaProduk }}</td>
                                <td>{{ $item->kategori }}</td>
                                <td>{{ $item->harga }}</td>
                                <td>{{ $item->deskripsi }}</td>                           
                                <td>
                                    <a href='{{ url('produk/'.$item->idProduk.'/edit')}}' class="btn btn-warning btn-sm">Edit</a>
                                <form class='d-inline' action="{{ route('produk.destroy',$item->idProduk) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>  
                                </td>
                            </tr>
                            <?php $i++ ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    @endsection