@extends('layouts.main')

@section('container')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <a
                        href="cart.html">Cart</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Checkout</strong>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            {{-- <div class="row mb-5">
          <div class="col-md-12">
            <div class="border p-4 rounded" role="alert">
              Returning customer? <a href="#">Click here</a> to login
            </div>
          </div>
        </div> --}}
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 mb-5 mb-md-0">
                    <h2 class="h3 mb-3 text-black">Cara Order Online</h2>
                    <p class="mb-3 text-black">
                        1. Login pada Web Arthur Citra Media.<br>
                        2. Pilih Menu Katalog untuk memilih barang yang ingin anda beli.<br>
                        3. Setelah Puas Memilih, klik icon keranjang pada bagian kanan atas.<br>
                        4. Cek kembali barang belanjaan anda.<br>
                        5. Jika sudah merasa yakin dan puas, silahkan klik "Checkout" pada bagian bawah kanan halaman.<br>
                        6. Cek kembali apakah barang anda sudah sesuai dengan barang yang tertera di Invoice.<br>
                        7. Jika sudah, silahkan klik "Order Via Whatsapp".<br>
                        8. Untuk Pembayaran silahkan melakukan Transaksi dengan Transfer ke BCA 6730305557 A/n Budi
                        Santoso.<br>
                        9. Jika Sudah melakukan Pembayaran Silahkan konfirmasi ke Admin Kami Via Whatsapp.<br>
                        10. Jika Pesanan sudah terkonfirmasi, silahkan tunggu pesanan anda diproses.<br>
                        11. Admin kami akan menghubungi Nomor Whatsapp yang Anda cantumkan saat pesanan sudah
                        selesai.<br><br>

                        ~ TERIMA KASIH ~
                    </p>
                </div>
                <div class="row mb-5 col-md-6">
                    <div class="col-md-12">
                        <h2 class="h3 mb-3 text-black text-center">Invoice</h2>
                        <div class="p-3 p-lg-5 border">
                            <table class="table site-block-order-table mb-5">
                                <thead>
                                    <th>Produk</th>
                                    <th>Total</th>
                                    <th>Qty</th>
                                    <th>Subtotal</th>
                                </thead>
                                <tbody>
                                    @foreach ($cart as $key => $item)
                                        <tr>
                                            {{-- <td>{{ $item->produk->namaProduk }}<strong class="mx-2">x</strong>1</td> --}}
                                            <td>{{ $item['nama'] }}</td>
                                            <td>{{ $item['qty'] }} pcs</td>
                                            <td>Rp. {{ $item['harga'] }}</td>
                                            <td>Rp. {{ $item['Total_Harga'] }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-black">Rp. {{ $total }}</td>
                                    </tr>
                                    {{-- <tr>
                            <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                            <td class="text-black font-weight-bold"><strong>Rp.-</strong></td>
                          </tr> --}}

                                </tbody>
                            </table>

                            {{-- <div class="border p-3 mb-3">
                        <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsebank" role="button" aria-expanded="false" aria-controls="collapsebank">Direct Bank Transfer</a></h3>

                        <div class="collapse" id="collapsebank">
                          <div class="py-2">
                            <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                          </div>
                        </div>
                      </div>

                      <div class="border p-3 mb-3">
                        <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsecheque" role="button" aria-expanded="false" aria-controls="collapsecheque">Cheque Payment</a></h3>

                        <div class="collapse" id="collapsecheque">
                          <div class="py-2">
                            <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                          </div>
                        </div>
                      </div>

                      <div class="border p-3 mb-5">
                        <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsepaypal" role="button" aria-expanded="false" aria-controls="collapsepaypal">Paypal</a></h3>

                        <div class="collapse" id="collapsepaypal">
                          <div class="py-2">
                            <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                          </div>
                        </div>
                      </div> --}}

                            <div class="form-group text-center">
                                {{-- <button class="btn btn-primary btn-lg py-3 btn-block" href="https://wa.me/087858860888">Order Via Whatsapp</button> --}}
                                <a class="btn btn-primary btn-lg py-3 btn-bloc text-center"
                                    href="https://wa.me/087858860888">Order Via Whatsapp</a>
                                {{-- <a class="btn btn-primary btn-lg py-3 btn-bloc text-center" href="https://wa.me/087858860888?text=Order%20By%20%20%3A{{$user}}%0A%0APesanan%20%3A%20%0A1%20{{ $item->produk->namaProduk }}%20{{ $item->produk->qty }}%20Rp.{{ $subtotal[$key] }}%0A%0AGrand%C2%A0Total%09%3A%20Rp.{{ $total }}">Order Via Whatsapp</a> --}}
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- </form> -->
    </div>
    </div>
@endsection
