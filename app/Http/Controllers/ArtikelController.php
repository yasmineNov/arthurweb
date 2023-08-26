<?php

namespace App\Http\Controllers;

use App\Models\artikel;
use App\Http\Requests\StoreartikelRequest;
use App\Http\Requests\UpdateartikelRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = artikel::orderBy('idArtikel', 'desc')->paginate();
        return view('admin.artikel-admin', $data, [
            "title" => "artikel"
        ])->with('data', $data);
    }

    public function artikel()
    {
        //
        $data = artikel::orderBy('idArtikel', 'desc')->paginate();
        return view('admin.artikel-admin', $data, [
            "title" => "artikel"
        ])->with('data', $data);
    }

    function tambahArtikel()
    {
        return view('admin/artikel-tambahArtikel', [
            "title" => "Tambah Artikel"
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
    public function store(StoreartikelRequest $request)
    {
        //
        $request->validate([
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'judul' => 'required',
            'konten' => 'required'
        ]);
        $artikel = new artikel;
        $image    = $request->file('image');
        $filename = date('Y-m-d') . $image->getClientOriginalName();
        $path     = 'image-artikel/' . $filename;

        Storage::disk('public')->put($path, file_get_contents($image));

        $artikel->img = $filename;


        $artikel->judul = $request->judul;
        $artikel->konten = $request->konten;
        $artikel->slug = "Edit Artikel";
        $artikel->save();

        return redirect()->to('artikel')
            ->with('success', 'Berhasil menambah data');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $artikel = artikel::findOrFail($id);
        return view('artikel-single', compact('artikel'), [
            "title" => $artikel->judul,
            'artikel' => $artikel
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(artikel $artikel)
    {
        //
        $data = artikel::where('idArtikel', $artikel)->first();
        return view('admin.artikel-edit', compact('artikel'), [
            "title" => "Edit Artikel"
        ])->with('data', $data);;
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(UpdateartikelRequest $request, artikel $artikel)
    {
        //
        $request->validate([
            'img' => 'required|mimes:png,jpg,jpeg|max:2048',
            'judul' => 'required',
            'konten' => 'required'
        ]);

        $data = [
            'judul' => $request->judul,
            'konten' => $request->konten,
        ];

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $filename = date('Y-m-d') . $image->getClientOriginalName();
            $path = 'image-artikel/' . $filename;
            Storage::disk('public')->put($path, file_get_contents($image));

            // Hapus gambar lama jika ada
            if (isset($data['img'])) {
                Storage::disk('public')->delete('image-artikel/' . $data['img']);
            }

            $data['img'] = $filename;
        }

        artikel::where('idArtikel', $artikel)->update($data);


        return redirect()->to('artikel')
            ->with('success', 'Berhasil Mengedit data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(artikel $artikel)
    {
        //
        $artikel->delete();
        return redirect()->to('artikel')
            ->with('success', 'Data telah berhasil dihapus');
    }
}
