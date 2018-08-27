<?php

namespace ApoloConstructora;

use Illuminate\Database\Eloquent\Model;

class Deposito extends Model
{
    protected $table = 'deposito';

    protected $primaryKey = 'Numero';

    public $timestamps = false;

    protected $fillable = [
    	'Nombre'
    ];

    protected $guarded = [
    ];


}
