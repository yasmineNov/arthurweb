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
        $request->validate([
            'idProduk' => 'required|numeric|unique:produks,idProduk',
            'namaProduk' => 'required',
            'kategori' => 'required',
            'harga' => 'required|numeric',
            'deskripsi' => 'required',

        ], [
            'idProduk.required' => 'Id produk wajib diisi',
            'idProduk.numeric' => 'Id produk harus angka',
            'idProduk.unique' => 'Id produk sudah ada dalam database',
            'namaProduk.required' => 'Nama produk wajib diisi',
            'kategori.required' => 'kategori wajib diisi',
            'harga.required' => 'Harga wajib diisi',
            'harga.numeric' => 'Harga harus dalam bentuk angka',
            'deskripsi.required' => 'Deskripsi wajib diisi',
        ]);

        $produk = new produk;
        // $dari database = inputan
        $produk->idProduk = $request->idProduk;
        $produk->namaProduk = $request->namaProduk;
        $produk->kategori = $request->kategori;
        $produk->Harga = $request->harga;
        $produk->deskripsi = $request->deskripsi;
        $produk->save();
        // dd($request->all());

        return redirect()->to('katalogproduk')->with('success', 'Berhasil menambah data');
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
