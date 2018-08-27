<?php

namespace ApoloConstructora;

use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    protected $table = 'bitacora';

    protected $primaryKey = 'ID_B';

    public $timestamps = false;

    protected $fillable = [
        'Inicio',
        'Finalizacion',
        'Usuario'
    ];

    protected $guarded = [

    ];
}
