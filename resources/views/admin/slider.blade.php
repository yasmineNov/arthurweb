@extends('layouts.mainadmin')

@section('container')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Master Slider</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Slider</li>
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
                        <a class="btn btn-primary" href='{{url('/tambahProduk')}}' role="button"><i class="fa-solid fa-plus"></i> Tambahkan Slider</a>
                    </div>
                </div>
                
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>gambar</th>
                                <th>Judul</th>
                                <th>URL</th>
                                <th>isi</th>
                                
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>gambar</th>
                                <th>Judul</th>
                                <th>URL</th>
                                <th>isi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            
                            <tr>
                                
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>                        
                                <td>
                                    {{-- <form class='d-inline' action="{{ route('produk.destroy',$item->idProduk) }}" method="POST">
                                        @csrf
                                        <a href='{{ url('produk/'.$item->idProduk.'/edit')}}' class="btn btn-warning"><i class="fa fa-pencil">Edit</i></a>
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash">hapus</i></button>
                                    </form>   --}}
                                </td>
                            </tr>
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection