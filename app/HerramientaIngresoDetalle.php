<?php

namespace ApoloConstructora;

use Illuminate\Database\Eloquent\Model;

class HerramientaIngresoDetalle extends Model
{
    protected $table = 'herr_tiene_notingherr1';

    protected $primaryKey = 'Codigo';

    public $timestamps = false;

    protected $fillable = [
        'Cantidad',
        'Cod_Nota_Ingreso_Herr',
        'Codigo_Herramienta'
    ];

    protected $guarded = [

    ];
}
