<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'nama',
        'email',
        'no_hp',
        'alamat',
        'jenis_layanan',
        'tanggal_survey',
        'pesan',
        'status',
    ];

    protected $casts = [
        'tanggal_survey' => 'date',
    ];
}