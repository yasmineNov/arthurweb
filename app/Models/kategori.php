<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    use HasFactory;
    protected $primaryKey = 'idKategori';
    protected $fillable = ['idKategori', 'namaKategori'];
    protected $table = 'kategoris';
    public $timestamps = false;
}
