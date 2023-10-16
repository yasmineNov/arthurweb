<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

// Route::get('/artikel', function () {
//     $blog_posts = [
//         [
//             "title" => "Judul post pertama",
//             "slug" => "judul-post-pertama",
//             "author" => "Arthur Citra Media",
//             "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio alias veritatis suscipit provident id eaque, pariatur error cupiditate exercitationem laboriosam earum omnis, deleniti repudiandae quidem molestias ab tempora. Beatae non cupiditate ipsa deleniti veritatis alias harum mollitia repellendus at suscipit aliquid, eveniet quis nihil ex! Veritatis eos necessitatibus asperiores omnis nulla quam error pariatur id qui, in accusamus rerum placeat inventore iste illo labore! Eius, itaque numquam. Iusto accusantium, commodi laborum hic officiis voluptates natus quia vero quas minima voluptatum!"
//         ],
//         [
//             "title" => "Judul post kedua",
//             "slug" => "judul-post-kedua",
//             "author" => "Arthur Citra Media",
//             "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio alias veritatis suscipit provident id eaque, pariatur error cupiditate exercitationem laboriosam earum omnis, deleniti repudiandae quidem molestias ab tempora. Beatae non cupiditate ipsa deleniti veritatis alias harum mollitia repellendus at suscipit aliquid, eveniet quis nihil ex! Veritatis eos necessitatibus asperiores omnis nulla quam error pariatur id qui, in accusamus rerum placeat inventore iste illo labore! Eius, itaque numquam. Iusto accusantium, commodi laborum hic officiis voluptates natus quia vero quas minima voluptatum!"
//         ],
//     ];

//     return view('artikel', [
//         "title" => "Artikel",
//         "posts" => $blog_posts
//     ]);
// });

// Route::get('/artikel/{slug}', function ($slug) {
//     return view('artikel-single', [
//         "title" => "$slug"
//     ]);
// });

//LOGIN
Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

//RESGISTER
Route::get('/register', [RegisterController::class, 'register'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

//CART
Route::post('/cart/{id}', [CartController::class, 'addcart'])->name('cart');;
Route::resource('cart', CartController::class);

// ROUTES USER
Route::resource('usr', CustomerController::class);
Route::get('/', [userController::class, 'home']);
Route::get('/about', [userController::class, 'about']);
Route::get('/keranjang', [userController::class, 'keranjang']);
Route::get('/checkout', [userController::class, 'checkout']);
Route::get('/member', [userController::class, 'member']);
Route::get('/katalog', [userController::class, 'katalog']);
// Route::get('/kategorii', [userController::class, 'shop_kategori']);
// Route::get('/deskripsikatalog', [userController::class, 'deskripsikatalog']);
// Route::get('/thanks', [userController::class, 'thanks']);
Route::get('/frontartikel', [userController::class, 'artikel']);
Route::get('singleArtikel', [userController::class, 'singleArtikel']);
Route::get('/produk/{id}', [produkController::class, 'show'])->name('produk.show');

// ROUTES ADMIN
Route::get('/dashboard', [adminController::class, 'dashboard'])->middleware('can:admin');
Route::get('/katalogpromo', [adminController::class, 'katalogpromo']);
Route::get('/toko', [adminController::class, 'toko']);
Route::get('/slider', [adminController::class, 'slider']);


Route::resource('customer', CustomerController::class);
Route::get('member', [CustomerController::class, 'member']);

Route::get('artikelhome', [ArtikelController::class, 'artikelhome']);
Route::get('/artikelAdmin', [ArtikelController::class, 'artikel']);
Route::resource('artikel', ArtikelController::class);
Route::get('tambahArtikel', [ArtikelController::class, 'tambahArtikel']);
Route::get('/artikel/{id}', [ArtikelController::class, 'show'])->name('artikel.show');

Route::get('/katalogproduk', [ProdukController::class, 'katalogproduk']);
Route::resource('produk', ProdukController::class);
Route::get('/tambahProduk', [ProdukController::class, 'tambahProduk']);

Route::get('/kategoriAdmin', [KategoriController::class, 'kategoriAdmin']);
// Route::get('/kategoriShop', [KategoriController::class, 'shop_kategori']);
Route::resource('kategori', KategoriController::class);
Route::get('tambahKategori', [KategoriController::class, 'tambahKategori']);
