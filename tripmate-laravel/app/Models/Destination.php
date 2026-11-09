<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $fillable = [
        'nama',
        'wilayah',
        'deskripsi',
        'harga',
        'rating',
        'kategori',
        'status',
        'gambar',
        'gambar_alt',
    ];
}
