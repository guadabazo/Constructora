<?php

namespace ApoloConstructora;

use Illuminate\Database\Eloquent\Model;

class NotaIngresoDotacion extends Model
{
    protected $table = 'nota_ingreso_dotacion';

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
