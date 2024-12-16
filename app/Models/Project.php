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
        'video_tutorial',
        'department_id',
        'user_id'
    ];

    public function department()
    {
        return $this->belongsTo(Departments::class, 'department_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
   
}
