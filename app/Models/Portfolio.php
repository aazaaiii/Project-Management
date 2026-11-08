<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'slug',
        'kategori',
        'deskripsi',
        'lokasi',
        'luas_bangunan',
        'tahun',
        'status',
        'thumbnail',
    ];

    public function images()
    {
        return $this->hasMany(PortfolioImage::class);
    }
}