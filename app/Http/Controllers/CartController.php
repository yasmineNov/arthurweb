<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\User;
use App\Models\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function addcart(Request $request, $id)
    {
        if (Auth::id()) {
            $user = auth()->user();

            $produk = produk::find($id);

            $cart = new cart;
            $cart->name = $user->name;
            $cart->qty = $request->qty;
            $cart->subtotal = $request->qty * $produk->price;

            $cart->idProduk = $produk->idProduk;

            $cart->save();

            return redirect()->back();
        } else {
            return redirect('login');
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
