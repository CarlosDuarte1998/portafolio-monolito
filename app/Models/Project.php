<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'technologies',
    ];

    // Relación con habilidades

    public function skills()
    {
        return $this->hasMany(ProjectSkill::class);
    }
}
