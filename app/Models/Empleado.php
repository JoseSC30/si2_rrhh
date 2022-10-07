<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Empleado
 *
 * @property $id
 * @property $puestolaboral_id
 * @property $usuariomovil_id
 * @property $nombre
 * @property $ci
 * @property $fnacimiento
 * @property $sexo
 * @property $direccion
 * @property $created_at
 * @property $updated_at
 *
 * @property User[] $users
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Empleado extends Model
{
    
    static $rules = [
		'puestolaboral_id' => 'required',
		'usuariomovil_id' => 'required',
		'nombre' => 'required',
		'ci' => 'required',
		'fnacimiento' => 'required',
		'sexo' => 'required',
		'direccion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['puestolaboral_id','usuariomovil_id','nombre','ci','fnacimiento','sexo','direccion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany('App\Models\User', 'empleado_id', 'id');
    }
    

}
