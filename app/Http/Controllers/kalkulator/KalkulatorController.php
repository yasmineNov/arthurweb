<?php

namespace App\Http\Controllers\kalkulator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Else_;

class KalkulatorController extends Controller
{
    public function hitung(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'namaProduk' => 'required',
            'lebar' => 'required|numeric',
            'tinggi' => 'required|numeric',

        ], [
            'namaProduk.required' => 'Nama produk wajib diisi',
            'lebar.required' => 'lebar wajib diisi',
            'lebar.numeric' => 'lebar harus berupa angka',
            'tinggi.required' => 'tinggi wajib diisi',
            'tinggi.numeric' => 'tinggi harus beruba angka',
        ]);
        $namaProduk = $request->namaProduk;
        $harga = $request->harga;
        $lebar = $request->lebar;
        $tinggi = $request->tinggi;
        if ($lebar < 100) {
            $lebar = 100;
            $hasil = (($lebar / 100) * ($tinggi / 100)) * $harga;
        } else if ($lebar > 100 && $lebar < 160) {
            $hasil = (($lebar / 100) * ($tinggi / 100)) * $harga;
        } else if ($lebar >= 160 && $lebar < 220) {
            $lebar = 220;
            $hasil = (($lebar / 100) * ($tinggi / 100)) * $harga;
        } else if ($lebar >= 220 && $lebar < 260) {
            $lebar = 260;
            $hasil = (($lebar / 100) * ($tinggi / 100)) * $harga;
        } else if ($lebar >= 260 && $lebar < 320) {
            $lebar = 320;
            $hasil = (($lebar / 100) * ($tinggi / 100)) * $harga;
        } else if ($lebar > 320) {
            $hasil = 'Untuk ukuran diatas 320cm Mohon hubungi 087858860888.';
        }

        $hasil = ceil($hasil / 500) * 500;
        dd($hasil);
    }
}
