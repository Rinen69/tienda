<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Proveedor
 *
 * @property $id
 * @property $nombre
 * @property $ap
 * @property $am
 * @property $compania_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Compania $compania
 * @property Paquete[] $paquetes
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Proveedor extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'ap' => 'required',
		'am' => 'required',
		'compania_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','ap','am','compania_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function compania()
    {
        return $this->hasOne('App\Models\Compania', 'id', 'compania_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paquetes()
    {
        return $this->hasMany('App\Models\Paquete', 'proveedor_id', 'id');
    }
    

}
