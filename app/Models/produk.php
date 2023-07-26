<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;
    protected $primaryKey = 'idProduk';
    protected $fillable = ['idProduk', 'img', 'namaProduk', 'harga', 'deskripsi', 'kategori'];
    protected $table = 'produks';
    public $timestamps = false;
}
