<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Permisolaboral
 *
 * @property $id
 * @property $detalle
 * @property $hora
 * @property $fecha
 * @property $created_at
 * @property $updated_at
 * @property $usuariomovil_id
 *
 * @property Usuariomovil $usuariomovil
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Permisolaboral extends Model
{
    
    static $rules = [
		'detalle' => 'required',
		'hora' => 'required',
		'fecha' => 'required',
		'usuariomovil_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['detalle','hora','fecha','usuariomovil_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function usuariomovil()
    {
        return $this->hasOne('App\Models\Usuariomovil', 'id', 'usuariomovil_id');
    }
    

}
