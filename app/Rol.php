<?php

namespace ApoloConstructora;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table='rol';
    protected $primaryKey="ID";

    public $timestamps=false;

    protected $fillable = [
        'Descripcion',
        'Per_CI'
    ];

    protected $guarded = [

    ];
}
