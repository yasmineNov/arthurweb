<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\produk;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreprodukRequest;
use App\Http\Requests\UpdateprodukRequest;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\cart;
use App\Models\md_varian;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {

    // }
    function katalogproduk()
    {
        $data = produk::with('kategori')->orderBy('idProduk', 'desc')->paginate();
        return view('admin/katalog-produk', [
            "title" => "Katalog Produk"
        ])->with('data', $data);
    }
    function tambahProduk()
    {
        $kategori = kategori::all();
        return view('admin/katalog-tambahProduk', compact('kategori'), [
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
        if (isset($request->varian_nama)) {
            $request->validate([
                'image' => 'required|mimes:png,jpg,jpeg|max:2048',
                'namaProduk' => 'required',
                'kategori' => 'required',
                'deskripsi' => 'required',
                'varian_nama.*' => 'required',
                'varian_harga.*' => 'required',

            ], [
                // 'idProduk.required' => 'Id produk wajib diisi',
                'idProduk.numeric' => 'Id produk harus angka',
                'idProduk.unique' => 'Id produk sudah ada dalam database',
                'namaProduk.required' => 'Nama produk wajib diisi',
                'kategori.required' => 'kategori wajib diisi',
                'deskripsi.required' => 'Deskripsi wajib diisi',
                'varian_nama.*.required' => 'Varian Nama wajib diisi',
                'varian_harga.*.required' => 'Varian Harga wajib diisi',
            ]);
        } else {
            $request->validate([
                'image' => 'required|mimes:png,jpg,jpeg|max:2048',
                'namaProduk' => 'required',
                'kategori' => 'required',
                'harga' => 'required|numeric',
                'deskripsi' => 'required',
                'varian_nama.*' => 'required',

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
        }

        DB::beginTransaction();
        try {
            $produk = new produk;
            // $dari database = inputan
            // $produk->idProduk = $request->idProduk;
            // $image    = $request->file('image');
            // $filename = date('Y-m-d') . time();
            // $path     = 'image-produk/' . $filename;

            // Storage::disk('public')->put($path, file_get_contents($image));

            $gambar = date('Y-m-d') . time() . '.' . $request->image->extension();
            $request->image->storeAs('public/image-produk/' . $gambar);
            $produk->img = $gambar;

            $produk->namaProduk = $request->namaProduk;
            $produk->idKategori = $request->kategori;
            $produk->harga = $request->harga;
            $produk->custom = $request->custom;
            $produk->jenis = $request->jenis;
            $produk->deskripsi = $request->deskripsi;
            $produk->save();

            if (isset($request->varian_nama)) {
                foreach ($request->varian_nama as $key => $value) {
                    $varian = new md_varian();
                    $varian->id_product = $produk->idProduk;
                    $varian->nama = $value;
                    $varian->harga = $request->varian_harga[$key];
                    $varian->save();
                }
            }

            DB::commit();
            return redirect()->to('katalogproduk')->with('success', 'Berhasil menambah data');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        if (Auth::id()) {
            $produk = produk::with('varian')->findOrFail($id);
            $user = auth()->user();
            $count = cart::where('idUser', $user->id)->count();

            return view('shop-single', compact('count'), [
                'title' => $produk->namaProduk,
                'produk' => $produk,
            ]);
        } else {
            $produk = produk::with('varian')->findOrFail($id);

            return view('shop-single', [
                'title' => $produk->namaProduk,
                'produk' => $produk,
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kategori = kategori::all();
        $data = produk::with('varian')->where('idProduk', $id)->first();
        return view('admin/katalog-editProduk', compact('kategori'), [
            "title" => "edit Produk"
        ])->with('data', $data);
        // return 'HI' . $produk;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $produk = produk::find($id);
        $produk->namaProduk = $request->namaProduk;
        $produk->idKategori = $request->kategori;
        $produk->jenis = $request->jenis;
        if ($request->hasFile('image')) {
            $NamaGambar = produk::find($id);
            $image = $request->file('image');
            $filename = date('Y-m-d') . $image->getClientOriginalName();
            $produk->img = $filename;
            $path = 'image-produk/' . $filename;
            Storage::disk('public')->put($path, file_get_contents($image));

            // Hapus gambar lama jika ada
            // if (isset($data['img'])) {
            //     Storage::disk('public')->delete('image-produk/' . $data['img']);
            // }
            $hapus = 'public/image-produk/' . $NamaGambar->img;
            Storage::delete($hapus);

            $data['img'] = $filename;
        }
        if($request->harga){
            $produk->harga = $request->harga;
        }
        $produk->save();

        if($request->varian_nama){
            md_varian::where('id_product',$id)->delete();
            foreach ($request->varian_nama as $key => $value) {
                $varian = new md_varian();
                $varian->id_product = $produk->idProduk;
                $varian->nama = $value;
                $varian->harga = $request->varian_harga[$key];
                $varian->save();
            }
        }
        return redirect()->to('katalogproduk')->with('success', 'Berhasil mengupdate data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(produk $produk)
    {
        $produk->delete();
        return redirect()->to('katalogproduk')
            ->with('success', 'Data telah berhasil dihapus');
    }
}
