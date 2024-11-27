<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Articulo
 *
 * @property $id
 * @property $descripcion
 * @property $medida_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Medida $medida
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Articulo extends Model
{
    
    static $rules = [
		'descripcion' => 'required',
    'contenido' => 'required',
    'barra' => 'required',
		'medida_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['descripcion','contenido','barra','medida_id'];
    

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function medida()
    {
        return $this->hasOne('App\Models\Medida', 'id', 'medida_id');
    }
    public function ventas()
    {
        return $this->hasMany(Venta::class, 'articulo_id');
    }
    public function stocks()
    {
        return $this->hasOne(Stock::class, 'articulo_id');
    }


}
