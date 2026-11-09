<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'tier',
        'judul',
        'deskripsi',
        'harga',
        'is_popular',
        'fasilitas',
    ];

    protected function casts(): array
    {
        return [
            'is_popular' => 'boolean',
            'fasilitas' => 'array',
        ];
    }
}
