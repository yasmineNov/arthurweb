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

     public function cartView(){
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


            return response()->json([
                "cart" => $cart,
                "subtotal" => $tampung,
                "total" => $hasil,
            ]);
        }else{
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


            // Cari apakah produk sudah ada di keranjang pengguna
            if(isset($request->varian)){
                $existingCart = cart::where('idUser', $user->id)
                    ->where('idProduk', $produk->idProduk)->where('id_varian',$request)
                    ->first();
            }else{
                $existingCart = cart::where('idUser', $user->id)
                    ->where('idProduk', $produk->idProduk)->whereNull('id_varian')
                    ->first();
            }

            if ($existingCart) {
                if($existingCart->id_varian == $request->varian){

                }else{
                    $existingCart->qty += 1;
                    $existingCart->save();
                }
                // Jika produk sudah ada di keranjang, tingkatkan jumlahnya
            } else {
                if(isset($request->varian)){
                    $cart = new cart;
                    $cart->idUser = $user->id;
                    $cart->idProduk = $produk->idProduk;
                    $cart->qty = $request->qty;
                    $cart->id_varian = isset($request->varian) ? $request->varian : '';
                    $cart->lebar = isset($request->lebar) ? $request->lebar  : '';
                    $cart->tinggi = isset($request->tinggi) ? $request->tinggi : '';
                    $cart->save();
                }else{
                    $cart = new cart;
                    $cart->idUser = $user->id;
                    $cart->idProduk = $produk->idProduk;
                    $cart->qty = $request->qty;
                    $cart->save();
                }
                // Jika produk belum ada di keranjang, tambahkan sebagai item baru
            }


            return redirect()->back();
        } else {
            return redirect('login');
        }
    }

    public function increaseQty($id)
    {
        // dd($id);
        // Temukan item keranjang berdasarkan ID dan tingkatkan qty
        DB::beginTransaction();
        try {
            $cartItem = Cart::find($id);
            // dd($cartItem);
            $cartItem->qty++;
            $cartItem->save();

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

                DB::commit();
                return response()->json([
                    'newQty' => $cartItem->qty,
                    "cart" => $cart,
                    "subtotal" => $tampung,
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
        // dd($id);
        DB::beginTransaction();
        try { // Temukan item keranjang berdasarkan ID dan kurangkan qty jika qty > 1
            $cartItem = Cart::find($id);
            // dd($cartItem);
            if ($cartItem->qty > 1) {
                $cartItem->qty--;
                $cartItem->save();
            }
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

                DB::commit();
                return response()->json([
                    'newQty' => $cartItem->qty,
                    "cart" => $cart,
                    "subtotal" => $tampung,
                    "total" => $hasil,
                ]);
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function deletedCart($id){
        if (Auth::id()) {
            $user = auth()->user();

            $cart = cart::where('idProduk',$id)->where('idUser',$user->id);
            $cart->delete();

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
            return response()->json([
                "cart" => $cart,
                "subtotal" => $tampung,
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
