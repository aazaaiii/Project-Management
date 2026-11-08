<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectProgressPhoto extends Model
{
    use HasFactory;

    protected $fillable = [
        'progress_id',
        'foto',
    ];

    public function progress()
    {
        return $this->belongsTo(ProjectProgress::class, 'progress_id');
    }
}