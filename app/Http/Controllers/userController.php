<?php


namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\artikel;
use App\Models\produk;
use Illuminate\Http\Request;

class userController extends Controller
{
    //
    function home()
    {
        $data1 = produk::with('kategori')->orderBy('idProduk', 'desc')->paginate();
        return view('home', [
            "title" => "home Produk"
        ])->with('data1', $data1);
    }
    function about()
    {
        return view('about', [
            "title" => "About",
            "name" => "Arthur citra Media",
            "email" => "acmbratang09@gmail.com",
            "image" => "acm.png"
        ]);
    }
    function keranjang()
    {
        return view('cart', [
            "title" => "Keranjang"
        ]);
    }
    function artikel()
    {
        $data2 = artikel::orderBy('idArtikel', 'desc')->paginate();
        return view('artikel', [
            "title" => "artikel"
        ])->with('data2', $data2);
    }
    function singleArtikel(artikel $artikel)
    {
        $data2 = artikel::orderBy('idArtikel', 'desc')->paginate();
        return view('artikel', [
            "title" => "artikel"
        ])->with('data2', $data2);

        $data2 = artikel::where('idArtikel', $artikel)->first();
        return view('artikel-single', compact('artikel'), [
            "title" => "Single Artikel"
        ]);
    }
    function checkout()
    {
        return view('checkout', [
            "title" => "Checkout"
        ]);
    }
    function member()
    {
        return view('contact', [
            "title" => "Member"
        ]);
    }
    function katalog()
    {
        return view('shop', [
            "title" => "Katalog"
        ]);
    }
    function deskripsikatalog()
    {
        return view('shop-single', [
            "title" => "Deskripsi Katalog"
        ]);
    }
    function thanks()
    {
        return view('thanks', [
            "title" => "Thanks"
        ]);
    }
}
