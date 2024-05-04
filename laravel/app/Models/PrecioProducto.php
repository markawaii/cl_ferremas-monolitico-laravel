<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PrecioProducto extends Model
{
    use SoftDeletes; // Incluye el trait SoftDeletes

    protected $table = 'precio_productos'; // Especifica el nombre de la tabla si no sigue la convención de nombres de Laravel

    protected $fillable = [
        'producto_id',
        'fecha',
        'valor'
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }

}
