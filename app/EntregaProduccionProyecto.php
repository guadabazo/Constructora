<?php

namespace ApoloConstructora;

use Illuminate\Database\Eloquent\Model;

class EntregaProduccionProyecto extends Model
{
    protected $table = 'entrega_prod_proy';

    protected $primaryKey = 'Codigo';

    public $timestamps = false;

    protected $fillable = [
        'Produccion_Nro',
        'Proyecto_Nro',
        'Cantidad',
        'fecha'
    ];

    protected $guarded = [

    ];
}
