<?php

namespace ApoloConstructora;

use Illuminate\Database\Eloquent\Model;

class NotaIngresoHerramienta extends Model
{
    protected $table = 'nota_ingreso_herramienta';

    protected $primaryKey = 'Codigo';

    public $timestamps = false;

    protected $fillable = [
        'Cantidad',
        'Fecha_Hora',
        'ID_Rol'
    ];

    protected $guarded = [

    ];
}
