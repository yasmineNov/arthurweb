<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;
    protected $primaryKey = 'idCustomer';
    protected $fillable = ['idCustomer', 'namaCustomer', 'whatsapp', 'email'];
    protected $table = 'customers';
    public $timestamps = false;
}
