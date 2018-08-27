<?php

namespace ApoloConstructora;

use Illuminate\Database\Eloquent\Model;

class ProduccionRealizaProyecto extends Model
{
    protected $table = 'prod_realiza_proy';

    protected $primaryKey = 'Codigo';

    public $timestamps = false;

    protected $fillable = [
        'Cantidad',
        'Fecha',
        'Produccion_Nro',
        'Proyecto_Nro'
    ];

    protected $guarded = [

    ];
}
