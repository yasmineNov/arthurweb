<?php

namespace App\Http\Controllers;

use App\Models\slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function slider()
    // {
    //     //
    //     $data = slide::orderBy('idSlide', 'desc')->paginate();
    //     return view('admin/slider', $data, [
    //         "title" => "slider"
    //     ])->with('data', $data);
    // }

    function tambahslider()
    {
        return view('admin/slider-tambah', [
            "title" => "Tambah slider"
        ]);
    }
    public function index()
    {
        //
        $data = slide::orderBy('idSlide', 'desc')->paginate();
        return view('admin/slider', $data, [
            "title" => "slider"
        ])->with('data', $data);
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
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'url' => 'required',
        ], [
            'image.mimes' => 'gambar harus berformat png, jpg, atau jpeg',
            'image.max' => 'gambar maksimal 2048kb',
            'konten.required' => 'url wajib diisi',

        ]);

        $slider = new slide;
        $image    = $request->file('image');
        $filename = date('Y-m-d') . $image->getClientOriginalName();
        $path     = 'image-slider/' . $filename;

        Storage::disk('public')->put($path, file_get_contents($image));

        $slider->img = $filename;
        $slider->url = $request->url;

        $slider->save();

        return redirect()->to('slider')
            ->with('success', 'Berhasil menambah data');
    }

    /**
     * Display the specified resource.
     */
    public function show(slide $slide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $data = slide::where('idSlide', $id)->first();
        return view('admin/slider-edit', [
            "title" => "Edit Slider"
        ])->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'url' => 'required',
        ], [
            'image.mimes' => 'gambar harus berformat png, jpg, atau jpeg',
            'image.max' => 'gambar maksimal 2048kb',
            'konten.required' => 'url wajib diisi',

        ]);

        $slider = slide::find($id);
        $slider->url = $request->url;
        if ($request->hasFile('image')) {
            $NamaGambar = slide::find($id);
            $image = $request->file('image');
            $filename = date('Y-m-d') . $image->getClientOriginalName();
            $slider->img = $filename;
            $path = 'image-slider/' . $filename;
            Storage::disk('public')->put($path, file_get_contents($image));

            // Hapus gambar lama jika ada
            // if (isset($data['img'])) {
            //     Storage::disk('public')->delete('image-produk/' . $data['img']);
            // }
            $hapus = 'public/image-slider/' . $NamaGambar->img;
            Storage::delete($hapus);

            $data['img'] = $filename;
        }

        $slider->save();

        return redirect()->to('slider')
            ->with('success', 'Berhasil update data');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy($id)
    {
        $slide = slide::findOrFail($id);
        $slide->delete();
        return redirect()->to('slider')->with('success', 'Data telah berhasil dihapus');
    }
}
