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
        if ($request->jenis == "banner") {
            if ($request->lebar < $request->tinggi && $request->tinggi < 320 && $request->tinggi > 100) {
                $lebar = $request->tinggi;
                $tinggi = $request->lebar;
            } else {
                $lebar = $request->lebar;
                $tinggi = $request->tinggi;
            }
            if ($lebar <= 100) {
                $lebar = 100;
                $hasil = (($lebar / 100) * ($tinggi / 100)) * $harga;
                if(substr(strval($hasil), -3) > 0 ){
                    $hasil = ceil($hasil / 500) * 500;
                }
                if ($request->finishing == "lebihan" || $request->finishing == "potong press") {
                    $hasil = $hasil;
                } else {
                    $hasil = $hasil + 1000;
                }
            } else if ($lebar > 100 && $lebar < 160) {
                $hasil = (($lebar / 100) * ($tinggi / 100)) * $harga;
                if(substr(strval($hasil), -3) > 0 ){
                    $hasil = ceil($hasil / 500) * 500;
                }
                if ($request->finishing == "lebihan" || $request->finishing == "potong press") {
                    $hasil = $hasil;
                } else {
                    $hasil = $hasil + 1000;
                }
            } else if ($lebar >= 160 && $lebar < 220) {
                $lebar = 220;
                $hasil = (($lebar / 100) * ($tinggi / 100)) * $harga;
                if(substr(strval($hasil), -3) > 0 ){
                    $hasil = ceil($hasil / 500) * 500;
                }
                if ($request->finishing == "lebihan" || $request->finishing == "potong press") {
                    $hasil = $hasil;
                } else {
                    $hasil = $hasil + 1000;
                }
            } else if ($lebar >= 220 && $lebar < 260) {
                $lebar = 260;
                $hasil = (($lebar / 100) * ($tinggi / 100)) * $harga;
                if(substr(strval($hasil), -3) > 0 ){
                    $hasil = ceil($hasil / 500) * 500;
                }
                if ($request->finishing == "lebihan" || $request->finishing == "potong press") {
                    $hasil = $hasil;
                } else {
                    $hasil = $hasil + 1000;
                }
            } else if ($lebar >= 260 && $lebar < 320) {
                $lebar = 320;
                $hasil = (($lebar / 100) * ($tinggi / 100)) * $harga;
                if(substr(strval($hasil), -3) > 0 ){
                    $hasil = ceil($hasil / 500) * 500;
                }
                if ($request->finishing == "lebihan" || $request->finishing == "potong press") {
                    $hasil = $hasil;
                } else {
                    $hasil = $hasil + 1000;
                }
            } else if ($lebar > 320) {
                $hasil = 'Untuk ukuran diatas 320cm product banner. Mohon hubungi 087858860888.';
            }
            return response()->json($hasil);
        } else if ($request->jenis == "stiker") {
            if ($request->lebar < $request->tinggi && $request->tinggi < 152 && $request->tinggi > 100) {
                $lebar = $request->tinggi;
                $tinggi = $request->lebar;
            } else {
                $lebar = $request->lebar;
                $tinggi = $request->tinggi;
            }
            if ($lebar <= 100) {
                $lebar = 106;
                $hasil = (($lebar / 100) * ($tinggi / 100)) * $harga;
                if(substr(strval($hasil), -3) > 0 ){
                    $hasil = ceil($hasil / 500) * 500;
                }
            } else if ($lebar > 100 && $lebar <= 125) {
                $lebar = 127;
                $hasil = (($lebar / 100) * ($tinggi / 100)) * $harga;
                if(substr(strval($hasil), -3) > 0 ){
                    $hasil = ceil($hasil / 500) * 500;
                }
            } else if ($lebar > 127 && $lebar <= 152) {
                $lebar = 155;
                $hasil = (($lebar / 100) * ($tinggi / 100)) * $harga;
                if(substr(strval($hasil), -3) > 0 ){
                    $hasil = ceil($hasil / 500) * 500;
                }
            } else if($lebar > 152){
                $hasil = 'Untuk ukuran diatas 152cm pada product stiker. Mohon hubungi 087858860888.';
            }
            return response()->json($hasil);
        } else if ($request->jenis == "albatros" || $request->jenis == "luster") {
            if ($request->lebar < $request->tinggi && $request->tinggi < 126 && $request->tinggi > 100) {
                $lebar = $request->tinggi;
                $tinggi = $request->lebar;
            } else {
                $lebar = $request->lebar;
                $tinggi = $request->tinggi;
            }

            if ($lebar <= 87) {
                $lebar = 100;
                $hasil = (($lebar / 100) * ($tinggi / 100)) * $harga;
                if(substr(strval($hasil), -3) > 0 ){
                    $hasil = ceil($hasil / 500) * 500;
                }
            } else if ($lebar > 87 && $lebar <= 125) {
                $lebar = 127;
                $hasil = (($lebar / 100) * ($tinggi / 100)) * $harga;
                if(substr(strval($hasil), -3) > 0 ){
                    $hasil = ceil($hasil / 500) * 500;
                }
            } else if ($lebar > 127) {
                $hasil = 'Untuk ukuran diatas 127cm pada product ini. Mohon hubungi 087858860888.';
            }
            return response()->json($hasil);
        }
    }
}
