<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Contrato
 *
 * @property $id
 * @property $usuario_id
 * @property $empleado_id
 * @property $tipoContrato_id
 * @property $estadoContrato_id
 * @property $turno_id
 * @property $fecha
 * @property $hora
 * @property $latitud
 * @property $longitud
 * @property $created_at
 * @property $updated_at
 *
 * @property Empleado $empleado
 * @property EstadoContrato $estadoContrato
 * @property Tipocontrato $tipocontrato
 * @property Turno $turno
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Contrato extends Model
{
    
    static $rules = [
		'usuario_id' => 'required',
		'empleado_id' => 'required',
		'tipoContrato_id' => 'required',
		'estadoContrato_id' => 'required',
		'turno_id' => 'required',
		'fecha' => 'required',
		'hora' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['usuario_id','empleado_id','tipoContrato_id','estadoContrato_id','turno_id','fecha','hora','latitud','longitud'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function empleado()
    {
        return $this->hasOne('App\Models\Empleado', 'id', 'empleado_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estadoContrato()
    {
        return $this->hasOne('App\Models\EstadoContrato', 'id', 'estadoContrato_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipocontrato()
    {
        return $this->hasOne('App\Models\Tipocontrato', 'id', 'tipoContrato_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function turno()
    {
        return $this->hasOne('App\Models\Turno', 'id', 'turno_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'usuario_id');
    }
    

}
