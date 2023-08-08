<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorekategoriRequest;
use App\Http\Requests\UpdatekategoriRequest;
use Illuminate\Support\Facades\Storage;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = kategori::orderBy('idKategori', 'desc')->paginate();
        return view('admin.kategori', $data, [
            "title" => "kategori"
        ])->with('data', $data);
    }

    public function kategori()
    {
        //
        $data = kategori::orderBy('idKategori', 'desc')->paginate();
        return view('admin.kategori', $data, [
            "title" => "kategori"
        ])->with('data', $data);
    }

    function tambahkategori()
    {
        return view('admin/tambah-kategori', [
            "title" => "Tambah Kategori"
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
    public function store(StorekategoriRequest $request)
    {
        //                                                                                                      
        $request->validate([
            'namaKategori' => 'required'
        ]);
        $kategori = new kategori;
        $kategori->namaKategori = $request->namaKategori;
        $kategori->save();

        return redirect()->to('kategori')
            ->with('success', 'Berhasil menambah data');
    }

    /**
     * Display the specified resource.
     */
    public function show(kategori $kategori)
    {
        //
        return view('admin.show-kategori', compact('kategori'), [
            "title" => "Tambah Kategori"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(kategori $kategori)
    {
        //
        return view('admin.edit-kategori', compact('kategori'), [
            "title" => "Edit Kategori"
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatekategoriRequest $request, kategori $kategori)
    {
        //
        $request->validate([
            'namaKategori' => 'required'
        ]);

        $kategori->update($request->all());

        return redirect()->to('kategori')
            ->with('success', 'Berhasil Mengedit data');
    }

    /**
     * Remove the specified resource from storage
     */
    public function destroy(kategori $kategori)
    {
        //
        $kategori->delete();
        return redirect()->to('kategori')
            ->with('success', 'Data telah berhasil dihapus');
    }
}
