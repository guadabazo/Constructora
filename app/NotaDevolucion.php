<?php

namespace ApoloConstructora;

use Illuminate\Database\Eloquent\Model;

class NotaDevolucion extends Model
{
    protected $table = 'nota_devolucion';

    protected $primaryKey = 'Codigo';

    public $timestamps = false;

    protected $fillable = [
        'Fecha',
        'ID_Rol',
        'Nro_Proyecto'
    ];

    protected $guarded = [

    ];
}
