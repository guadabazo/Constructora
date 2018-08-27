<?php

namespace ApoloConstructora;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $table = 'proyecto';

    protected $primaryKey = 'Nro';

    public $timestamps = false;

    protected $fillable = [
        'Nombre',
        'Tipo',
        'Inicio',
        'Estado',
        'Final_Aproximado',
        'Fecha_Hora'
    ];
}
