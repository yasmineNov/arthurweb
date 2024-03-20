<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kategori;
use App\Models\artikel;
use App\Models\produk;
use App\Models\User;

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
        // $katalog = produk::with('kategori', 'varian')->orderBy('idProduk', 'desc')->get();
        $produk = produk::count();
        $kategori = kategori::count();
        $artikel = artikel::count();
        $user = user::count();

        $data = kategori::orderBy('idKategori', 'desc')->paginate();

        return view('admin/dashboard', [
            "title" => "Dashboard",
            "produk" => $produk,
            "kategori" => $kategori,
            "artikel" => $artikel,
            "user" => $user,
            "data" => $data,
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
