<?php


namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\artikel;
use App\Models\produk;
use App\Models\cart;
use App\Models\slide;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class userController extends Controller
{
    function home()
    {
        if (Auth::id()) {
            $data1 = produk::with('kategori', 'varian')->orderBy('idProduk', 'desc')->paginate(4);
            $dataPost = artikel::orderBy('idArtikel', 'desc')->paginate(4);
            $dataSlider = slide::orderBy('idSlide', 'desc')->paginate();

            // $katalog = produk::with('kategori', 'varian')->orderBy('idProduk', 'desc')->limit(6)->paginate(-1);
            $katalog = produk::with('kategori', 'varian')->orderBy('idProduk', 'desc')->get();
            $kategori = kategori::all();

            $user = auth()->user();
            $count = cart::where('idUser', $user->id)->count();

            return view('home', compact('count'), [
                "title" => "home",
                "data1" => $data1,
                "dataPost" => $dataPost,
                "dataSlider" => $dataSlider,
                "kategori" => $kategori,
                "katalog" => $katalog
            ]);
        } else {
            $data1 = produk::with('kategori', 'varian')->orderBy('idProduk', 'desc')->paginate(4);
            $dataPost = artikel::orderBy('idArtikel', 'desc')->paginate(4);
            $dataSlider = slide::orderBy('idSlide', 'desc')->paginate();

            // $katalog = produk::with('kategori', 'varian')->orderBy('idProduk', 'desc')->limit(6)->paginate(0);
            $katalog = produk::with('kategori', 'varian')->orderBy('idProduk', 'desc')->get();
            $kategori = kategori::all();

            return view('home', [
                "title" => "home",
                "data1" => $data1,
                "dataPost" => $dataPost,
                "dataSlider" => $dataSlider,
                "kategori" => $kategori,
                "katalog" => $katalog
            ]);
        }
    }

    function about()
    {
        if (Auth::id()) {

            $data1 = produk::with('kategori')->orderBy('idProduk', 'desc')->paginate(4);

            $user = auth()->user();
            $count = cart::where('idUser', $user->id)->count();

            return view('about', compact('count'), [
                "title" => "About",
                "name" => "Arthur citra Media",
                "email" => "acmbratang09@gmail.com",
                "image" => "acm.png"
            ]);
        } else {
            return view('about', [
                "title" => "About",
                "name" => "Arthur citra Media",
                "email" => "acmbratang09@gmail.com",
                "image" => "acm.png"
            ]);
        }
    }

    function order()
    {
        if (Auth::id()) {

            $dropdown = produk::where('custom', 1)->get();
            // dd($dropdown);
            $user = auth()->user();
            $count = cart::where('idUser', $user->id)->count();
            return view('cara-order', compact('count'), [
                "title" => "cara-order",
                "name" => "Arthur citra Media",
                "email" => "acmbratang09@gmail.com",
                "image" => "acm.png",
                'dropdown' => $dropdown,
            ]);
        } else
            $dropdown = produk::where('custom', 1)->get(); {
            return view('cara-order', [
                "title" => "cara-order",
                "name" => "Arthur citra Media",
                "email" => "acmbratang09@gmail.com",
                "image" => "acm.png",
                'dropdown' => $dropdown,
            ]);
        }
    }

    function forgotPassword()
    {
        if (Auth::id()) {

            $data1 = produk::with('kategori')->orderBy('idProduk', 'desc')->paginate(4);

            $user = auth()->user();
            $count = cart::where('idUser', $user->id)->count();

            return view('Auth.forgot-password', compact('count'), [
                "title" => "cara-order",
                "name" => "Arthur citra Media",
                "email" => "acmbratang09@gmail.com",
                "image" => "acm.png"
            ]);
        } else {
            return view('Auth.forgot-password', [
                "title" => "cara-order",
                "name" => "Arthur citra Media",
                "email" => "acmbratang09@gmail.com",
                "image" => "acm.png"
            ]);
        }
    }

    function keranjang()
    {
        if (Auth::id()) {

            $user = auth()->user();

            // $cart = cart::with('produk')->orderBy('idProduk', 'desc')->paginate(4);

            $kol = DB::table('carts')
                ->select('carts.id', 'carts.qty', 'produks.harga', 'carts.idUser')
                ->leftjoin('produks', 'produks.idProduk', '=', 'carts.idProduk')
                ->where('carts.idUser', $user->id)
                ->orderBy('carts.idProduk', 'desc')
                ->get();
            $cart = cart::where('idUser', $user->id)->with('produk')->orderBy('idProduk', 'desc')->get();
            if ($kol) {
                $tampung = [];
                foreach ($kol as $key => $value) {

                    $tampung[] += ($kol[$key]->qty * $kol[$key]->harga);
                }
                $hasil = 0;
                foreach ($tampung as $key => $value) {
                    $hasil += $value;
                }
            }
            $count = cart::where('idUser', $user->id)->count();


            return view('cart', compact('count'), [
                "title" => "Keranjang",
                // "data1" => $data1,
                // "pict" => $pict,
                "cart" => $cart,
                "subtotal" => $tampung,
                "total" => $hasil,
            ]);
        } else {
            $data1 = cart::with('produk')->orderBy('idProduk', 'desc')->paginate(4);

            return view('cart', [
                "title" => "Keranjang",
                "data1" => $data1,
            ]);
        }
    }

    // public function destroy(cart $cart)
    // {
    //     //
    //     $cart->delete();
    //     return redirect()->to('cart');
    // }

    function kategori()
    {
        $data3 = kategori::orderBy('idKategori', 'desc')->paginate();
        return view('artikel', [
            "title" => "artikel"
        ])->with('data3', $data3);
    }

    function artikel()
    {
        if (Auth::id()) {
            $data1 = produk::with('kategori')->orderBy('idProduk', 'desc')->paginate(4);
            $user = auth()->user();
            $count = cart::where('idUser', $user->id)->count();

            $data2 = artikel::orderBy('idArtikel', 'desc')->paginate(4);

            return view('artikel', compact('count'), [
                "title" => "artikel"
            ])->with('data2', $data2);
        } else {
            $data2 = artikel::orderBy('idArtikel', 'desc')->paginate(4);

            return view('artikel', [
                "title" => "artikel"
            ])->with('data2', $data2);
        }
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
        if (Auth::id()) {
            $user = auth()->user();

            // $cart = cart::with('produk')->orderBy('idProduk', 'desc')->paginate(4);

            $cek = User::with(['cart' => function ($query) {
                $query->whereNull('deleted_at');
            }, 'cart.produk', 'cart.produk.varian'])
                ->where('id', $user->id)
                ->first();

            if ($cek) {
                $tampung = [];
                $ambil = [];
                foreach ($cek->cart as $key => $value) {
                    if (isset($value->id_varian)) {
                        foreach ($value->produk->varian as $key => $varian) {
                            if ($varian->id == $value->id_varian) {
                                $tampung1 = [
                                    'Total_Harga' => ($value->qty * $varian->harga),
                                    'img' => $value->produk->img,
                                    'harga' => $varian->harga,
                                    'qty' => $value->qty,
                                    'nama' => $value->produk->namaProduk,
                                    'id' => $value->id,
                                    'idProduk' => $value->produk->id,
                                ];
                            }
                        }
                    } else if (isset($value->lebar)) {
                        $harga = $value->produk->harga;
                        if ($value->produk->jenis == "banner") {
                            if ($value->lebar < $value->tinggi && $value->tinggi < 320 && $value->tinggi > 100) {
                                $lebar = $value->tinggi;
                                $tinggi = $value->lebar;
                            } else {
                                $lebar = $value->lebar;
                                $tinggi = $value->tinggi;
                            }
                            if ($lebar <= 100) {
                                $lebar = 100;
                                $hasil_custom = (($lebar / 100) * ($tinggi / 100)) * $harga;
                                if (substr(strval($hasil_custom), -3) > 0) {
                                    $hasil_custom = ceil($hasil_custom / 500) * 500;
                                }
                                if ($value->finishing == "lebihan" || $value->finishing == "potong press") {
                                    $hasil_custom = $hasil_custom;
                                } else {
                                    $hasil_custom = $hasil_custom + 1000;
                                }
                            } else if ($lebar > 100 && $lebar < 160) {
                                $hasil_custom = (($lebar / 100) * ($tinggi / 100)) * $harga;
                                if (substr(strval($hasil_custom), -3) > 0) {
                                    $hasil_custom = ceil($hasil_custom / 500) * 500;
                                }
                                if ($value->finishing == "lebihan" || $value->finishing == "potong press") {
                                    $hasil_custom = $hasil_custom;
                                } else {
                                    $hasil_custom = $hasil_custom + 1000;
                                }
                            } else if ($lebar >= 160 && $lebar < 220) {
                                $lebar = 220;
                                $hasil_custom = (($lebar / 100) * ($tinggi / 100)) * $harga;
                                if (substr(strval($hasil_custom), -3) > 0) {
                                    $hasil_custom = ceil($hasil_custom / 500) * 500;
                                }
                                if ($value->finishing == "lebihan" || $value->finishing == "potong press") {
                                    $hasil_custom = $hasil_custom;
                                } else {
                                    $hasil_custom = $hasil_custom + 1000;
                                }
                            } else if ($lebar >= 220 && $lebar < 260) {
                                $lebar = 260;
                                $hasil_custom = (($lebar / 100) * ($tinggi / 100)) * $harga;
                                if (substr(strval($hasil_custom), -3) > 0) {
                                    $hasil_custom = ceil($hasil_custom / 500) * 500;
                                }
                                if ($value->finishing == "lebihan" || $value->finishing == "potong press") {
                                    $hasil_custom = $hasil_custom;
                                } else {
                                    $hasil_custom = $hasil_custom + 1000;
                                }
                            } else if ($lebar >= 260 && $lebar < 320) {
                                $lebar = 320;
                                $hasil_custom = (($lebar / 100) * ($tinggi / 100)) * $harga;
                                if (substr(strval($hasil_custom), -3) > 0) {
                                    $hasil_custom = ceil($hasil_custom / 500) * 500;
                                }
                                if ($value->finishing == "lebihan" || $value->finishing == "potong press") {
                                    $hasil_custom = $hasil_custom;
                                } else {
                                    $hasil_custom = $hasil_custom + 1000;
                                }
                            }
                        } else if ($value->produk->jenis == "stiker") {
                            if ($value->lebar < $value->tinggi && $value->tinggi < 152 && $value->tinggi > 100) {
                                $lebar = $value->tinggi;
                                $tinggi = $value->lebar;
                            } else {
                                $lebar = $value->lebar;
                                $tinggi = $value->tinggi;
                            }
                            if ($lebar <= 100) {
                                $lebar = 106;
                                $hasil_custom = (($lebar / 100) * ($tinggi / 100)) * $harga;
                                if (substr(strval($hasil_custom), -3) > 0) {
                                    $hasil_custom = ceil($hasil_custom / 500) * 500;
                                }
                            } else if ($lebar > 100 && $lebar <= 125) {
                                $lebar = 127;
                                $hasil_custom = (($lebar / 100) * ($tinggi / 100)) * $harga;
                                if (substr(strval($hasil_custom), -3) > 0) {
                                    $hasil_custom = ceil($hasil_custom / 500) * 500;
                                }
                            } else if ($lebar > 127 && $lebar <= 152) {
                                $lebar = 155;
                                $hasil_custom = (($lebar / 100) * ($tinggi / 100)) * $harga;
                                if (substr(strval($hasil_custom), -3) > 0) {
                                    $hasil_custom = ceil($hasil_custom / 500) * 500;
                                }
                            }
                        } else if ($value->jenis == "albatros" || $value->jenis == "luster") {
                            if ($value->lebar < $value->tinggi && $value->tinggi < 126 && $value->tinggi > 100) {
                                $lebar = $value->tinggi;
                                $tinggi = $value->lebar;
                            } else {
                                $lebar = $value->lebar;
                                $tinggi = $value->tinggi;
                            }

                            if ($lebar <= 87) {
                                $lebar = 100;
                                $hasil_custom = (($lebar / 100) * ($tinggi / 100)) * $harga;
                                if (substr(strval($hasil_custom), -3) > 0) {
                                    $hasil_custom = ceil($hasil_custom / 500) * 500;
                                }
                            } else if ($lebar > 87 && $lebar <= 125) {
                                $lebar = 127;
                                $hasil_custom = (($lebar / 100) * ($tinggi / 100)) * $harga;
                                if (substr(strval($hasil_custom), -3) > 0) {
                                    $hasil_custom = ceil($hasil_custom / 500) * 500;
                                }
                            }
                        }
                        $tampung1 = [
                            'Total_Harga' => $hasil_custom * $value->qty,
                            'img' => $value->produk->img,
                            'harga' => $hasil_custom,
                            'qty' => $value->qty,
                            'nama' => $value->produk->namaProduk,
                            'id' => $value->id,
                            'idProduk' => $value->produk->id,
                        ];
                    } else {
                        $tampung1 = [
                            'Total_Harga' => ($value->qty * $value->produk->harga),
                            'img' => $value->produk->img,
                            'harga' => $value->produk->harga,
                            'qty' => $value->qty,
                            'nama' => $value->produk->namaProduk,
                            'id' => $value->id,
                            'idProduk' => $value->produk->idProduk,
                        ];
                    }
                    $ambil[] = $tampung1;
                }
                $hasil = 0.0;
                foreach ($ambil as $key => $value) {
                    $hasil += $value['Total_Harga'];
                }
            }
            // $kol = DB::table('carts')
            //     ->select('carts.id', 'carts.qty', 'produks.harga', 'carts.idUser')
            //     ->leftjoin('produks', 'produks.idProduk', '=', 'carts.idProduk')
            //     ->where('carts.idUser', $user->id)
            //     ->orderBy('carts.idProduk', 'desc')
            //     ->get();
            $cart = cart::where('idUser', $user->id)->with('produk')->get();
            // if ($kol) {
            //     $tampung = [];
            //     foreach ($kol as $key => $value) {

            //         $tampung[] += ($kol[$key]->qty * $kol[$key]->harga);
            //     }
            //     $hasil = 0;
            //     foreach ($tampung as $key => $value) {
            //         $hasil += $value;
            //     }
            // }
            $count = cart::where('idUser', $user->id)->count();

            // dd($ambil);
            return view('checkout', compact('count'), [
                "title" => "Checkout",
                "cart" => $ambil,
                "total" => $hasil,
            ]);
        } else {
            $data2 = artikel::orderBy('idArtikel', 'desc')->paginate(4);

            return view('checkout', [
                "title" => "Checkout"
            ]);
        }
    }
    function member()
    {
        if (Auth::id()) {
            $data1 = produk::with('kategori')->orderBy('idProduk', 'desc')->paginate(4);
            $user = auth()->user();
            $count = cart::where('idUser', $user->id)->count();

            return view('contact', [
                "title" => "Member"
            ]);
        } else {
            return view('contact', [
                "title" => "Member"
            ]);
        }
    }

    function katalog()
    {
        if (Auth::id()) {
            $katalog = produk::with('kategori', 'varian')->orderBy('idProduk', 'desc')->limit(6)->paginate(6);
            $data1 = produk::with('kategori', 'varian')->orderBy('idProduk', 'desc')->paginate(4);
            $kategori = kategori::all();
            // $GengProduk = produk::where('namaKategori', $kategori->namaKategori)->with('produk')->orderBy('idProduk', 'desc')->paginate(6);
            $user = auth()->user();
            $count = cart::where('idUser', $user->id)->count();

            return view('shop', compact('count'), [
                "title" => "Katalog",
                "kategori" => $kategori,
                "katalog" => $katalog,
                // "GengProduk" => $GengProduk,
            ]);
        } else {
            $katalog = produk::with('kategori', 'varian')->orderBy('idProduk', 'desc')->paginate(6);
            $data1 = produk::with('kategori', 'varian')->orderBy('idProduk', 'desc')->paginate(6);
            $kategori = kategori::all();
            // $GengProduk = produk::where('idKategori', $kategori->idKategori)->with('produk')->orderBy('idProduk', 'desc')->paginate(4);
            $user = auth()->user();
            return view('shop', [
                "title" => "Katalog",
                "kategori" => $kategori,
                "katalog" => $katalog,
                // "GengProduk" => $GengProduk,
            ]);
        }
    }


    function search(Request $request)
    {
        if (Auth::id()) {
            $data1 = produk::with('kategori')->orderBy('idProduk', 'desc')->paginate(4);
            $user = auth()->user();
            $count = cart::where('idUser', $user->id)->count();

            $query = $request->input('query'); // Mendapatkan kata kunci pencarian dari input pengguna

            // Melakukan pencarian produk dengan Eloquent
            $produk = produk::where('namaProduk', 'like', '%' . $query . '%')
                // ->orWhere('deskripsi', 'like', '%' . $query . '%')
                ->get();

            return view('hasil_pencarian', compact('count'), [
                "title" => "hasilPencarian",
                'produk' => $produk,
                'query' => $query
            ]);
        } else {
            $query = $request->input('query'); // Mendapatkan kata kunci pencarian dari input pengguna

            // Melakukan pencarian produk dengan Eloquent
            $produk = produk::where('namaProduk', 'like', '%' . $query . '%')
                // ->orWhere('deskripsi', 'like', '%' . $query . '%')
                ->get();

            return view('hasil_pencarian', [
                "title" => "hasilPencarian",
                'produk' => $produk,
                'query' => $query
            ]);
        }
    }

    // public function shop_kategori()
    // {
    //     //
    //     $data_kategori = kategori::orderBy('idKategori', 'desc')->paginate();
    //     return view('shop', $data_kategori, [
    //         "title" => "kategori"
    //     ])->with('data', $data_kategori);
    // }

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
