<?php

namespace ApoloConstructora;

use Illuminate\Database\Eloquent\Model;

class notprest_tiene_herr extends Model
{
    protected $table = 'notprest_tiene_herr';

    protected $primaryKey = 'Codigo';

    public $timestamps = false;

    protected $fillable = [
        'Nota_Prestamo_Codigo',
        'Herramienta_Codigo',
        'Cantidad'

    ];

    protected $guarded = [

    ];
}
