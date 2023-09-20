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
            $cart->product_title = $produk->namaProduk;
            $cart->price = $produk->harga;
            $cart->quantity = $request->quantity;

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
    }
}
