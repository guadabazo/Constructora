<?php

namespace ApoloConstructora;

use Illuminate\Database\Eloquent\Model;

class DetalleBitacora extends Model
{
    protected $table = 'detalle_bitacora';

    protected $primaryKey = 'ID_Db';

    public $timestamps = false;

    protected $fillable = [
        'ID_b',
        'Operacion',
        'Tabla',
        'Hora'
    ];

    protected $guarded = [

    ];
}
