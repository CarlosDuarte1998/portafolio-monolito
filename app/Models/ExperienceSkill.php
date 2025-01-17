<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExperienceSkill extends Model
{
    use HasFactory;

    protected $fillable = [
        'experience_id',
        'skill_name',
    ];

    // Relación con experiencia
    public function experience()
    {
        return $this->belongsTo(Experience::class);
    }


}
