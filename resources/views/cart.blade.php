@extends('layouts.main')

@section('container')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="/">Home</a> <span class="mx-2 mb-0">/</span> <strong
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
                                <tr>
                                    @foreach ($cart as $key => $item)
                                        <td class="product-thumbnail">
                                            <img src="{{ asset('storage/image-produk/' . $item->produk->img) }}"
                                                alt="Image" class="img-fluid">
                                        </td>
                                        <td class="product-name">

                                            <h2 class="h5 text-black">{{ $item->produk->namaProduk }} </h2>
                                        </td>
                                        <td>Rp {{ $item->produk->harga }}</td>

                                        <td>
                                            <div class="input-group mb-3" style="max-width: 120px;">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-outline-primary js-btn-minus"
                                                        data-id="{{ $item->id }}" type="button">&minus;</button>
                                                </div>
                                                <input type="text" class="form-control text-center qty-input"
                                                    value="{{ $item->qty }}" placeholder=""
                                                    aria-label="Example text with button addon"
                                                    aria-describedby="button-addon1" data-id="{{ $item->idProduk }}">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-primary js-btn-plus"
                                                        data-id="{{ $item->id }}" type="button">&plus;</button>
                                                </div>
                                            </div>



                                        </td>
                                        {{-- // subtotal = harga * qty ; --}}
                                        <!-- <td>Rp {{ $item->price * $item->quantity }}</td> -->
                                        <td>Rp {{ $subtotal[$key] }}</td>

                                        {{-- <form action="{{ route('cart.destroy',$item->id) }}" method="POST"> --}}

                                        {{-- <form action="{{ route('deletecart',$cart->id) }}" method="POST"> --}}

                                        {{-- @csrf
                                        @method('DELETE') --}}
                                        <td><button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>
                                                Delete</button></td>

                                        {{-- </form> --}}

                                        {{-- <td><a type="submit" class="btn btn-primary btn-sm">X</a></td> --}}
                                </tr>
                            </tbody>
                            @endforeach
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
                            <!-- <div class="row mb-3">
                                                                                                                      <div class="col-md-6">
                                                                                                                        <span class="text-black">Subtotal</span>
                                                                                                                      </div>
                                                                                                                      <div class="col-md-6 text-right">
                                                                                                                        <strong class="text-black">$230.00</strong>
                                                                                                                      </div>
                                                                                                                    </div> -->
                            <div class="row mb-5">
                                <div class="col-md-6">
                                    <span class="text-black">Total</span>
                                </div>
                                <div class="col-md-6 text-right mb-5">
                                    <strong class="text-black">{{ $total }}</strong>
                                </div>
                                <a class="btn btn-primary btn-lg py-3 btn-bloc" href="/checkout">Checkout</a>
                            </div>

                            {{-- <div class="row">
                                <div class="col-md-12"> --}}
                                    {{-- <button class="btn btn-primary btn-lg py-3 btn-block"
                                    href="/checkout">Checkout</button> --}}
                                    {{-- <a class="btn btn-primary btn-lg py-3 btn-bloc" href="/checkout">Checkout</a>
                                </div> --}}
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
        $(document).ready(function() {
            // Mengatur event listener untuk tombol plus
            $(".js-btn-plus").on("click", function() {
                var productId = $(this).data("id");
                var qtyInput = $(".qty-input[data-id=" + productId + "]");
                var currentQty = parseInt(qtyInput.val());

                // Kirim permintaan Ajax untuk menambahkan qty
                $.ajax({
                    url: "/update-cart/increase/" + productId,
                    type: "GET",
                    success: function(data) {
                        qtyInput.val(data.newQty);
                    }
                });
            });

            // Mengatur event listener untuk tombol minus
            $(".js-btn-minus").on("click", function() {
                var productId = $(this).data("id");
                var qtyInput = $(".qty-input[data-id=" + productId + "]");
                var currentQty = parseInt(qtyInput.val());

                // Kirim permintaan Ajax untuk mengurangkan qty
                $.ajax({
                    url: "/update-cart/decrease/" + productId,
                    type: "GET",
                    success: function(data) {
                        qtyInput.val(data.newQty);
                    }
                });
            });
        });


        var vm = new Vue({
            el: ".site-section",
            data: {},
            mounted() {
                this.test();
            },
            methods: {
                test() {
                    console.log("jkjkjkj");
                }
            }
        })
    </script>
@endsection
