<?php

namespace ApoloConstructora;

use Illuminate\Database\Eloquent\Model;

class NotaPrestamoHerramienta extends Model
{
    protected $table = 'nota_prestamo';

    protected $primaryKey = 'Codigo';

    public $timestamps = false;

    protected $fillable = [
        'Proyecto_Nro',
        'ID_Rol',
        'Fecha_Aprox_Devol',
        'Fecha_Hora',

    ];

    protected $guarded = [

    ];
}
