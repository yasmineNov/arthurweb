@extends('layouts.mainadmin')

@section('container')
<div id="layoutSidenav_content">
    <main>

        <div class="container-fluid px-4">
            <a class="btn btn-primary" href="/katalogproduk" role="button"><i class="fa-solid fa-circle-arrow-left"></i> Kembali</a>
            <h1 class="mt-4">Master Kategori</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item nav-link"><a href="/">Dashboard</a></li>
                <li class="breadcrumb-item active">kategori</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                      <!-- START FORM -->
                      @if ($errors->any())
                          <div class="pt-3">
                            <div class="alert alert-danger"><ul>
                                @foreach ($errors->all() as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>
                            
                          </div>
                      @endif
       <form  method='post' action='{{url('kategori')}}'>
        @csrf
        
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="mb-3 row">
                <label for="namaKategori" class="col-sm-2 col-form-label">Nama Kategori</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='namaKategori' id="namaKategori">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
            </div>
        </div>
    </form>
        <!-- AKHIR FORM -->

        {{-- <div class="card mb-4">
            <div class="card-header">
                @if (Session::has('success'))
            <div class="pt-3">
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            </div>
                
            @endif --}}
                {{-- <div class="d-sm-flex align-items-center justify-content-between">
                    <div><i class="fas fa-table me-1"></i>
                        Master Kategori
                    </div>
                </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            @foreach ($dataKategori as $item)
                            <tr>
                                <td>1</td>
                                <td>Outdoor</td>
                                <td>{{ $item->namaKategori }}</td>                         
                                <td>
                                    <a href='' class="btn btn-warning btn-sm">Edit</a>
                                <a href='' class="btn btn-danger btn-sm">Del</a>
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div> --}}


                </div>
            </div>
        </div>
    </main>
</div>
@endsection