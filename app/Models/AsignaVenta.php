<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsignaVenta extends Model
{
    use HasFactory;

    protected $table = 'asignaventas';

    // Relación con RegistroVenta
    public function registroVenta()
    {
        return $this->belongsTo(RegistroVenta::class, 'registroventa_id');
    }

    // Relación con Venta
    public function venta()
    {
        return $this->belongsTo(Venta::class, 'venta_id');
    }
}
