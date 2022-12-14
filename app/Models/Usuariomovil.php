<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

//
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
//


/**
 * Class Usuariomovil
 *
 * @property $id
 * @property $usuario
 * @property $contrasena
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */

class Usuariomovil extends Model
{
  //Api
  use HasApiTokens, HasFactory, Notifiable;
    protected $table = "usuariomovils";
  //Api


    static $rules = [
		'usuario' => 'required',
		'contrasena' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['usuario','contrasena'];

    
    public function empleado()
    {
        return $this->hasOne('App\Models\Empleado', 'usuariomovil_id', 'id');
    }

}
