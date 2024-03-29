<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\kategori;
use Illuminate\Database\Eloquent\SoftDeletes;

class produk extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $primaryKey = 'idProduk';
    protected $fillable = ['idProduk', 'img', 'namaProduk', 'harga', 'deskripsi', 'idKategori'];
    protected $table = 'produks';
    public $timestamps = false;

    public function kategori()
    {
        return $this->belongsTo(kategori::class, 'idKategori', 'idKategori');
    }

    public function varian()
    {
        return $this->hasMany(md_varian::class, 'id_product', 'idProduk')->orderBy('id_product');
    }

    public function cart()
    {
        return $this->hasMany(md_varian::class, 'idProduk', 'idProduk')->orderBy('idProduk');
    }
}
