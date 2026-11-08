<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'jumlah',
        'tanggal',
        'bukti_transfer',
        'status',
        'catatan_admin',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}