<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(
           AboutMeTableSeeder::class,
        );

        User::factory()->create([
            'name' => 'Carlos Duarte',
            'email' => 'hdzalex1998@gmail.com',
            'password' => bcrypt('12345678.'),
        ]);
    }
}
