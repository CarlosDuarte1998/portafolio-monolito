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
        'image',
        'url',
        'github_url',
        'start_date',
        'end_date',
    ];

    /**
     *Relación muchos a muchos con skills
     */

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'skills_projects');
    }
}
