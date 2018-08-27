<?php

namespace ApoloConstructora;

use Illuminate\Database\Eloquent\Model;

class DetalleEstado extends Model
{
    protected $table = 'detalle_estado';

    protected $primaryKey = 'ID';

    public $timestamps = false;

    protected $fillable = [
        'Fecha_Hora',
        'ID_Estado_Proyecto',
        'Nro_Proyecto',

    ];
}
