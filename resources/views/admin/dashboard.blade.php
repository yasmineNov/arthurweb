@extends('layouts.mainadmin')

@section('container')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-0">
                <h1 class="mt-1">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div> 
                                <h3 class="ml-5" style="font-weight: 800; font-size: 1.56rem">Customer</h3>
                                <p  style="font-weight: 300; font-size: 1.56rem">{{$user}}</p>
                                </div>
                                <div><i class="fa-solid fa-users fa-2xl" style="color: #ffffff;"></i></div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">Lihat Detail</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div> 
                                <h3 class="ml-5" style="font-weight: 800; font-size: 1.56rem">Artikel</h3>
                                <p  style="font-weight: 300; font-size: 1.56rem">{{$artikel}}</p>
                                </div>
                                <i class="fa-solid fa-pen-to-square fa-2xl" style="color: #ffffff;"></i>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">Lihat Detail</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div> 
                                <h3 class="ml-5" style="font-weight: 800; font-size: 1.56rem">Kategori</h3>
                                <p  style="font-weight: 300; font-size: 1.56rem">{{$kategori}}</p>
                                </div>
                                <i class="fa-solid fa-list fa-2xl" style="color: #ffffff;"></i>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">Lihat Detail</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div> 
                                <h3 class="ml-5" style="font-weight: 800; font-size: 1.56rem">Produk</h3>
                                <p  style="font-weight: 300; font-size: 1.56rem">{{$produk}}</p>
                                </div>
                                <i class="fa-solid fa-file-circle-check fa-2xl" style="color: #ffffff;"></i>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">Lihat Detail</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area me-1"></i>
                                Kategori
                            </div>
                            <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Kategori</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Kategori</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php $i = $data->firstItem() ?>
                                    @foreach ($data as $kategori)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $kategori->namaKategori }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card mb-8">
                            <a class="nav-link" href="{{ URL('/') }}" class="js-logo-clone">
                                <img src=" {{ asset('\images\bisnis-dashboard.png') }}" alt="Image"
                                    class="img-fluid rounded mb-3">
                            </a>
                            {{-- <div class="card-header">
                                <i class="fas fa-chart-bar me-1"></i>
                                Bar Chart Example
                            </div>
                            <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div> --}}

                        </div>
                    </div>
                </div>
            </div>
        </main>
    @endsection
