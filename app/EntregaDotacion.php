<?php

namespace ApoloConstructora;

use Illuminate\Database\Eloquent\Model;

class EntregaDotacion extends Model
{
    protected $table = 'dot_entrega_trabajador';

    protected $primaryKey = 'Codigo';

    public $timestamps = false;

    protected $fillable = [
        'ID_Dotacion',
        'Per_CI',
        'ID_Rol',
        'Cantidad',
        'Fecha'
    ];

    protected $guarded = [

    ];
}
