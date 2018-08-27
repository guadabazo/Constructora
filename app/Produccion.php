<?php

namespace ApoloConstructora;

use Illuminate\Database\Eloquent\Model;

class Produccion extends Model
{
    protected $table = 'produccion';

    protected $primaryKey = 'Nro';

    public $timestamps = false;

    protected $fillable = [
        'Tipo',
        'Cantidad'
    ];

    protected $guarded = [

    ];
}
