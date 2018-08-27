<?php

namespace ApoloConstructora;

use Illuminate\Database\Eloquent\Model;

class EstadoProyecto extends Model
{
    protected $table = 'estado_proyecto';

    protected $primaryKey = 'ID';

    public $timestamps = false;

    protected $fillable = [
        'Descripcion'
    ];
}
