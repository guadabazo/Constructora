<?php

namespace ApoloConstructora;

use Illuminate\Database\Eloquent\Model;

class EncargadoProyecto extends Model
{
    protected $table = 'encar_tiene_proy';

    protected $primaryKey = 'Codigo';

    public $timestamps = false;

    protected $fillable = [
        'Encargado_CI',
        'Proyecto_Nro'
    ];

    protected $guarded = [

    ];
}
