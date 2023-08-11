<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    //
    function home()
    {
        return view('home', [
            "title" => "Home"
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
    function artikel()
    {
        return view('artikel', [
            "title" => "Artikel"
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
