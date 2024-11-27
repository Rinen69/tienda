<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Paquete
 *
 * @property $id
 * @property $articulo_id
 * @property $cantidad
 * @property $costo
 * @property $fecha_exp
 * @property $proveedor_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Articulo $articulo
 * @property Proveedor $proveedor
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Paquete extends Model
{
    
    static $rules = [
		'articulo_id' => 'required',
		'cantidad' => 'required',
		'costo' => 'required',
		'fecha_exp' => 'required',
		'proveedor_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['articulo_id','cantidad','costo','fecha_exp','proveedor_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function articulo()
    {
        return $this->hasOne('App\Models\Articulo', 'id', 'articulo_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function proveedor()
    {
        return $this->hasOne('App\Models\Proveedor', 'id', 'proveedor_id');
    }
    

}
