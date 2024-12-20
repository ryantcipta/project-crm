<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    use HasFactory;

    protected $table = "departments";

    protected $fillable = [
        'name_departments',
    ];

    public function projects()
    {
        return $this->hasMany(Project::class, 'department_id', 'id');
    }
    
}
