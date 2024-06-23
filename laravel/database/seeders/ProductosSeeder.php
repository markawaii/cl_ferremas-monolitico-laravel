<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $productos = [
            [
                'nombre_producto' => 'Producto 1',
                'marca_de_producto_id' => 1,
                'categoria_id' => 1,
                'modelo' => 'Modelo 1',
                'stock_inicial' => 100,
                'valor' => 199.99,
            ],
            [
                'nombre_producto' => 'Producto 2',
                'marca_de_producto_id' => 2,
                'categoria_id' => 2,
                'modelo' => 'Modelo 2',
                'stock_inicial' => 50,
                'valor' => 299.99,
            ],
        ];

        foreach ($productos as $producto) {
            Producto::create($producto);
        }

    }
}
