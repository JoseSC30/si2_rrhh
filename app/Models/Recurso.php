<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Recurso
 *
 * @property $id
 * @property $nombre
 * @property $detalle
 * @property $fecha_inicio
 * @property $fecha_final
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Recurso extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'detalle' => 'required',
		'fecha_inicio' => 'required',
		'fecha_final' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','detalle','fecha_inicio','fecha_final'];



}
