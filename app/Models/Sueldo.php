<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Sueldo
 *
 * @property $id
 * @property $empleado_id
 * @property $monto
 * @property $fecha
 * @property $hora
 * @property $created_at
 * @property $updated_at
 *
 * @property Empleado $empleado
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Sueldo extends Model
{
    
    static $rules = [
		'empleado_id' => 'required',
		'fecha' => 'required',
		'hora' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['empleado_id','monto','fecha','hora'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function empleado()
    {
        return $this->hasOne('App\Models\Empleado', 'id', 'empleado_id');
    }
    

}
