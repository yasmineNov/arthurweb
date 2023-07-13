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

// Route::get('/artikel', function () {
//     return view('artikel', [
//         "title" => "artikel"
//     ]);
// });

Route::get('/artikel', function () {
    $blog_posts = [
        [
            "title" => "Judul post pertama",
            "slug" => "judul-post-pertama",
            "author" => "Arthur Citra Media",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio alias veritatis suscipit provident id eaque, pariatur error cupiditate exercitationem laboriosam earum omnis, deleniti repudiandae quidem molestias ab tempora. Beatae non cupiditate ipsa deleniti veritatis alias harum mollitia repellendus at suscipit aliquid, eveniet quis nihil ex! Veritatis eos necessitatibus asperiores omnis nulla quam error pariatur id qui, in accusamus rerum placeat inventore iste illo labore! Eius, itaque numquam. Iusto accusantium, commodi laborum hic officiis voluptates natus quia vero quas minima voluptatum!"
        ],
        [
            "title" => "Judul post kedua",
            "slug" => "judul-post-kedua",
            "author" => "Arthur Citra Media",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio alias veritatis suscipit provident id eaque, pariatur error cupiditate exercitationem laboriosam earum omnis, deleniti repudiandae quidem molestias ab tempora. Beatae non cupiditate ipsa deleniti veritatis alias harum mollitia repellendus at suscipit aliquid, eveniet quis nihil ex! Veritatis eos necessitatibus asperiores omnis nulla quam error pariatur id qui, in accusamus rerum placeat inventore iste illo labore! Eius, itaque numquam. Iusto accusantium, commodi laborum hic officiis voluptates natus quia vero quas minima voluptatum!"
        ],
    ];

    return view('artikel', [
        "title" => "Artikel",
        "posts" => $blog_posts
    ]);
});

Route::get('/artikel/{slug}', function ($slug) {
    return view('artikel-single' , [
        "title" => "{{ $slug }}"
    ]);
});

Route::get('/about', function () {
    return view('about' , [
        "title" => "About",
        "name" => "Arthur citra Media",
        "email" => "acmbratang09@gmail.com",
        "image" => "acm.png"
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

Route::get('/artikeladmin', function () {
    return view('admin/artikel-admin', [
        "title" => "Artikel Admin"
    ]);
});

Route::get('/customer', function () {
    return view('admin/customer', [
        "title" => "Customer"
    ]);
});