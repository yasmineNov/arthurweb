@extends('layouts.mainadmin')

@section('container')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Master Toko</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item nav-link"><a href="/">Dashboard</a></li>
                <li class="breadcrumb-item active">Toko</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <td>Nama Toko</td>
                                <td>Alamat Toko</td>
                                <td>whatsapp</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input placeholder="Nama Toko"></td>
                                <td><input placeholder="Alamat Toko"></td>
                                <td><input placeholder="Whatsapp"></td>
                                <td><button class="btn btn-primary"><i class="fa fa-pencil"></i> Update Data</button></td>
                            </tr>
                            </form>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </main>
</div>
@endsection