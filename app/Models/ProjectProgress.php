<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectProgress extends Model
{
    use HasFactory;

    protected $table = 'project_progress';

    protected $fillable = [
        'project_id',
        'tanggal',
        'keterangan',
        'persentase',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function photos()
    {
        return $this->hasMany(ProjectProgressPhoto::class, 'progress_id');
    }

    protected static function booted()
    {
        static::created(function ($progress) {
            $progress->project->update([
                'persentase_progress' => $progress->persentase,
                'status' => $progress->persentase >= 100 ? 'Selesai' : $progress->project->status,
            ]);
        });
    }
}