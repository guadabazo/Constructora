<?php

namespace ApoloConstructora;

use Illuminate\Database\Eloquent\Model;

class EntregaChofer extends Model
{
    protected $table = 'entrega_chofer';

    protected $primaryKey = 'Codigo';

    public $timestamps = false;

    protected $fillable = [
        'Chofer_CI'
    ];

    protected $guarded = [

    ];
}
