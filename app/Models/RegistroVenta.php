<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroVenta extends Model
{
    use HasFactory;

    protected $table = 'registroventas';

    // Relación con AsignaVenta
    public function asignaVentas()
    {
        return $this->hasMany(AsignaVenta::class, 'registroventa_id');
    }

    // Relación con Venta (a través de AsignaVenta)
    public function ventas()
    {
        return $this->hasManyThrough(
            Venta::class,
            AsignaVenta::class,
            'registroventa_id', // Llave foránea en AsignaVenta
            'id',              // Llave foránea en Venta
            'id',              // Llave local en RegistroVenta
            'venta_id'         // Llave local en AsignaVenta
        );
    }

    // Relación con User (opcional si quieres saber qué usuario realizó la venta)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
