<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'nama_project',
        'lokasi',
        'jenis_renovasi',
        'total_biaya',
        'tanggal_mulai',
        'estimasi_selesai',
        'status',
        'persentase_progress',
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'estimasi_selesai' => 'date',
        'total_biaya' => 'decimal:2',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function progress()
    {
        return $this->hasMany(ProjectProgress::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}