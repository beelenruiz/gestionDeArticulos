<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $tags = [
            'moda' => ['color' => '#E57373', 'description' => 'Tendencias y estilos en ropa, accesorios y más.'],
            'politica' => ['color' => '#BA68C8', 'description' => 'Noticias y debates sobre el mundo político.'],
            'ciencia' => ['color' => '#81C784', 'description' => 'Descubrimientos y avances científicos.'],
            'tecnología' => ['color' => '#64B5F6', 'description' => 'Innovaciones y noticias del mundo digital.'],
            'deportes' => ['color' => '#FF8A65', 'description' => 'Eventos, noticias y análisis deportivos.']
        ];
        
        ksort($tags);
        
        foreach ($tags as $name => $data) {
            Tag::create([
                'name' => $name,
                'color' => $data['color'],
                'description' => $data['description']
            ]);
        }
        
    }
}
