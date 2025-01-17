<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AboutMe extends Model
{
    use HasFactory;

    protected $table = 'about_me';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'city',
        'title',
        'description',
        'platform',
        'linkedin_url',
        'github_url',
        'twitter_url',
        'instagram_url',
        'facebook_url',
        'youtube_url',
        'image_url',
        'icon_class',
    ];
}
