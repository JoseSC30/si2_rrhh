<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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



}
