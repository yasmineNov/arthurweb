<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreprodukRequest;
use App\Http\Requests\UpdateprodukRequest;
use Illuminate\Contracts\Session\Session;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.katalog-produk', [
            "title" => "Dashboard"
        ]);
    }
    function tambahProduk()
    {
        return view('admin/katalog-tambahProduk', [
            "title" => "Tambah Produk"
        ]);
    }
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
    public function store(StoreprodukRequest $request)
    {
        $produk = new produk;
        // $dari database = inputan
        $produk->idProduk = $request->idProduk;
        $produk->namaProduk = $request->namaProduk;
        $produk->namaProduk = $request->namaProduk;
        $produk->save();
        dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(produk $produk)
    {
        dd('septian jancok');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateprodukRequest $request, produk $produk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(produk $produk)
    {
        //
    }
}
