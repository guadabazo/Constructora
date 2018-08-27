<?php

namespace ApoloConstructora;

use Illuminate\Database\Eloquent\Model;

class Chofer extends Model
{
    protected $table = 'chofer';

    protected $primaryKey = 'Per_CI';

    public $timestamps = false;

    protected $fillable = [
        'Per_CI',
        'Licencia',
        'Placa'
    ];

    protected $guarded = [

    ];
}
