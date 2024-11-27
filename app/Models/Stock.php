<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $table = 'stocks'; // Nombre de la tabla

    protected $fillable = ['articulo_id', 'cantidad', 'costo']; // Campos que se pueden asignar masivamente

    // Relación con el modelo Articulo
    public function articulo()
    {
        return $this->belongsTo(Articulo::class, 'articulo_id');
    }
}
