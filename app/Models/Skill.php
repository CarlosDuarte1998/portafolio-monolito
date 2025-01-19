<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = [
        'name',
        'description',
        'typeSkill',
    ];

    // Relación con experiencias
    public function experiences()
    {
        return $this->belongsToMany(Experience::class, 'skills_experiences');
    }

    // Relación con proyectos
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'skills_projects');
    }
}
