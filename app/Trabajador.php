<?php

namespace ApoloConstructora;

use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
    protected $table = 'trabajador';

    protected $primaryKey = 'Per_CI';

    public $timestamps = false;

    protected $fillable = [
        'Per_CI',
        'ID_Trabajador',
        'TipoO',
        'TipoCh'
    ];

    protected $guarded = [

    ];
}
