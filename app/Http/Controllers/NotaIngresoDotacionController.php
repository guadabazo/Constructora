<?php

namespace ApoloConstructora\Http\Controllers;

use Illuminate\Http\Request;

use ApoloConstructora\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use ApoloConstructora\Http\Requests\NotaIngresoDotacionFormRequest;
use ApoloConstructora\NotaIngresoDotacion;
use ApoloConstructora\DotacionIngresoDetalle;
use Illuminate\Support\Facades\DB;
use ApoloConstructora\DetalleBitacora;
use Carbon\Carbon;


class NotaIngresoDotacionController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        if($request)
        {
            $query=trim($request->get('searchText'));
            $ingresos=DB::table('nota_ingreso_dotacion as ni')
                ->select('ni.Codigo','ni.Fecha_Hora')
                ->where('ni.Codigo','LIKE','%'.$query.'%')
                ->orderBy('ni.Codigo','desc')
                ->paginate(10);

            error_reporting(E_ALL and E_NOTICE);
            session_start();
            $idrol = DB::table('rol')
                ->select(DB::raw('CONCAT(persona.Nombre," ",persona.Apellido_Paterno," ",persona.Apellido_Materno) as Nombre'))
                ->join('usuario','rol.Per_CI','=','usuario.Per_CI')
                ->join('persona','persona.CI','=','usuario.Per_CI')
                ->where('usuario.ID','=',$_SESSION['username'])
                ->get();
            return view('Registrar.NotaIngresoDotacion.index',["ingresos"=>$ingresos,"searchText"=>$query,"idrol"=>$idrol]);
        }
    }

    public function create()
    {
        $dotacion=DB::table('dotacion')
            ->orderBy('ID','asc')
            ->get();
        error_reporting(E_ALL and E_NOTICE);
        session_start();
        $idrol = DB::table('rol')
            ->select('rol.ID',DB::raw('CONCAT(persona.Nombre," ",persona.Apellido_Paterno," ",persona.Apellido_Materno) as Nombre'))
            ->join('usuario','rol.Per_CI','=','usuario.Per_CI')
            ->join('persona','persona.CI','=','usuario.Per_CI')
            ->where('usuario.ID','=',$_SESSION['username'])
            ->get();

        return view("Registrar.NotaIngresoDotacion.create",["dotacion"=>$dotacion,"idrol"=>$idrol]);
    }

    public function store(NotaIngresoDotacionFormRequest $request)
    {
        $ingreso = new NotaIngresoDotacion();
        $mytime = Carbon::now('America/La_paz');
        $ingreso->Fecha_Hora=$mytime->toDateTimeString();
        $ingreso->ID_Rol = $request->get('ID_Rol');
        $ingreso->save();

        $ID_Dotacion = $request->get('ID_Dotacion');
        $Cantidad = $request->get('Cantidad');

        $cont = 0;
        while ($cont < count($ID_Dotacion)){
            $detalle = new DotacionIngresoDetalle;
            $detalle->ID_Dotacion = $ID_Dotacion[$cont];
            $detalle->Cod_Nota_Ingreso_Dot = $ingreso->Codigo;
            $detalle->Cantidad = $Cantidad[$cont];
            $detalle->save();
            $cont = $cont + 1;
        }
        session_start();
        $det=new DetalleBitacora();
        $det->ID_b=$_SESSION['id'];
        $det->Operacion = 'REGISTRA INGRESO';
        $det->Tabla = 'DE DOTACION';
        $mytime = Carbon::now('America/La_paz');
        $det->Hora=$mytime->toTimeString();
        $det->save();

        return Redirect::to('Registrar/IngresoDotacion');
    }

    public function show($id)
    {
        $ingreso=DB::table('nota_ingreso_dotacion as ni')
            ->select('ni.Codigo','ni.Fecha_Hora')
            ->where('ni.Codigo','=',$id)
            ->first();
        $detalles=DB::table('dot_tiene_notingdot as nid')
            ->join('dotacion as d','d.ID','=','nid.ID_Dotacion')
            ->select('d.Nombre','nid.Cantidad')
            ->where('nid.Cod_Nota_Ingreso_Dot','=',$id)
            ->get();
        error_reporting(E_ALL and E_NOTICE);
        session_start();
        $idrol = DB::table('rol')
            ->select('rol.ID',DB::raw('CONCAT(persona.Nombre," ",persona.Apellido_Paterno," ",persona.Apellido_Materno) as Nom'))
            ->join('usuario','rol.Per_CI','=','usuario.Per_CI')
            ->join('persona','persona.CI','=','usuario.Per_CI')
            ->where('usuario.ID','=',$_SESSION['username'])
            ->get();

        return view("Registrar.NotaIngresoDotacion.show",["ingreso"=>$ingreso,"detalles"=>$detalles,"idrol"=>$idrol]);
    }
}
