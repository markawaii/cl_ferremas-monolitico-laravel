<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use SoftDeletes; // Incluye el trait SoftDeletes

    protected $table = 'productos'; // Especifica el nombre de la tabla si no sigue la convención de nombres de Laravel

    protected $fillable = [
        'codigo_producto',
        'categoria_id',
        'marca_de_producto_id',
        'modelo',
        'nombre',
        'stock'
    ];

    public function precios()
    {
        return $this->hasMany(PrecioProducto::class, 'producto_id');
    }

    public function marca()
    {
        return $this->belongsTo(MarcaDeProducto::class, 'marca_de_producto_id');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function precioActual()
    {
        return $this->hasOne(PrecioProducto::class)->latestOfMany();
    }
}
