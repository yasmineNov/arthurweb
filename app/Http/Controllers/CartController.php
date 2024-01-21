<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\User;
use App\Models\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function cartView()
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


            return response()->json([
                "cart" => $ambil,
                "total" => $hasil,
            ]);
        } else {
            return response()->json([
                "cart" => '',
                "subtotal" => '',
                "total" => '',
            ]);
        }
    }
    public function addcart(Request $request, $id)
    {
        if (Auth::id()) {
            $user = auth()->user();
            $produk = produk::find($id);

            $harga = $produk->harga;
            $request->validate([
                'qty' => 'required|numeric',

            ], [
                'qty.required' => 'Qty wajib diisi',
            ]);

            // Cari apakah produk sudah ada di keranjang pengguna
            if (isset($request->varian)) {
                $existingCart = cart::where('idUser', $user->id)
                    ->where('idProduk', $produk->idProduk)->where('id_varian', $request)
                    ->first();
            } elseif ($request->tinggi) {
                $request->validate([
                    'lebar' => 'required|numeric',
                    'tinggi' => 'required|numeric',

                ], [
                    'lebar.required' => 'lebar wajib diisi',
                    'lebar.numeric' => 'lebar harus berupa angka',
                    'tinggi.required' => 'tinggi wajib diisi',
                    'tinggi.numeric' => 'tinggi harus beruba angka',
                ]);

                if ($request->jenis == "banner") {
                    if ($request->lebar < $request->tinggi && $request->tinggi < 320 && $request->tinggi > 100) {
                        $lebar = $request->tinggi;
                        $tinggi = $request->lebar;
                    } else {
                        $lebar = $request->lebar;
                        $tinggi = $request->tinggi;
                    }
                    if ($lebar <= 100) {
                        $lebar = 100;
                        $hasil = (($lebar / 100) * ($tinggi / 100)) * $harga;
                        if (substr(strval($hasil), -3) > 0) {
                            $hasil = ceil($hasil / 500) * 500;
                        }
                        if ($request->finishing == "lebihan" || $request->finishing == "potong press") {
                            $hasil = $hasil;
                        } else {
                            $hasil = $hasil + 1000;
                        }
                    } else if ($lebar > 100 && $lebar < 160) {
                        $hasil = (($lebar / 100) * ($tinggi / 100)) * $harga;
                        if (substr(strval($hasil), -3) > 0) {
                            $hasil = ceil($hasil / 500) * 500;
                        }
                        if ($request->finishing == "lebihan" || $request->finishing == "potong press") {
                            $hasil = $hasil;
                        } else {
                            $hasil = $hasil + 1000;
                        }
                    } else if ($lebar >= 160 && $lebar < 220) {
                        $lebar = 220;
                        $hasil = (($lebar / 100) * ($tinggi / 100)) * $harga;
                        if (substr(strval($hasil), -3) > 0) {
                            $hasil = ceil($hasil / 500) * 500;
                        }
                        if ($request->finishing == "lebihan" || $request->finishing == "potong press") {
                            $hasil = $hasil;
                        } else {
                            $hasil = $hasil + 1000;
                        }
                    } else if ($lebar >= 220 && $lebar < 260) {
                        $lebar = 260;
                        $hasil = (($lebar / 100) * ($tinggi / 100)) * $harga;
                        if (substr(strval($hasil), -3) > 0) {
                            $hasil = ceil($hasil / 500) * 500;
                        }
                        if ($request->finishing == "lebihan" || $request->finishing == "potong press") {
                            $hasil = $hasil;
                        } else {
                            $hasil = $hasil + 1000;
                        }
                    } else if ($lebar >= 260 && $lebar < 320) {
                        $lebar = 320;
                        $hasil = (($lebar / 100) * ($tinggi / 100)) * $harga;
                        if (substr(strval($hasil), -3) > 0) {
                            $hasil = ceil($hasil / 500) * 500;
                        }
                        if ($request->finishing == "lebihan" || $request->finishing == "potong press") {
                            $hasil = $hasil;
                        } else {
                            $hasil = $hasil + 1000;
                        }
                    } else if ($lebar > 320) {
                        return redirect()->back()->withErrors(["msg" => 'Untuk ukuran diatas 320cm product banner. Mohon hubungi 087858860888.']);
                    }
                } else if ($request->jenis == "stiker") {
                    if ($request->lebar < $request->tinggi && $request->tinggi < 152 && $request->tinggi > 100) {
                        $lebar = $request->tinggi;
                        $tinggi = $request->lebar;
                    } else {
                        $lebar = $request->lebar;
                        $tinggi = $request->tinggi;
                    }
                    if ($lebar <= 100) {
                        $lebar = 106;
                        $hasil = (($lebar / 100) * ($tinggi / 100)) * $harga;
                        if (substr(strval($hasil), -3) > 0) {
                            $hasil = ceil($hasil / 500) * 500;
                        }
                    } else if ($lebar > 100 && $lebar <= 125) {
                        $lebar = 127;
                        $hasil = (($lebar / 100) * ($tinggi / 100)) * $harga;
                        if (substr(strval($hasil), -3) > 0) {
                            $hasil = ceil($hasil / 500) * 500;
                        }
                    } else if ($lebar > 127 && $lebar <= 152) {
                        $lebar = 155;
                        $hasil = (($lebar / 100) * ($tinggi / 100)) * $harga;
                        if (substr(strval($hasil), -3) > 0) {
                            $hasil = ceil($hasil / 500) * 500;
                        }
                    } else if ($lebar > 152) {
                        return redirect()->back()->withErrors(["msg" => 'Untuk ukuran diatas 152cm pada product stiker. Mohon hubungi 087858860888.']);
                    }
                } else if ($request->jenis == "albatros" || $request->jenis == "luster") {
                    if ($request->lebar < $request->tinggi && $request->tinggi < 126 && $request->tinggi > 100) {
                        $lebar = $request->tinggi;
                        $tinggi = $request->lebar;
                    } else {
                        $lebar = $request->lebar;
                        $tinggi = $request->tinggi;
                    }

                    if ($lebar <= 87) {
                        $lebar = 100;
                        $hasil = (($lebar / 100) * ($tinggi / 100)) * $harga;
                        if (substr(strval($hasil), -3) > 0) {
                            $hasil = ceil($hasil / 500) * 500;
                        }
                    } else if ($lebar > 87 && $lebar <= 125) {
                        $lebar = 127;
                        $hasil = (($lebar / 100) * ($tinggi / 100)) * $harga;
                        if (substr(strval($hasil), -3) > 0) {
                            $hasil = ceil($hasil / 500) * 500;
                        }
                    } else if ($lebar > 127) {
                        return redirect()->back()->withErrors(["msg" => 'Untuk ukuran diatas 127cm pada product ini. Mohon hubungi 087858860888.']);
                    }
                }
            }
            $existingCart = cart::where('idUser', $user->id)
                ->where('idProduk', $produk->idProduk)->whereNull('id_varian')
                ->first();


            if ($existingCart) {
                if ($existingCart->id_varian == $request->varian) {
                } else {
                    $existingCart->qty += 1;
                    $existingCart->save();
                }
                // Jika produk sudah ada di keranjang, tingkatkan jumlahnya
            } else {
                $cart = new cart;
                $cart->idUser = $user->id;
                $cart->idProduk = $produk->idProduk;
                $cart->qty = $request->qty;
                $cart->id_varian = isset($request->varian) ? $request->varian : null;
                $cart->lebar = isset($request->lebar) ? $request->lebar  : null;
                $cart->tinggi = isset($request->tinggi) ? $request->tinggi : null;
                $cart->finishing = isset($request->finishing) ? $request->finishing : null;
                $cart->save();

                // Jika produk belum ada di keranjang, tambahkan sebagai item baru
            }


            return redirect()->back();
        } else {
            return redirect('login');
        }
    }

    public function increaseQty($id)
    {
        // Temukan item keranjang berdasarkan ID dan tingkatkan qty
        DB::beginTransaction();
        try {
            $cartItem = Cart::find($id);
            $cartItem->qty++;
            $cartItem->save();

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

                DB::commit();
                return response()->json([
                    "cart" => $ambil,
                    "total" => $hasil,
                ]);
            }
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
        }
    }

    public function decreaseQty($id)
    {
        DB::beginTransaction();
        try { // Temukan item keranjang berdasarkan ID dan kurangkan qty jika qty > 1
            $cartItem = Cart::find($id);
            if ($cartItem->qty > 1) {
                $cartItem->qty--;
                $cartItem->save();
            }
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

                DB::commit();
                return response()->json([
                    "cart" => $ambil,
                    "total" => $hasil,
                ]);
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function tambahinput($qtyGanti, $id)
    {

        DB::beginTransaction();
        try {
            $cartItem = Cart::find($id);
            if($qtyGanti != 0){
                $cartItem->qty = $qtyGanti;
            }
            $cartItem->save();

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

                DB::commit();
                return response()->json([
                    "cart" => $ambil,
                    "total" => $hasil,
                ]);
            }
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
        }
    }

    public function deletedCart($id)
    {
        $user = auth()->user();
        $cart = cart::where('id', $id)->where('idUser', $user->id);
        $cart->delete();
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


            return response()->json([
                "cart" => $ambil,
                "total" => $hasil,
            ]);
        }
    }
    // public function jumlahCart(Request $request, $id)
    // {
    //     $usertype=Auth::user()->usertype;

    //     if ($usertype=='1')
    //     {
    //         return view('home')
    //     }
    // }


    /**
     * Show the form for creating a new resource.
     */

    public function deletecart($id)
    {
        //
        $data = cart::find($id);
        $data->delete();
        //  return redirect()->to('cart');
        return redirect()->back();
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cart $cart)
    {
        //

        if (Auth::id()) {

            // $produk = produk::find($id);
            // $cart = cart::find($id);
            // $cart = cart::where('name', $user->name)->get($id);

            // $cart = new cart;
            // $cart->name = $user->name;
            // $cart->img = $produk->img;
            // $cart->product_title = $produk->namaProduk;
            // $cart->quantity = $produk->harga;
            // $cart->price = $produk->harga;

            // $user = auth()->user();

            $cart->delete();
            return redirect()->to('cart');

            // return redirect()->back();
        } else {
            // $cart = cart::find($id);
            $cart->delete();
            return redirect()->to('cart');
        }
    }
}
