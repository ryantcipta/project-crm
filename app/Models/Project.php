<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = "projects";

    protected $fillable = [
        'nama_project',
        'link',
        'keterangan',
        'tugas_pending'
    ];

    public function department()
    {
        return $this->belongsTo(Departments::class);
    }
}
