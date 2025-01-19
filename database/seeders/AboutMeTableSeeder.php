<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutMeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * 
     */
    public function run(): void
    {
        $aboutMe = [
            'name' => 'Carlos Duarte',
            'email' => 'hdzalex1998@gmail.com ',
            'phone' => '1234567890',
            'address' => 'Calle Ficticia 123',
            'city' => 'San Salvador',
            'title' => 'Desarrollador Web',
            'description' => 'Soy un desarrollador web con experiencia en tecnologías modernas.',
            'platform' => 'Web',
            'linkedin_url' => 'https://linkedin.com/in/carlosduarte',
            'github_url' => 'https://github.com/carlosduarte',
            'twitter_url' => 'https://twitter.com/carlosduarte',
            'instagram_url' => 'https://instagram.com/carlosduarte',
            'facebook_url' => 'https://twitter.com/carlosduarte',
            'youtube_url' => 'https://youtube.com/c/carlosduarte',
            'image_url' => 'https://example.com/carlos.jpg',
            'icon_class' => 'fas fa',
        ];

        DB::table('about_me')->insert($aboutMe);
    }
}
