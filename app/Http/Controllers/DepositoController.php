<?php

namespace ApoloConstructora\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use ApoloConstructora\Http\Requests\DepositoFormRequest;
use ApoloConstructora\Deposito;
use Illuminate\Support\Facades\DB;
use ApoloConstructora\DetalleBitacora;
use Carbon\Carbon;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use phpDocumentor\Reflection\Types\Integer;

class DepositoController extends Controller
{
    public function __construct(){

    }
    public function index(Request $request)
    {
        if($request){
            $query=trim($request->get('searchText'));
            $deposito=DB::table('deposito as de')
                ->select('de.Numero','de.Nombre')
                ->where ('de.Nombre','LIKE','%'.$query.'%')
                ->orderBy('Numero','asc')
                ->paginate(10);

            return view('Administrar.RegistrarDeposito.index',["deposito"=>$deposito,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("Administrar.RegistrarDeposito.create");
    }



    public function store(DepositoFormRequest $request)
    {
        $depositos = new Deposito;
        $depositos->Nombre=$request->get('Nombre');
        $depositos->save();

        session_start();
        $det=new DetalleBitacora();
        $det->ID_b=$_SESSION['id'];
        $det->Operacion = 'REGISTRA';
        $det->Tabla = 'DEPOSITO';
        $mytime = Carbon::now('America/La_paz');
        $det->Hora=$mytime->toTimeString();
        $det->save();
        return Redirect::to('administrar/registrar_deposito');
    }
}
