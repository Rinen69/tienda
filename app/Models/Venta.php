<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $table = 'ventas';
    protected $fillable = ['articulo_id', 'piezas', 'subtotal'];

    // Relación con Articulo
    public function articulo()
    {
        return $this->belongsTo(Articulo::class, 'articulo_id');
    }

    // Relación con AsignaVenta
    public function asignaVentas()
    {
        return $this->hasMany(AsignaVenta::class, 'venta_id');
    }
}
