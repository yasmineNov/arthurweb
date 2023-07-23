<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    //
    function login()
    {
        return view('admin/login', [
            "title" => "login"
        ]);
    }
    function register()
    {
        return view('admin/register', [
            "title" => "register"
        ]);
    }
    function dashboard()
    {
        return view('admin/dashboard', [
            "title" => "Dashboard"
        ]);
    }
    // function katalogproduk()
    // {
    //     return view('admin/katalog-produk', [
    //         "title" => "Katalog Produk"
    //     ]);
    // }
    function katalogpromo()
    {
        return view('admin/katalog-promo', [
            "title" => "Katalog Promo"
        ]);
    }
    function toko()
    {
        return view('admin/toko', [
            "title" => "Toko"
        ]);
    }
    function artikeladmin()
    {
        return view('admin/artikel-admin', [
            "title" => "Artikel Admin"
        ]);
    }
    function customer()
    {
        return view('admin/customer', [
            "title" => "Customer"
        ]);
    }
    function tambahProduk()
    {
        return view('admin/katalog-tambahProduk', [
            "title" => "Tambah Produk"
        ]);
    }
}
