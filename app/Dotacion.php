<?php

namespace ApoloConstructora;

use Illuminate\Database\Eloquent\Model;

class Dotacion extends Model
{
    protected $table = 'dotacion';

    protected $primaryKey = 'ID';

    public $timestamps = false;

    protected $fillable = [
        'Nombre',
        'Cantidad',
        'Depo_Numero',
    ];
}
