<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'company',
        'description',
        'url',
        'image',
        'start_year',
        'end_year',
        
    ];

    // Relación con habilidades
    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'skills_experiences');
    }
}
