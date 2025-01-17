<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectSkill extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_id',
        'skill_name',
    ];

    // Relación con proyecto
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
