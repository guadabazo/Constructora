<?php

namespace ApoloConstructora;

use Illuminate\Database\Eloquent\Model;

class NotaEntregaMaterial extends Model
{
    protected $table = 'nota_entrega';

    protected $primaryKey = 'Codigo';

    public $timestamps = false;

    protected $fillable = [
        'Fecha_Hora',
        'ID_Rol'
    ];

    protected $guarded = [

    ];
}
