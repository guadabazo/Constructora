<?php

namespace ApoloConstructora;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $table = 'inventario';

    protected $primaryKey = 'Codigo';

    public $timestamps = false;

    protected $fillable = [

        'CantidadProyecto',
        'CantidadDotacion',
        'CantidadHerramienta',
        'CantidadMaterial',
        'ProducionTotal',
        'Nro_proyecto',
        'Id_dotacion',
        'Codigo_Herramienta',
        'Codigo_Material',
        ''
    ];

    protected $guarded = [

    ];
}
