<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Http\Requests\StorekategoriRequest;
use App\Http\Requests\UpdatekategoriRequest;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data['kategoris'] = kategori::orderBy('idKategori', 'desc')->paginate(5);
        return view('admin.kategori', $data, [
            "title" => "kategori"
        ]);
    }

    function kategori()
    {

        return view('admin/kategori', [
            "title" => "kategori"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('kategoris.create');
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
        $kategori->name = $request->namaKategori;
        $kategori->save();

        return redirect()->route('kategori')
            ->with('success', 'Company has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(kategori $kategori)
    {
        //
        return view('kategori', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(kategori $kategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatekategoriRequest $request, kategori $kategori)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(kategori $kategori)
    {
        //
        $kategori->delete();
        return redirect()->route('kategori')
            ->with('success', 'kategori has been deleted successfully');
    }
}
