<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Contacto
 *
 * @property $id
 * @property $empleado_id
 * @property $telefono_uno
 * @property $telefono_dos
 * @property $email_uno
 * @property $email_dos
 * @property $redsocial_uno
 * @property $redsocial_dos
 * @property $created_at
 * @property $updated_at
 *
 * @property Empleado $empleado
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Contacto extends Model
{
    
    static $rules = [
		'empleado_id' => 'required',
		'telefono_uno' => 'required',
		'telefono_dos' => 'required',
		'email_uno' => 'required',
		'email_dos' => 'required',
		'redsocial_uno' => 'required',
		'redsocial_dos' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['empleado_id','telefono_uno','telefono_dos','email_uno','email_dos','redsocial_uno','redsocial_dos'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function empleado()
    {
        return $this->hasOne('App\Models\Empleado', 'id', 'empleado_id');
    }
    

}
