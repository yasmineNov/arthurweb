<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\kategori;

class produk extends Model
{
    use HasFactory;
    protected $primaryKey = 'idProduk';
    protected $fillable = ['idProduk', 'img', 'namaProduk', 'harga', 'deskripsi', 'idKategori'];
    protected $table = 'produks';
    public $timestamps = false;

    public function kategori()
    {
        return $this->belongsTo(kategori::class, 'idKategori', 'idKategori');
    }
}
