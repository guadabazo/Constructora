<?php

namespace ApoloConstructora;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedor';

    protected $primaryKey = 'Per_CI';

    public $timestamps = false;

    protected $fillable = [
        'Per_CI',
        'Placa'
    ];

    protected $guarded = [

    ];
}
