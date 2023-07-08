<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/artikel', function () {
    return view('artikel', [
        "title" => "Artikel"
    ]);
});

Route::get('/about', function () {
    return view('about' , [
        "title" => "About"
    ]);
});

Route::get('/keranjang', function () {
    return view('cart', [
        "title" => "Keranjang"
    ]);
});

Route::get('/admin', function () {
    return view('admin', [
        "title" => "Admin"
    ]);
});

Route::get('/checkout', function () {
    return view('checkout' , [
        "title" => "Checkout"
    ]);
});

Route::get('/member', function () {
    return view('contact' , [
        "title" => "Member"
    ]);
});

Route::get('/katalog', function () {
    return view('shop', [
        "title" => "Katalog"
    ]);
});

Route::get('/deskripsikatalog', function () {
    return view('shop-single', [
        "title" => "Deskripsi Katalog"
    ]);
});

Route::get('/thanks', function () {
    return view('thanks', [
        "title" => "Thanks"
    ]);
});

Route::get('/login', function () {
    return view('admin/login', [
        "title" => "login"
    ]);
});

Route::get('/register', function () {
    return view('admin/register', [
        "title" => "register"
    ]);
});

Route::get('/dashboard', function () {
    return view('admin/dashboard', [
        "title" => "Dashboard"
    ]);
});

Route::get('/katalogproduk', function () {
    return view('admin/katalog-produk', [
        "title" => "Katalog Produk"
    ]);
});

Route::get('/katalogpromo', function () {
    return view('admin/katalog-promo', [
        "title" => "Katalog Promo"
    ]);
});

Route::get('/toko', function () {
    return view('admin/toko', [
        "title" => "Toko"
    ]);
});