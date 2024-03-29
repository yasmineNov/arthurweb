@extends('layouts.main')
@section('container')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong
                        class="text-black">Katalog</strong><span class="mx-2 mb-0">/</span> <strong class="text-black">Banner
                        V280gr</strong></div>
            </div>
        </div>
    </div>

    <section class="py-5">
        <div class="container">
            <div class="row gx-5">
                <aside class="col-lg-6">
                    <div class="border rounded-4 mb-3 d-flex justify-content-center">
                        <a data-fslightbox="mygalley" class="rounded-4" target="_blank" data-type="image"
                            href="{{ asset('storage/image-produk/' . $produk->img) }}">
                            {{-- <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit" src="{{ asset('storage/image-produk/' . $produk->img) }}" /> --}}
                            <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit"
                                src="{{ asset('storage/image-produk/' . $produk->img) }}" />
                        </a>
                    </div>
                    {{-- <div class="d-flex justify-content-center mb-3">
              <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big1.webp" class="item-thumb">
                <img width="60" height="60" class="rounded-2" src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big1.webp" />
              </a>

            </div> --}}
                    <!-- thumbs-wrap.// -->
                    <!-- gallery-wrap .end// -->
                </aside>
                <main class="col-lg-6">
                    <div class="ps-lg-3" id="content">
                        <form action="{{ url('cart/' . $produk->idProduk) }}" method="POST">
                            <h4 class="title text-dark">
                                {{ $produk->namaProduk }}
                            </h4>
                            <div class="d-flex flex-row my-3">
                                <div class="text-warning mb-1 me-2">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <span class="ms-1">
                                        4.5
                                    </span>
                                </div>
                                <span class="text-muted"><i class="fas fa-shopping-basket fa-sm mx-1"></i>154 orders</span>
                                <span class="text-success ms-2">In stock</span>
                            </div>

                            <div class="mb-3">
                                <span class="h5">{{ $produk->harga }}</span>
                                <span class="text-muted">/per pcs</span>
                            </div>

                            <p>
                                {!! $produk->deskripsi !!}
                            </p>

                            <div class="row">
                                <dt class="col-3">Jenis:</dt>
                                <dd class="col-9">{{ $produk->jenis }} </dd>

                                <dt class="col-3">Kategori</dt>
                                <dd class="col-9">{!! $produk->kategori->namaKategori !!}</dd>

                                <dt class="col-3">Gramasi</dt>
                                <dd class="col-9">{{ $produk->gramasi }} gsm</dd>

                                <dt class="col-3">Harga Rp</dt>
                                @if (isset($produk->varian[0]))
                                    <dd class="col-9" id="harga-varian"></dd>
                                @else
                                    <dd class="col-9">{{ $produk->harga }}</dd>
                                @endif

                            </div>

                            <hr />

                            <div class="row mb-4">
                                @if ($errors->any())
                                    <div class="col-md-12">
                                        <div class="pt-3">
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $item)
                                                        <li>{{ $item }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if ($produk->custom == 1)
                                    <input type="text" name="jenis" value="{{ $produk->jenis }}" hidden>
                                    <div class="col-md-4 col-6 mb-3">
                                        <label class="mb-2 d-block" for="tinggi">Tinggi</label>
                                        <div class="input-group mb-3" style="width: 170px;">
                                            <input type="text" class="form-control text-center border border-secondary"
                                                placeholder="0cm" aria-label="Example text with button addon" id="tinggi"
                                                name="tinggi" aria-describedby="button-addon1" value="0" />
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-6 mb-3">
                                        <label class="mb-2 d-block" for="lebar">Lebar</label>
                                        <div class="input-group mb-3" style="width: 170px;">
                                            <input type="text" class="form-control text-center border border-secondary"
                                                placeholder="0cm" aria-label="Example text with button addon"
                                                aria-describedby="button-addon1" name="lebar" id="lebar" value="0" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="hasil" class="mb-2 d-block">Finishing</label>
                                        {{-- <input type="text" class="form-control" name='hasil'
                                        id="hasil"placeholder="Boleh dikosongi apabila produk tidak memiliki jenis"> --}}
                                        <select class="form-control" name='finishing' id="finishing1">
                                            <option value ='' selected>Pilih Finishing</option>
                                            <option value="lebihan">Lebihan</option>
                                            <option value="potong press">Potong Press</option>
                                            <option value="mata ayam">Mata Ayam</option>
                                            <option value="selongsong">Selongsong</option>
                                            <option value="lipat press">Lipat Press</option>
                                        </select>
                                    </div>
                                @endif
                                @if (isset($produk->varian[0]))
                                    <div class="col-md-4 col-6 mb-3">
                                        <label class="mb-2 d-block">Varian</label>
                                        <select class="form-select" id="varian" name="varian">
                                            <option selected>Pilih Varian</option>
                                            @foreach ($produk->varian as $var)
                                                <option value="{{ $var->id }}" data-harga="{{ $var->harga }}">
                                                    {{ $var->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                                <!-- col.// -->
                                <div class="col-md-4 col-6 mb-3">
                                    <label class="mb-2 d-block">Quantity</label>
                                    <div class="input-group mb-3" style="width: 170px;">
                                        <button class="btn btn-white border border-secondary px-3" type="button"
                                            id="button-addon1" data-mdb-ripple-color="dark" v-on:Click="kurang">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <input type="text" class="form-control text-center border border-secondary"
                                            placeholder="0" aria-label="Example text with button addon"
                                            aria-describedby="button-addon1" name="qty" :value="qty" />
                                        <button class="btn btn-white border border-secondary px-3" type="button"
                                            id="button-addon2" data-mdb-ripple-color="dark" v-on:Click="tambah">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-start">
                                <div class="mb-3">
                                    <a href="#" class="btn btn-warning shadow-0"> Buy now </a>
                                </div>
                                <div>

                                    @csrf
                                    <input class="btn btn-primary shadow-0" type="submit" value="add cart">
                                    {{-- <i class="me-1 fa fa-shopping-basket"></i> --}}
                                    {{-- <a href="#" class="btn btn-primary shadow-0"> <i class="me-1 fa fa-shopping-basket"></i> Add to cart </a> --}}
                                </div>
                            </div>
                        </form>

                        {{-- <a href="#" class="btn btn-light border border-secondary py-2 icon-hover px-3"> <i class="me-1 fa fa-heart fa-lg"></i> Save </a> --}}
                    </div>
                </main>
            </div>
        </div>
    </section>
    <script>
        $('#varian').on('change', '', function(e) {
            console.log($('#varian').find(":selected").val());
            $("#harga-varian").html($(this).find(':selected').attr('data-harga'))
        });
        $(document).ready(function() {
            document.getElementById("showJenis").style.display = "none";
            document.getElementById("cekCustom").style.display = "inline-flex";
        })
    </script>

@endsection
@section('javascript')
    <script>
        const Swal = SweetAlert;
        var vm = new Vue({
            el: "#content",
            data: {
                qty:0,
            },
            mounted() {
                console.log("testing");
            },
            methods: {
                kurang(){
                   if(this.qty != 0 ){
                    this.qty--;
                   }
                },
                tambah(){
                    this.qty++;
                }
            }
        })
    </script>
@endsection
