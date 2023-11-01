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
            'judul' => 'required',
            'url' => 'required',
            'body' => 'required'
        ], [
            'judul.required' => 'judul wajib diisi',
            'image.mimes' => 'gambar harus berformat png, jpg, atau jpeg',
            'image.max' => 'gambar maksimal 2048kb',
            'konten.required' => 'url wajib diisi',
            'body.required' => 'body wajib diisi'
            

        ]);

        $slider = new slide;
        $image    = $request->file('image');
        $filename = date('Y-m-d') . $image->getClientOriginalName();
        $path     = 'image-slider/' . $filename;

        Storage::disk('public')->put($path, file_get_contents($image));

        $slider->img = $filename;
        $slider->judul = $request->judul;
        $slider->url = $request->url;
        $slider->body = $request->body;
        
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
    public function edit(slide $slide)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, slide $slide)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(slide $slide)
    {
        $slide->delete();
        return redirect()->to('slider')
            ->with('success', 'Data telah berhasil dihapus');
    }
}
