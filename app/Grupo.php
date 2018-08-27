<?php

namespace ApoloConstructora;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $table = 'grupo';

    protected $primaryKey = 'Id';

    public $timestamps = false;

    protected $fillable = [
        'Id',
        'Descripcion',
    ];

    protected $guarded = [

    ];
}
