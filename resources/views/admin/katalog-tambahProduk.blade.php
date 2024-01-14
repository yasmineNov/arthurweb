@extends('layouts.mainadmin')

@section('container')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <a class="btn btn-primary" href="{{ URL('/katalogproduk') }}" role="button"><i
                        class="fa-solid fa-circle-arrow-left"></i> Kembali</a>
                <h1 class="mt-4">tambahkan produk</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item nav-link"><a href="{{ URL('/') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">tambahkan produk</li>
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
                        <form method='post' action='{{ url('produk') }}' enctype="multipart/form-data">
                            @csrf

                            <div class="my-3 p-3 bg-body rounded shadow-sm">
                                {{-- <div class="mb-3 row">
                <label for="idProduk" class="col-sm-2 col-form-label">Id Produk</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name='idProduk' id="idProduk">
                </div>
            </div> --}}
                                <div class="mb-3 row">
                                    <label for="image" class="col-sm-2 col-form-label">Gambar</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" name='image' id="image">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="namaProduk" class="col-sm-2 col-form-label">Nama Produk</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name='namaProduk' id="namaProduk">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="kategori" class="col-sm-2 col-form-label">kategori</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name='kategori'>
                                            <option selected>Pilih Kategori</option>
                                            @foreach ($kategori as $item)
                                                <option value="{{ $item->idKategori }}">{{ $item->namaKategori }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="form-check-label col-sm-2" for="varian">Variasi Produk</label>
                                    <div class="col-sm-9 form-check form-switch ms-2">
                                        <input class="form-check-input" type="checkbox" role="switch" id="varian"
                                            v-on:Click="onClickVarian()" name="varian">
                                    </div>
                                </div>
                                <div class=" row">
                                    <div id="colomHarga" class="mb-3" style="display: inline-flex">
                                        <label for="harga" class="col-sm-2 col-form-label">harga</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name='harga' id="harga">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row w-100" id="ChekVarian" v-if="form == 1">
                                    <div class="col-md-12 d-flex justify-content-end mb-3">
                                        <span class="btn btn-primary" v-on:Click="tambahVariasi">Tambah Varian</span>
                                    </div>
                                    <template v-for="(kon, index) in variasi" >
                                        <div class="col-sm-6">
                                            <div class="input-group mb-3 ">
                                                <span class="input-group-text" id="basic-addon1">Nama</span>
                                                <input type="text" class="form-control" placeholder="nama"
                                                    aria-label="nama" aria-describedby="basic-addon1" model="kon.nama"
                                                    name="varian_nama[]">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-group mb-3 col-sm-6">
                                                <span class="input-group-text" id="basic-addon1">Harga</span>
                                                <input type="text" class="form-control" placeholder="harga"
                                                    aria-label="harga" aria-describedby="basic-addon1" model="kon.harga"
                                                    name="varian_harga[]">
                                                <span class="btn btn-danger float-end deleteKonten"
                                                    v-on:Click="hapusVariasi(index)"><i
                                                        class="fa-solid fa-trash"></i></span>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                                <div class="mb-3 row">
                                    <div id="cekCustom">
                                        <div class="col-md-2">
                                            <label class="form-check-label" for="custom">
                                                Custom
                                            </label>
                                        </div>
                                        <div class="col-md-9 mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1"
                                                    name="custom" id="custom" onclick="myFunction()">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 row mb-3">
                                        <div id="showJenis" class="row">
                                            <label for="jenis" class="col-sm-2 col-form-label">jenis</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name='jenis'>
                                                    <option selected>Pilih jenis</option>
                                                    <option value="banner">Banner</option>
                                                    <option value="stiker">Stiker</option>
                                                    <option value="albatros">Albatros</option>
                                                    <option value="luster">Luster</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="deskripsi" class="col-sm-2 col-form-label">deskripsi</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name='deskripsi' id="deskripsi" rows="5"></textarea>
                                            {{-- <input type="text" class="form-control" name='deskripsi' id="deskripsi"> --}}
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="jurusan" class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10"><button type="submit" class="btn btn-primary">SIMPAN</button></div>
                                    </div>

                                </div>
                        </form>
                        <!-- AKHIR FORM -->
                    </div>
                </div>
            </div>
        </main>
    </div>
    {{-- @section('javascript') --}}
    <script>
        function myFunction() {
            // Get the checkbox
            var checkBox = document.getElementById("custom");

            // If the checkbox is checked, display the output text
            if (checkBox.checked == true) {
                document.getElementById("showJenis").style.display = "inline-flex";
            } else {
                document.getElementById("showJenis").style.display = "none";
            }
        }
        $(document).ready(function() {
            document.getElementById("showJenis").style.display = "none";
            document.getElementById("cekCustom").style.display = "inline-flex";
        })
    </script>
@endsection
@section('vue')
    <script>
        var vm = new Vue({
            el: "#layoutSidenav_content",
            data: {
                card: ["deden munafik"],
                total: '',
                variasi: [{}],
                form: 0,
            },
            mounted() {
                $('.deleteKonten').hide();
            },
            methods: {
                onClickVarian() {
                    if ($('#varian').prop('checked') == true) {
                        vm.form = 1;
                        document.getElementById("colomHarga").style.display = "none";
                        document.getElementById("cekCustom").style.display = "none";
                        $('#custom').prop('checked', false);
                        document.getElementById("showJenis").style.display = "none";
                    } else {
                        vm.form = 0;
                        document.getElementById("ChekVarian").style.display = "none";
                        document.getElementById("showJenis").style.display = "none";

                        document.getElementById("colomHarga").style.display = "inline-flex";
                        document.getElementById("cekCustom").style.display = "inline-flex";
                    }
                },
                tambahVariasi() {
                    this.variasi.push({
                        nama: '',
                        harga: '',
                    });
                    // checking Gambar
                    var i = 0
                    this.variasi.forEach(element => {
                        i++;
                    });
                    if (i == 1 || i == 0) {
                        $('.deleteKonten').hide();
                        console.log($('.deleteKonten').hide());
                    }
                },
                hapusVariasi(index) {
                    console.log(index);
                    this.variasi.splice(index, 1);

                    var i = 0
                    this.variasi.forEach(element => {
                        i++;
                    });
                    if (i == 1 || i == 0) {
                        $('.deleteKonten').hide();
                        console.log($('.deleteKonten').hide());
                    }
                },
            }
        })
    </script>
@endsection
