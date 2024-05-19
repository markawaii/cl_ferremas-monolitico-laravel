<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items_padre = [
            ['nombre' => 'Herramientas Manuales', 'estado' => true, 'descripcion' => 'herramienta manuales', 'categoria_padre' => null],
            ['nombre' => 'Materiales Básicos', 'estado' => true, 'descripcion' => 'Materiales Básicos', 'categoria_padre' => null],
            ['nombre' => 'Equipos de Seguridad', 'estado' => true, 'descripcion' => 'equipos de seguridad', 'categoria_padre' => null],
        ];

        foreach ($items_padre as $item) {
            Categoria::create($item);
        }
        
        
        $items_hijo = [
            ['nombre' => 'Martillos', 'estado' => true, 'descripcion' => 'Herramientas Manuales', 'categoria_padre' => 1],
            ['nombre' => 'Cemento', 'estado' => true, 'descripcion' => 'Materiales Básicos', 'categoria_padre' => 2],
            ['nombre' => 'Cascos', 'estado' => true, 'descripcion' => 'equipos de seguridad', 'categoria_padre' => 3],
        ];

        foreach ($items_hijo as $item) {
            Categoria::create($item);
        }
    }
}
