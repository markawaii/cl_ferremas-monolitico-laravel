<?php

namespace Database\Seeders;

use App\Models\MarcaDeProducto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MarcaDeProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $marcas = [
            ['nombre' => 'Bauker', 'activo' => true],
            ['nombre' => 'Avaten', 'activo' => true],
            ['nombre' => 'M3', 'activo' => true],
            ['nombre' => 'WD-40', 'activo' => true],
            ['nombre' => 'wilson', 'activo' => true],
            ['nombre' => 'Cater', 'activo' => false],


        ];

        foreach ($marcas as $marca) {
            MarcaDeProducto::create($marca);
        }
    }
}
