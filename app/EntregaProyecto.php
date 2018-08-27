<?php

namespace ApoloConstructora;

use Illuminate\Database\Eloquent\Model;

class EntregaProyecto extends Model
{
    protected $table = 'entrega_proyecto';

    protected $primaryKey = 'Codigo';

    public $timestamps = false;

    protected $fillable = [
        'Proyecto_Nro'
    ];

    protected $guarded = [

    ];
}
