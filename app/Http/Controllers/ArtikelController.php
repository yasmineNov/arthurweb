<?php

namespace App\Http\Controllers;

use App\Models\artikel;
use App\Models\kategori;
use App\Models\cart;
use Illuminate\Support\Facades\Auth;
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
        $data = artikel::orderBy('idArtikel', 'desc')->paginate(4);
        return view('admin.artikel-admin', $data, [
            "title" => "artikel"
        ])->with('data', $data);
    }

    public function artikel()
    {
        //
        $data = artikel::orderBy('idArtikel', 'desc')->paginate(4);
        return view('admin.artikel-admin', $data, [
            "title" => "artikel"
        ])->with('data', $data);
    }

    public function artikelhome()
    {
        //
        $data = artikel::orderBy('idArtikel', 'desc')->paginate();
        return view('home', $data, [
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
        ], [
            'judul.required' => 'judul wajib diisi',
            'konten.required' => 'Konten wajib diisi',
        ]);

        $artikel = new artikel;
        $image    = $request->file('image');
        $filename = date('Y-m-d') . $image->getClientOriginalName();
        $path     = 'image-artikel/' . $filename;

        Storage::disk('public')->put($path, file_get_contents($image));

        $artikel->img = $filename;
        $artikel->judul = $request->judul;
        $artikel->konten = $request->konten;
        $artikel->slug = "Artikel";
        $artikel->save();

        return redirect()->to('artikelAdmin')
            ->with('success', 'Berhasil menambah data');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        if (Auth::id()) {
            $kategori = kategori::all();
            $artikel = artikel::findOrFail($id);
            $data2 = artikel::orderBy('idArtikel', 'desc')->paginate(10);
            $user = auth()->user();
            $count = cart::where('idUser', $user->id)->count();

            return view('artikel-single', [
            "title" => $artikel->judul,
            'artikel' => $artikel,
            'data2' => $data2,
            'count' => $count,
            ]);
        } else {
            $kategori = kategori::all();
            $artikel = artikel::findOrFail($id);
            $data2 = artikel::orderBy('idArtikel', 'desc')->paginate(10);

            // return view('artikel-single', compact('artikel'), [
            return view('artikel-single', compact('artikel'), [
                "title" => $artikel->judul,
                'artikel' => $artikel,
                'data2' => $data2
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $data = artikel::where('idArtikel', $id)->first();
        return view('admin.artikel-edit', [
            "title" => "Edit Artikel"
        ])->with('data', $data);;
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(UpdateartikelRequest $request, $id)
    {
        //
        $request->validate([
            'image' => 'mimes:png,jpg,jpeg|max:2048',
            'judul' => 'required',
            'konten' => 'required'
        ], [
            'judul.required' => 'judul wajib diisi',
            'konten.required' => 'Konten wajib diisi',
        ]);

        $data = [
            'judul' => $request->judul,
            'konten' => $request->konten,
        ];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = date('Y-m-d') . $image->getClientOriginalName();
            $path = 'image-artikel/' . $filename;
            Storage::disk('public')->put($path, file_get_contents($image));

            // Hapus gambar lama jika ada
            if (isset($data['img'])) {
                Storage::disk('public')->delete('image-artikel/' . $data['img']);
            }

            $data['img'] = $filename;
        }

        artikel::where('idArtikel', $id)->update($data);


        return redirect()->to('artikelAdmin')
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
