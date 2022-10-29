<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Asistencia
 *
 * @property $id
 * @property $hora_llegada
 * @property $hora_salida
 * @property $fecha
 * @property $created_at
 * @property $updated_at
 * @property $usuariomovil_id
 *
 * @property Usuariomovil $usuariomovil
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Asistencia extends Model
{
    
    static $rules = [
		'hora_llegada' => 'required',
		'hora_salida' => 'required',
		'fecha' => 'required',
		'usuariomovil_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['hora_llegada','hora_salida','fecha','usuariomovil_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function usuariomovil()
    {
        return $this->hasOne('App\Models\Usuariomovil', 'id', 'usuariomovil_id');
    }
    

}
