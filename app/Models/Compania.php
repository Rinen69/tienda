<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Compania
 *
 * @property $id
 * @property $descripcion
 * @property $created_at
 * @property $updated_at
 *
 * @property Proveedor[] $proveedors
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Compania extends Model
{
    
    static $rules = [
		'descripcion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['descripcion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function proveedors()
    {
        return $this->hasMany('App\Models\Proveedor', 'compania_id', 'id');
    }
    

}
