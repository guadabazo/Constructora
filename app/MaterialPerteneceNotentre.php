<?php

namespace ApoloConstructora;

use Illuminate\Database\Eloquent\Model;

class MaterialPerteneceNotentre extends Model
{
    protected $table = 'material_pertenece_notentre';

    protected $primaryKey = 'Codigo';

    public $timestamps = false;

    protected $fillable = [
        'Material_Codigo',
        'Nota_Entrega_codigo',
        'Cantidad'
    ];

    protected $guarded = [

    ];
}
