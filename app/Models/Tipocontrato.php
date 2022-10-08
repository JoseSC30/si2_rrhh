<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tipocontrato
 *
 * @property $id
 * @property $nombre
 * @property $descripcion
 * @property $duracion
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Tipocontrato extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'descripcion' => 'required',
		'duracion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','descripcion','duracion'];



}
