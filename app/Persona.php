<?php

namespace ApoloConstructora;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'persona';

    protected $primaryKey = 'CI';

    public $timestamps = false;

    protected $fillable = [
        'CI',
        'Nombre',
        'Apellido_Paterno',
        'Apellido_Materno',
        'Tipo_P',
        'Estado'
    ];

    protected $guarded = [

    ];
}
