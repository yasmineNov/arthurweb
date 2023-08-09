<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class artikel extends Model
{
    use HasFactory;
    protected $primaryKey = 'idArtikel';
    protected $fillable = ['idArtikel', 'img', 'judul', 'konten', 'slug'];
    protected $table = 'artikels';
    public $timestamps = false;
}
