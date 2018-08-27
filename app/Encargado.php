<?php

namespace ApoloConstructora;

use Illuminate\Database\Eloquent\Model;

class Encargado extends Model
{
    protected $table = 'encargado';

    protected $primaryKey = 'Per_CI';

    public $timestamps = false;

    protected $fillable = [
        'Per_CI',
        'ID_Encargado'
    ];

    protected $guarded = [

    ];
}
