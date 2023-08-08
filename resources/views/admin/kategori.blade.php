@extends('layouts.mainadmin')

@section('container')
<div id="layoutSidenav_content">
    <main>

        <div class="container-fluid px-4">
            <h1 class="mt-4">Master Kategori</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item nav-link"><a href="/">Dashboard</a></li>
                <li class="breadcrumb-item active">kategori</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
    
    <div class="card mb-4">
        <div class="card-header d-sm-flex align-items-center justify-content-between">
            <div>Kategori</div>
            <a class="btn btn-primary" href='{{url('tambahKategori')}}' role="button"><i class="fa-solid fa-plus"></i> Tambahkan Kategori</a>
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
                        <th>Nama Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Nama Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $i = $data->firstItem() ?>
                    @foreach ($data as $kategori)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $kategori->namaKategori }}</td>
                        <td>
                        <form action="{{ route('kategori.destroy',$kategori->idKategori) }}" method="POST">
   
                        {{-- <a class="btn btn-info" href="{{ route('kategori.show',$kategori->idKategori) }}">Show</a> --}}

                        <a class="btn btn-warning" href="{{ route('kategori.edit',$kategori->idKategori) }}"><i class="fa fa-pencil"></i>   Edit</a>
               
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>   Delete</button>
                        </form>
                         
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        {!! $data->links() !!}    
        </div>
    </div>


                </div>
            </div>
        </div>
    </main>
</div>
@endsection