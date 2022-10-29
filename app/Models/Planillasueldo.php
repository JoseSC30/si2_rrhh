<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Planillasueldo
 *
 * @property $id
 * @property $empleado_id
 * @property $monto
 * @property $hora
 * @property $fecha
 * @property $created_at
 * @property $updated_at
 *
 * @property Empleado $empleado
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Planillasueldo extends Model
{
    
    static $rules = [
		'empleado_id' => 'required',
		'monto' => 'required',
		'hora' => 'required',
		'fecha' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['empleado_id','monto','hora','fecha'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function empleado()
    {
        return $this->hasOne('App\Models\Empleado', 'id', 'empleado_id');
    }
    

}
