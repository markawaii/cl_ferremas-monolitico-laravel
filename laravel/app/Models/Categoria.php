<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 'descripcion', 'estado', 'categoria_padre'
    ];

    public function subcategorias()
    {
        return $this->hasMany(Categoria::class, 'categoria_padre');
    }

    public function categoriaPadre()
    {
        return $this->belongsTo(Categoria::class, 'categoria_padre');
    }
}
