<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    /** @use HasFactory<\Database\Factories\ArtikelFactory> */
    use HasFactory;

    protected $casts = [
        'konten' => 'string',
    ];

    protected $fillable = [
        'judul',
        'kategori_id',
        'konten',
        'slug',
        'gambar_artikel',
        'status',
        'tanggal_publish'
    ];

    // relasi dengan kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
