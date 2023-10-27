<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class slide extends Model
{
    use HasFactory;
    protected $primaryKey = 'idSlide';
    protected $fillable = ['idSlide', 'img', 'judul', 'url', 'body'];
    protected $table = 'slides';
    public $timestamps = false;
}
