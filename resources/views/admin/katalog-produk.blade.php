@extends('layouts.mainadmin')

@section('container')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Master Katalog Produk</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Katalog Produk</li>
            </ol>
            <!-- <div class="card mb-4">
                            <div class="card-body">
                                DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
                                <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                                .
                            </div>
                        </div> -->
            <div class="card mb-4">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <div><i class="fas fa-table me-1"></i>
                            Katalog Produk
                        </div>
                        <a class="btn btn-primary" href="/tambahProduk" role="button"><i class="fa-solid fa-plus"></i> Tambahkan Produk</a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
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
                                <th>Nama Produk</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Deksripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Xbanner</td>
                                <td>Outdoor</td>
                                <td>40.000</td>
                                <td>ini adalah xbanner</td>                           
                                <td>
                                    <a href='' class="btn btn-warning btn-sm">Edit</a>
                                <a href='' class="btn btn-danger btn-sm">Del</a>
                                    
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    @endsection