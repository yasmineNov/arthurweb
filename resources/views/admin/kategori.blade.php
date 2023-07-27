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
    
    <div class="card mb-4">
        <div class="card-header d-sm-flex align-items-center justify-content-between">
            <div><i class="fas fa-table me-1"></i>
                Kategori
            </div>
            {{-- <a class="btn btn-primary" href='{{url('/tambahProduk')}}' role="button"><i class="fa-solid fa-plus"></i> Tambahkan Kategori</a> --}}
           <!-- Button trigger modal -->

           <!-- Modal -->
           <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kategori</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form  action='{{url('KategoriController')}}' method='POST'>
                        {{-- {{csrf_field()}} --}}
                        @csrf
                        <div class="mb-3">
                            <label>Nama Kategori</label>
                            <input type="text" name="namaKategori" class="form-control" placeholder="Masukkan Kategori Baru">
                          </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                        <button type="button" class="btn  btn-primary" href="{{ route('kategori.index') }}">Simpan</button>
                    </div>
                </div>
            </div>
    </div>

           <div class="container">
            @if(count($errors)>0)
    
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
    
            @if(\Session::has('sukses'))
                <div class="alert alert-success">
                    <p>{{ \Session::get('sukses')}}</p>
                </div>
            @endif
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" role="button">
                <i class="fa-solid fa-plus"></i> Tambahkan Kategori
                </button>
        </div>
            
  
            
        </div>
        <div class="card-body">
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>NamaKategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>NamaKategori</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($kategoris as $kategori)
                    <tr>
                        <td>{{ $kategori->idKategori }}</td>
                        <td>{{ $kategori->namaKategori }}</td>
                        <td>
                        <form action="{{ route('kategori.destroy',$kategori->idKategori) }}" method="Post">
                        <a class="btn btn-primary" href="{{ route('kategori.edit',$kategori->idKategori) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                        </form>   
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        {!! $kategoris->links() !!}    
        </div>
    </div>


                </div>
            </div>
        </div>
    </main>
</div>
@endsection