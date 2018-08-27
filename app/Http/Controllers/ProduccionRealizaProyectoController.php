<?php

namespace ApoloConstructora\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use ApoloConstructora\Http\Requests\ProduccionRealizaProyectoFormRequest;
use ApoloConstructora\ProduccionRealizaProyecto;
use DB;
use ApoloConstructora\DetalleBitacora;
use Carbon\Carbon;

class ProduccionRealizaProyectoController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        if($request)
        {
            $query=trim($request->get('searchText'));
            $produccion=DB::table('prod_realiza_proy as py')
                ->select('py.Codigo','py.Fecha')
                ->where('py.Codigo','LIKE','%'.$query.'%')
                ->orderBy('py.Codigo','desc')
                ->paginate(10);
            return view('Registrar.RealizaProduccion.index',["produccion"=>$produccion,"searchText"=>$query]);
        }
    }

    public function create()
    {
        $proyecto = DB::table('proyecto')
            ->get();

        $produccion = DB::table('produccion')
            ->get();
        return view("Registrar.RealizaProduccion.create",["proyecto"=>$proyecto,"produccion"=>$produccion]);
    }


    public function store(ProduccionRealizaProyectoFormRequest $request)
    {

        $produccionrealiza = new ProduccionRealizaProyecto();

        $produccionrealiza->Cantidad = $request->get('Cantidad');

        $mytime = Carbon::now('America/La_paz');
        $produccionrealiza->Fecha = $mytime->toDateString();

        $produccionrealiza->Produccion_Nro = $request->get('Produccion_Nro');
        $produccionrealiza->Proyecto_Nro = $request->get('Proyecto_Nro');
        $produccionrealiza->save();

        session_start();
        $det=new DetalleBitacora();
        $det->ID_b=$_SESSION['id'];
        $det->Operacion = 'REGISTRA';
        $det->Tabla = 'PRODUCCION';
        $mytime = Carbon::now('America/La_paz');
        $det->Hora=$mytime->toTimeString();
        $det->save();
        return Redirect::to('Registrar/RealizaProduccion');
    }

    public function show($id)
    {
        $realizaproduccion=DB::table('prod_realiza_proy as py')
            ->select('py.Cantidad','py.Fecha')
            ->where('py.Codigo','=',$id)
            ->first();
        $detalles=DB::table('prod_realiza_proy as pd')
            ->join('produccion  as p','p.Nro','=','pd.Produccion_Nro')
            ->join('proyecto as pr','pr.Nro','=','pd.Proyecto_Nro')
            ->select('p.Tipo','pr.Nombre','pd.Cantidad as C')
            ->where('pd.Codigo','=',$id)
            ->get();
        error_reporting(E_ALL and E_NOTICE);
        session_start();
        $idrol = DB::table('rol')
            ->select('rol.ID',DB::raw('CONCAT(persona.Nombre," ",persona.Apellido_Paterno," ",persona.Apellido_Materno) as Nom'))
            ->join('usuario','rol.Per_CI','=','usuario.Per_CI')
            ->join('persona','persona.CI','=','usuario.Per_CI')
            ->where('usuario.ID','=',$_SESSION['username'])
            ->get();

        return view("Registrar.RealizaProduccion.show",["realiza"=>$realizaproduccion,"detalles"=>$detalles,"idrol"=>$idrol]);
    }

}
