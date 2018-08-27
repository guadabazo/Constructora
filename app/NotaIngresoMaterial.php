<?php

namespace ApoloConstructora;

use Illuminate\Database\Eloquent\Model;

class NotaIngresoMaterial extends Model
{
    protected $table = 'nota_ingreso';

    protected $primaryKey = 'Codigo';

    public $timestamps = false;

    protected $fillable = [
        'Cantidad',
        'Fecha',
        'Proveedor_CI',
        'Material_Codigo',
        'ID_Rol'
    ];

    protected $guarded = [

    ];
}
