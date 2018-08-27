<?php

namespace ApoloConstructora\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use ApoloConstructora\DetalleBitacora;
use ApoloConstructora\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use ApoloConstructora\Http\Requests\EntregaProduccionProyectoFormRequest;
use ApoloConstructora\EntregaProduccionProyecto;
use Illuminate\Support\Facades\DB;

class EntregaProduccionProyectoController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        if($request)
        {
            $query=trim($request->get('searchText'));
            $ingresos=DB::table('entrega_prod_proy as EPP')
                ->select('EPP.Produccion_Nro','EPP.Proyecto_Nro','EPP.Cantidad','EPP.fecha','p.Nombre')
                ->join('proyecto as p','EPP.Proyecto_Nro','=','p.Nro')
                ->where('p.Nombre','LIKE','%'.$query.'%')
                ->orderBy('EPP.fecha','desc')
                ->paginate(10);

            error_reporting(E_ALL and E_NOTICE);
            session_start();
            $idrol = DB::table('rol')
                ->select(DB::raw('CONCAT(persona.Nombre," ",persona.Apellido_Paterno," ",persona.Apellido_Materno) as Nombre'))
                ->join('usuario','rol.Per_CI','=','usuario.Per_CI')
                ->join('persona','persona.CI','=','usuario.Per_CI')
                ->where('usuario.ID','=',$_SESSION['username'])
                ->get();
            return view('RegistrarEgreso.EntregaProduccion.index',["ingresos"=>$ingresos,"searchText"=>$query,"idrol"=>$idrol]);
        }
    }

    public function create()
    {
        $proyecto=DB::table('proyecto as p')
            ->select('p.Nro','p.Nombre')
            ->get();

        $produccion=DB::table('produccion as p')
            ->select('p.Nro','p.Tipo','p.Cantidad')
            ->get();

        error_reporting(E_ALL and E_NOTICE);
        session_start();
        $idrol = DB::table('rol')
            ->select('rol.ID',DB::raw('CONCAT(persona.Nombre," ",persona.Apellido_Paterno," ",persona.Apellido_Materno) as Nombre'))
            ->join('usuario','rol.Per_CI','=','usuario.Per_CI')
            ->join('persona','persona.CI','=','usuario.Per_CI')
            ->where('usuario.ID','=',$_SESSION['username'])
            ->get();

        return view('RegistrarEgreso.EntregaProduccion.create',["proyecto"=>$proyecto,"produccion"=>$produccion]);
    }

    public function store(EntregaProduccionProyectoFormRequest $request)
    {
        $nr=$request->get('Produccion_Nro');
        $g = "select produccion.Cantidad
              FROM produccion 
              where produccion.Nro =1";



            $entrega = new EntregaProduccionProyecto();
            $entrega->Produccion_Nro = $request->get('Produccion_Nro');
            $entrega->Proyecto_Nro = $request->get('Proyecto_Nro');
            $mytime = Carbon::now('America/La_paz');
            $entrega->Cantidad = $request->get('Cantidad');
            $entrega->fecha = $mytime->toDateTimeString();
            $entrega->save();
            session_start();
            $det = new DetalleBitacora();
            $det->ID_b = $_SESSION['id'];
            $det->Operacion = 'REGISTRA ENTREGA';
            $det->Tabla = 'DE PRODUCCION';
            $mytime = Carbon::now('America/La_paz');
            $det->Hora = $mytime->toTimeString();
            $det->save();
            return Redirect::to('RegistrarEgreso/EntregaProduccion');

        }


    public function show($id)
    {

        return view('RegistrarEgreso.EntregaProduccion.show',["entrega_prod_proy"=>Entregaproduccionproyecto::findOrFail($id)]);


    }


}
