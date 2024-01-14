@extends('layouts.main')

@section('container')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="{{ URL('/') }}">Home</a> <span class="mx-2 mb-0">/</span> <strong
                        class="text-black">Cart</strong></div>
            </div>
        </div>
    </div>

    {{-- <h1>{{$user}}</h1> --}}

    <div class="site-section">
        <div class="container">

            <div class="row mb-5">
                <form class="col-md-12" method="post">
                    <div class="site-blocks-table">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Image</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-total">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-for="(dt, index) in card">
                                    <tr>
                                        <td class="product-thumbnail">
                                            <img :src="dt.gambar" alt="Image" class="img-fluid">
                                        </td>
                                        <td class="product-name">
                                            <h2 class="h5 text-black">@{{ dt.namaProduk }}</h2>
                                        </td>
                                        <td>Rp @{{ dt.hargaProduk }}</td>
                                        <td>
                                            <div class="input-group mb-3" style="max-width: 120px;">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-outline-primary js-btn-minus"
                                                        :data-id="dt.id" v-on:click="kurang(dt.id)" type="button">&minus;</button>
                                                </div>
                                                <input type="text" class="form-control text-center qty-input"
                                                    :value="dt.qtyProduk" placeholder=""
                                                    aria-label="Example text with button addon"
                                                    aria-describedby="button-addon1" :data-id="dt.idProduk">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-primary js-btn-plus"
                                                        :data-id="dt.id" type="button"
                                                        v-on:click="Tambah(dt.id)">&plus;</button>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Rp @{{ dt.subtotal }}</td>
                                        <td><span class="btn btn-danger" v-on:click="hapus(dt.idProduk)"><i class="fa fa-trash"></i>
                                                Delete</span></td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="row mb-5">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <button class="btn btn-primary btn-sm btn-block">Update Cart</button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-outline-primary btn-sm btn-block">Continue Shopping</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="text-black h4" for="coupon">Coupon</label>
                            <p>Enter your coupon code if you have one.</p>
                        </div>
                        <div class="col-md-8 mb-3 mb-md-0">
                            <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary btn-sm">Apply Coupon</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 pl-5">
                    <div class="row justify-content-end">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-12 text-right border-bottom mb-5">
                                    <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-md-6">
                                <span class="text-black">Total</span>
                            </div>
                            <div class="col-md-6 text-right mb-5">
                                <strong class="text-black">@{{ total }}</strong>
                            </div>
                            <a class="btn btn-primary btn-lg py-3 btn-bloc" href="{{ URL('/checkout') }}">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection

@section('javascript')
    <script>
        const Swal = SweetAlert;
        var vm = new Vue({
            el: ".site-section",
            data: {
                card: [],
                total: '',
            },
            mounted() {
                this.main();
            },
            methods: {
                main() {
                    $.ajax({
                        url: "{{ URL('cart/view'); }}",
                        type: "GET",
                        success: function(data) {
                            vm.card = [];
                            data.cart.forEach((dt, i) => {
                                vm.card.push({
                                    'gambar': "{{ asset('" + "storage/image-produk/" + dt.produk.img + "') }}",
                                    'namaProduk': dt.produk.namaProduk,
                                    'hargaProduk': dt.produk.harga,
                                    'id': dt.id,
                                    'qtyProduk': dt.qty,
                                    'idProduk': dt.idProduk,
                                    'subtotal': data.subtotal[i],
                                })
                            });
                            vm.total = data.total;
                        }
                    });
                },
                Tambah(id) {
                    Swal.fire({
                        title: "",
                        text: "Loading...",
                        imageUrl: 'https://www.boasnotas.com/img/loading2.gif',
                        imageHeight: 50,
                        showConfirmButton: false,
                        allowOutsideClick: false
                    })

                    $.ajax({
                        url: "update-cart/increase/" + id,
                        type: "GET",
                        success: function(data) {
                            vm.card = [];
                            data.cart.forEach((dt, i) => {
                                vm.card.push({
                                    'gambar': "{{ asset('" + "storage/image-produk/" + dt.produk.img + "') }}",
                                    'namaProduk': dt.produk.namaProduk,
                                    'hargaProduk': dt.produk.harga,
                                    'id': dt.id,
                                    'qtyProduk': dt.qty,
                                    'idProduk': dt.idProduk,
                                    'subtotal': data.subtotal[i],
                                })
                            });
                            vm.total = data.total;
                            Swal.close()
                        }
                    });
                },
                kurang(id) {
                    Swal.fire({
                        title: "",
                        text: "Loading...",
                        imageUrl: 'https://www.boasnotas.com/img/loading2.gif',
                        imageHeight: 50,
                        showConfirmButton: false,
                        allowOutsideClick: false
                    })
                    $.ajax({
                        url: "update-cart/decrease/" + id,
                        type: "GET",
                        success: function(data) {
                            vm.card = [];
                            data.cart.forEach((dt, i) => {
                                vm.card.push({
                                    'gambar': "{{ asset('" + "storage/image-produk/" + dt.produk.img+"') }}",
                                    'namaProduk': dt.produk.namaProduk,
                                    'hargaProduk': dt.produk.harga,
                                    'id': dt.id,
                                    'qtyProduk': dt.qty,
                                    'idProduk': dt.idProduk,
                                    'subtotal': data.subtotal[i],
                                })
                            });
                            vm.total = data.total;
                            Swal.close();
                        }
                    });
                },
                hapus(id){
                    Swal.fire({
                        title: "",
                        text: "Loading...",
                        imageUrl: 'https://www.boasnotas.com/img/loading2.gif',
                        imageHeight: 50,
                        showConfirmButton: false,
                        allowOutsideClick: false
                    })
                    $.ajax({
                        url: "update-cart/deleted/" + id,
                        type: "GET",
                        success: function(data) {
                            vm.card = [];
                            data.cart.forEach((dt, i) => {
                                vm.card.push({
                                    'gambar': "{{ asset('" + "storage/image-produk/"+ dt.produk.img + "')",
                                    'namaProduk': dt.produk.namaProduk,
                                    'hargaProduk': dt.produk.harga,
                                    'id': dt.id,
                                    'qtyProduk': dt.qty,
                                    'idProduk': dt.idProduk,
                                    'subtotal': data.subtotal[i],
                                })
                            });
                            vm.total = data.total;
                            Swal.close();
                        }
                    });
                }
            }
        })
    </script>
@endsection
