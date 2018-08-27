<?php

namespace ApoloConstructora;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = 'material1';

    protected $primaryKey = 'Codigo';

    public $timestamps = false;

    protected $fillable = [
        'Nombre',
        'Cantidad',
        'ID_Unidad_Medida',
        'Depo_Numero',
        'Tipo'
    ];
}
