<?php

namespace ApoloConstructora;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuario';

    protected $primaryKey = 'Per_CI';

    public $timestamps = false;

    protected $fillable = [
        'Per_CI',
        'Id',
        'Contrasena',
        'Codigo_G'
    ];

    protected $guarded = [

    ];
}
