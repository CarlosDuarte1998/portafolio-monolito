<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Objeto con las habilidades, nombre, descripción y type (1 o 2)

        DB::table('skills')->insert([
            [
                'name' => 'Programación Web',
                'description' => 'Experiencia en desarrollo de aplicaciones web utilizando Laravel y Vue.js.',
                'typeSkill' => 1, // Experiencia
            ],
            [
                'name' => 'Desarrollo de API',
                'description' => 'Desarrollo y gestión de APIs RESTful con Laravel.',
                'typeSkill' => 1, // Experiencia
            ],
            [
                'name' => 'E-commerce',
                'description' => 'Desarrollo de tiendas online utilizando plataformas como Shopify o WooCommerce.',
                'typeSkill' => 2, // Proyecto
            ],
            [
                'name' => 'Ciberseguridad',
                'description' => 'Implementación de medidas de seguridad en aplicaciones web.',
                'typeSkill' => 1, // Experiencia
            ],
        ]);
            
    }
}
