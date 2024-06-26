<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\forgotPasswordController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\kalkulator\KalkulatorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\userController;
use App\Http\Controllers\SlideController;
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

Route::post('/kalkulator/hitung', [KalkulatorController::class, 'hitung'])->name('kalkulator.hitung');
Route::get('/kalkulator', [userController::class, 'order']);

//SEARCH
Route::get('/search', [userController::class, 'search'])->name('search');

//LOGIN
Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// FORGOT PASSWORD
Route::get('/forgot-password', [forgotPasswordController::class, 'forgotPassword']);
Route::post('/update-password', [forgotPasswordController::class, 'updatePassword']);
Route::post('/forgot-password', [forgotPasswordController::class, 'updatePassword']);

//REGISTER
Route::get('/register', [RegisterController::class, 'register'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

//CART
Route::post('/cart/{id}', [CartController::class, 'addcart'])->name('cart');;
Route::get('/cart/view', [CartController::class, 'cartView'])->name('cart.view');
Route::get('/update-cart/increase/{id}', [CartController::class, 'increaseQty']);
Route::get('/update-cart/decrease/{id}', [CartController::class, 'decreaseQty']);
Route::get('/update-cart/deleted/{id}', [CartController::class, 'deletedCart']);
Route::get('/update-cart/tambahinput/{id}/{id2}', [CartController::class, 'tambahinput']);
Route::resource('cart', CartController::class);


// ROUTES USER
Route::resource('usr', CustomerController::class);
Route::get('/', [userController::class, 'home']);
Route::get('/about', [userController::class, 'about']);
Route::get('/keranjang', [userController::class, 'keranjang']);
Route::get('/checkout', [userController::class, 'checkout']);
Route::get('/member', [userController::class, 'member']);
Route::get('/katalog', [userController::class, 'katalog']);
Route::get('/thanks', [userController::class, 'thanks']);
Route::get('/frontartikel', [userController::class, 'artikel']);
Route::get('singleArtikel', [userController::class, 'singleArtikel']);
Route::get('/produk/{id}', [produkController::class, 'show']);

// ROUTES ADMIN
Route::get('/dashboard', [adminController::class, 'dashboard'])->middleware('can:admin');
Route::get('/katalogpromo', [adminController::class, 'katalogpromo']);
Route::get('/toko', [adminController::class, 'toko']);

Route::get('/tambahslider', [SlideController::class, 'tambahslider']);
Route::resource('slider', SlideController::class);


Route::resource('customer', CustomerController::class);
Route::get('member', [CustomerController::class, 'member']);

Route::get('artikelhome', [ArtikelController::class, 'artikelhome']);
Route::get('/artikelAdmin', [ArtikelController::class, 'artikel']);
Route::resource('artikel', ArtikelController::class);
Route::get('tambahArtikel', [ArtikelController::class, 'tambahArtikel']);
Route::get('/artikel/{id}', [ArtikelController::class, 'show']);

Route::get('/katalogproduk', [ProdukController::class, 'katalogproduk']);
Route::resource('produk', ProdukController::class);
Route::get('/tambahProduk', [ProdukController::class, 'tambahProduk']);

Route::get('/kategoriAdmin', [KategoriController::class, 'kategoriAdmin']);
Route::resource('kategori', KategoriController::class);
Route::get('tambahKategori', [KategoriController::class, 'tambahKategori']);
Route::get('/footer', [KategoriController::class, 'footer']);
