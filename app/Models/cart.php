<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\produk;

class cart extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name', 'idProduk'];
    protected $table = 'carts';
    public $timestamps = false;

    public function produk()
    {
        return $this->belongsTo(produk::class, 'idProduk', 'idProduk');
    }
}
