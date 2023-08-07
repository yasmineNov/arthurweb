<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\userController;
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

// MODEL ROOT BAWAAN
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
    return view('artikel-single', [
        "title" => "$slug"
    ]);
});

// ROUTES USER
Route::get('/', [userController::class, 'home']);
Route::get('/about', [userController::class, 'about']);
Route::get('/keranjang', [userController::class, 'keranjang']);
Route::get('/checkout', [userController::class, 'checkout']);
Route::get('/member', [userController::class, 'member']);
Route::get('/katalog', [userController::class, 'katalog']);
Route::get('/deskripsikatalog', [userController::class, 'deskripsikatalog']);
Route::get('/thanks', [userController::class, 'thanks']);
// Route::get('/artikel',[userController::class, 'artikel']);

// ROUTES ADMIN
Route::get('/login', [adminController::class, 'login']);
Route::get('/register', [adminController::class, 'register']);
Route::get('/dashboard', [adminController::class, 'dashboard']);
Route::get('/katalogproduk', [ProdukController::class, 'katalogproduk']);
Route::get('/katalogpromo', [adminController::class, 'katalogpromo']);
Route::get('/toko', [adminController::class, 'toko']);

Route::resource('customer', CustomerController::class);

Route::resource('artikel', ArtikelController::class);
Route::get('tambahArtikel', [ArtikelController::class, 'tambahArtikel']);

Route::get('/tambahProduk', [ProdukController::class, 'tambahProduk']);
Route::resource('produk', ProdukController::class);

Route::resource('kategori', KategoriController::class);
Route::get('tambahKategori', [KategoriController::class, 'tambahKategori']);
