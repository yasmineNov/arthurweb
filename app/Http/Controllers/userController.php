<?php


namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\artikel;
use App\Models\produk;
use Illuminate\Http\Request;

class userController extends Controller
{
    function home()
    {
        $data1 = produk::with('kategori')->orderBy('idProduk', 'desc')->paginate(4);
        $dataPost = artikel::orderBy('idArtikel', 'desc')->paginate(4);

        return view('home', [
            "title" => "home",
            "data1" => $data1,
            "dataPost" => $dataPost,
        ]);
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

    function kategori()
    {
        $data3 = kategori::orderBy('idKategori', 'desc')->paginate();
        return view('artikel', [
            "title" => "artikel"
        ])->with('data3', $data3);
    }

    function artikel()
    {
        $data2 = artikel::orderBy('idArtikel', 'desc')->paginate(4);
        return view('artikel', [
            "title" => "artikel"
        ])->with('data2', $data2);
    }

    // public function show($id)
    // {
    //     //
    //     $data = artikel::where('idArtikel', $id)->first();
    //     return view('home', compact('artikel'), [
    //         "title" => "home"
    //     ])->with('data', $data);
    // }

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
