<?php

namespace ApoloConstructora;

use Illuminate\Database\Eloquent\Model;

class Herramienta extends Model
{
    protected $table = 'herramienta';

    protected $primaryKey = 'Codigo';

    public $timestamps = false;

    protected $fillable = [
        'Nombre',
        'Cantidad',
        'Depo_Numero'
    ];

    protected $guarded = [

    ];

}
