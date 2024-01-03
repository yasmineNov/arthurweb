@extends('layouts.main')

@section('container')
<div class="bg-light py-3">
  <div class="container">
    <div class="row">
      <div class="col-md-12 mb-0"><a href="{{ URL('/') }}">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Kalkulator</strong></div>
    </div>
  </div>
</div>

<div class="container-fluid px-4">

  <h3 class="mt-4 mt-5 mb-3">Hitung Perkiraan harga produk yang akan anda pesan</h3>

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
          <form method='post' action='{{env('base_url').'kalkulator/hitung'}}' enctype="multipart/form-data">
              @csrf

              <div class="my-3 p-3 bg-body rounded shadow-sm">
                  {{-- <div class="mb-3 row">
      <label for="idProduk" class="col-sm-2 col-form-label">Id Produk</label>
      <div class="col-sm-10">
          <input type="number" class="form-control" name='idProduk' id="idProduk">
      </div>
  </div> --}}
  {{-- <div class="mb-3 row">
      <label for="image" class="col-sm-2 col-form-label">Gambar</label>
      <div class="col-sm-10">
          <input type="file" class="form-control" name='image' id="image">
      </div>
  </div> --}}
                  {{-- <div class="mb-3 row">
                      <label for="namaProduk" class="col-sm-2 col-form-label">Nama Produk</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" name='namaProduk' id="namaProduk">
                      </div>
                  </div> --}}
                  <div class="mb-3 row">
                      <label for="kategori" class="col-sm-2 col-form-label">Nama produk</label>
                      <div class="col-sm-10">
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name='namaProduk' id="namaProduk">
                      </div>
                          {{-- <select class="form-control" name='kategori'> --}}
                              {{-- <option selected>Pilih Kategori</option>
                              @foreach ($kategori as $item)
                              <option value="{{$item->idKategori}}">{{$item->namaKategori}}</option>
                              @endforeach --}}
                          </select>
                      </div>
                  </div>
                  <div class="mb-3 row">
                      <label for="harga" class="col-sm-2 col-form-label">harga</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" name='harga' id="harga">
                      </div>
                  </div>
                  <div class="mb-3 row">
                      <label for="tinggi" class="col-sm-2 col-form-label">Panjang</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" name='tinggi' id="tinggi"placeholder="Boleh dikosongi apabila produk tidak memiliki gramasi">
                      </div>
                  </div>
                  <div class="mb-3 row">
                      <label for="lebar" class="col-sm-2 col-form-label">Lebar</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" name='lebar' id="lebar"placeholder="Boleh dikosongi apabila produk tidak memiliki jenis">
                      </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="hasil" class="col-sm-2 col-form-label">Finishing</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='hasil' id="hasil"placeholder="Boleh dikosongi apabila produk tidak memiliki jenis">
                    </div>
                </div>
                  {{-- <div class="mb-3 row">
                      <label for="deskripsi" class="col-sm-2 col-form-label">deskripsi</label>
                      <div class="col-sm-10">
                          <textarea class="form-control" name='deskripsi' id="deskripsi" rows="5"></textarea>
                      </div>
                  </div> --}}
                  <div class="mb-3 row">
                      <label for="jurusan" class="col-sm-2 col-form-label"></label>
                      <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">Hitung</button></div>
                  </div>

              </div>
          </form>
          <!-- AKHIR FORM -->
      </div>
  </div>
</div>
</div>


@endsection
