<?php

namespace ApoloConstructora\Http\Controllers;

use Illuminate\Http\Request;

use ApoloConstructora\Bitacora;
use ApoloConstructora\DetalleBitacora;
use Illuminate\Support\Facades\Redirect;
use ApoloConstructora\Http\Requests\LoginFormRequest;
use DB;

use Carbon\Carbon;

class FinzalizarController extends Controller
{
    public function index(){
        error_reporting(E_ALL and E_NOTICE);
        session_start();
        $det=Bitacora::findOrFail($_SESSION['id']);
        $det->ID_B=$_SESSION['id'];
        $mytime = Carbon::now('America/La_paz');
        $det->Finalizacion=$mytime->toDateTimeString();
        $det->update();

        Redirect::to('');
    }
}
