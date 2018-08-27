<?php

namespace ApoloConstructora;

use Illuminate\Database\Eloquent\Model;

class EstadoDevolucion extends Model
{
    protected $table = 'estado_devolucion';

    protected $primaryKey = 'ID';

    public $timestamps = false;

    protected $fillable = [
        'Nota_Devolucion_Codigo',
        'Herramienta_Codigo',
        'ID_Estado',
        'Cantidad'
    ];

    protected $guarded = [

    ];
}
