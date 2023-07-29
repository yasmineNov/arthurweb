<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreprodukRequest;
use App\Http\Requests\UpdateprodukRequest;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    function katalogproduk()
    {
        $data = produk::orderBy('idProduk', 'desc')->paginate();
        return view('admin/katalog-produk', [
            "title" => "Katalog Produk"
        ])->with('data', $data);
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
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'namaProduk' => 'required',
            'kategori' => 'required',
            'harga' => 'required|numeric',
            'deskripsi' => 'required',

        ], [
            // 'idProduk.required' => 'Id produk wajib diisi',
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
        // $produk->idProduk = $request->idProduk;
        $image    = $request->file('image');
        $filename = date('Y-m-d') . $image->getClientOriginalName();
        $path     = 'image-produk/' . $filename;

        Storage::disk('public')->put($path, file_get_contents($image));

        $produk->img = $filename;
        $produk->namaProduk = $request->namaProduk;
        // $produk->kategori = $request->kategori;
        $produk->harga = $request->harga;
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
        $data = produk::where('idProduk', $produk)->first();
        return view('admin/katalog-editProduk', [
            "title" => "edit Produk"
        ])->with('data', $data);
        // return 'HI' . $produk;
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
