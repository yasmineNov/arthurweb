@extends('layouts.main')

@section('container')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="{{ URL('/') }}">Home</a> <span class="mx-2 mb-0">/</span> <strong
                        class="text-black">Kalkulator</strong></div>
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
                {{-- <form method='post' action='{{ env('base_url') . 'kalkulator/hitung' }}' enctype="multipart/form-data"> --}}


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
                                {{-- <input type="text" class="form-control" name='namaProduk' id="namaProduk"> --}}
                                <select class="form-control" name='namaProduk' id="changeProduct">
                                    <option selected>Pilih Product</option>
                                    @foreach ($dropdown as $item)
                                        <option value="{{ $item->idProduk }}" data-harga="{{ $item->harga }}"
                                            data-jenis="{{ $item->jenis }}">
                                            {{ $item->namaProduk }}</option>
                                    @endforeach
                                </select>
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
                            <input type="text" class="form-control" name='harga' id="harga" value=""
                                disabled>
                        </div>
                    </div>
                    <div class="mb-3 row" style="display: none">
                        <label for="jenis" class="col-sm-2 col-form-label">Jenis</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='jenis' id="jenis">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="lebar" class="col-sm-2 col-form-label">Lebar (*cm)</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='lebar'
                                id="lebar"placeholder="isi dengan menggunakan perhitungan CM">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tinggi" class="col-sm-2 col-form-label">Tinggi (*cm)</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='tinggi'
                                id="tinggi"placeholder="isi dengan menggunakan perhitungan CM">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div id="finishing" style="display: none">
                            <label for="hasil" class="col-sm-2 col-form-label">Finishing</label>
                            <div class="col-sm-10">
                                {{-- <input type="text" class="form-control" name='hasil'
                                    id="hasil"placeholder="Boleh dikosongi apabila produk tidak memiliki jenis"> --}}
                                <select class="form-control" name='finishing' id="finishing1">
                                    <option selected>Pilih Finishing</option>
                                    <option value="lebihan">Lebihan</option>
                                    <option value="potong press">Potong Press</option>
                                    <option value="mata ayam">Mata Ayam</option>
                                    <option value="selongsong">Selongsong</option>
                                    <option value="lipat press">Lipat Press</option>
                                </select>
                            </div>
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
                        <div class="col-sm-10"><button onclick="hitung()" class="btn btn-primary"
                                name="submit">Hitung</button></div>
                    </div>

                </div>
                {{-- </form> --}}
                <!-- AKHIR FORM -->
            </div>
        </div>
    </div>
    </div>
@endsection
@section('javascript')
    <script>
        $('#changeProduct').change(function() {
            const harga = $(this).find(':selected').attr('data-harga');
            $('#harga').val(harga);
            $('#jenis').val($(this).find(':selected').attr('data-jenis'));
            if ($("#jenis").val() == "banner") {
                document.getElementById("finishing").style.display = "inline-flex";
            } else {
                document.getElementById("finishing").style.display = "none";
            }
        });

        var hitung = function() {
            var formData = new FormData();
            formData.append("_token", "{{ csrf_token() }}");
            formData.append("namaProduk", $('#changeProduct').val());
            formData.append("jenis", $('#jenis').val());
            formData.append("harga", $('#harga').val());
            formData.append("lebar", $('#lebar').val());
            formData.append("tinggi", $('#tinggi').val());
            formData.append("finishing", $('#finishing1').val());
            $.ajax({
                url: "kalkulator/hitung",
                type: "POST",
                data: formData,
                dataType: "json",
                processData: false, // Tambahkan opsi ini
                contentType: false, // Tambahkan opsi ini
                success: function(result) {
                    if (isNaN(result)) {
                        Swal.fire(result);
                    } else {
                        Swal.fire("Estimasi harga : <br> Rp " + result.toLocaleString(['ban', 'id']));
                    }
                    $('#changeProduct').val("Pilih Product");
                    $('#jenis').val("");
                    $('#harga').val("");
                    $('#lebar').val("");
                    $('#tinggi').val("");
                    $('#finishing1').val("Pilih Finishing");
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: "error",
                        title: "Eror",
                        text: "Mohon Lengkapi Data!",
                    });
                }
            });
        };
    </script>
@endsection
