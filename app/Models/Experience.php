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
        'start_year',
        'end_year',
        'description',
    ];

    // Relación con habilidades
    public function skills()
    {
        return $this->hasMany(ExperienceSkill::class);
    }
}
