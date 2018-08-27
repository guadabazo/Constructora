<?php

namespace ApoloConstructora;

use Illuminate\Database\Eloquent\Model;

class DotacionIngresoDetalle extends Model
{
    protected $table = 'dot_tiene_notingdot';

    protected $primaryKey = 'Codigo';

    public $timestamps = false;

    protected $fillable = [
        'Id_Dotacion',
        'Cod_Nota_Ingreso_Dot',
        'Cantidad'
    ];

    protected $guarded = [

    ];
}
