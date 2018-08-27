<?php

namespace ApoloConstructora\Http\Controllers;

use Illuminate\Http\Request;

use ApoloConstructora\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use ApoloConstructora\Http\Requests\NotaIngresoHerramientaFormRequest;
use ApoloConstructora\NotaIngresoHerramienta;
use ApoloConstructora\HerramientaIngresoDetalle;
use Illuminate\Support\Facades\DB;
use ApoloConstructora\DetalleBitacora;
use Carbon\Carbon;

class NotaIngresoHerramientaController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        if($request)
        {
            $query=trim($request->get('searchText'));
            $ingresos=DB::table('nota_ingreso_herramienta as ni')
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
            return view('Registrar.NotaIngresoHerramienta.index',["ingresos"=>$ingresos,"searchText"=>$query,"idrol"=>$idrol]);
        }
    }

    public function create()
    {
        $herramientas=DB::table('herramienta')
            ->orderBy('Codigo','asc')
            ->get();
        error_reporting(E_ALL and E_NOTICE);
        session_start();
        $idrol = DB::table('rol')
            ->select('rol.ID',DB::raw('CONCAT(persona.Nombre," ",persona.Apellido_Paterno," ",persona.Apellido_Materno) as Nombre'))
            ->join('usuario','rol.Per_CI','=','usuario.Per_CI')
            ->join('persona','persona.CI','=','usuario.Per_CI')
            ->where('usuario.ID','=',$_SESSION['username'])
            ->get();

        return view("Registrar.NotaIngresoHerramienta.create",["herramientas"=>$herramientas,"idrol"=>$idrol]);
    }

    public function store(NotaIngresoHerramientaFormRequest $request)
    {

            $ingreso = new NotaIngresoHerramienta;
            $mytime = Carbon::now('America/La_paz');
            $ingreso->Fecha_Hora=$mytime->toDateTimeString();
            $ingreso->ID_Rol = $request->get('ID_Rol');
            $ingreso->save();

            $Codigo_Herramienta = $request->get('Codigo_Herramienta');
            $Cantidad = $request->get('Cantidad');

            $cont = 0;
            while ($cont < count($Codigo_Herramienta)){
                $detalle = new HerramientaIngresoDetalle();
                $detalle->Codigo_Herramienta = $Codigo_Herramienta[$cont];
                $detalle->Cod_Nota_Ingreso_Herr = $ingreso->Codigo;
                $detalle->Cantidad = $Cantidad[$cont];
                $detalle->save();
                $cont = $cont + 1;
            }
        session_start();
        $det=new DetalleBitacora();
        $det->ID_b=$_SESSION['id'];
        $det->Operacion = 'REGISTRA INGRESO';
        $det->Tabla = 'DE HERRAMIENTA';
        $mytime = Carbon::now('America/La_paz');
        $det->Hora=$mytime->toTimeString();
        $det->save();
        return Redirect::to('Registrar/IngresoHerramienta');
    }

    public function show($id)
    {
        $ingreso=DB::table('nota_ingreso_herramienta as ni')
            ->select('ni.Codigo','ni.Fecha_Hora')
            ->where('ni.Codigo','=',$id)
            ->first();
        $detalles=DB::table('herr_tiene_notingherr1 as nid')
            ->join('herramienta as h','h.Codigo','=','nid.Codigo_Herramienta')
            ->select('h.Nombre','nid.Cantidad')
            ->where('nid.Cod_Nota_Ingreso_herr','=',$id)
            ->get();
        error_reporting(E_ALL and E_NOTICE);
        session_start();
        $idrol = DB::table('rol')
            ->select('rol.ID',DB::raw('CONCAT(persona.Nombre," ",persona.Apellido_Paterno," ",persona.Apellido_Materno) as Nom'))
            ->join('usuario','rol.Per_CI','=','usuario.Per_CI')
            ->join('persona','persona.CI','=','usuario.Per_CI')
            ->where('usuario.ID','=',$_SESSION['username'])
            ->get();

        return view("Registrar.NotaIngresoHerramienta.show",["ingreso"=>$ingreso,"detalles"=>$detalles,"idrol"=>$idrol]);
    }
}
