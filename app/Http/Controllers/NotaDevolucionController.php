<?php

namespace ApoloConstructora\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;
use ApoloConstructora\Http\Requests\NotaDevolucionFormRequest;
use ApoloConstructora\NotaDevolucion;
use ApoloConstructora\EstadoDevolucion;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use ApoloConstructora\DetalleBitacora;

class NotaDevolucionController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        if($request)
        {
            $query=trim($request->get('searchText'));
            $devolucion=DB::table('nota_devolucion')
                ->where('nota_devolucion.Codigo','LIKE','%'.$query.'%')
                ->orderBy('nota_devolucion.Codigo','desc')
                ->paginate(10);

            error_reporting(E_ALL and E_NOTICE);
            session_start();
            $idrol = DB::table('rol')
                ->select(DB::raw('CONCAT(persona.Nombre," ",persona.Apellido_Paterno," ",persona.Apellido_Materno) as Nombre'))
                ->join('usuario','rol.Per_CI','=','usuario.Per_CI')
                ->join('persona','persona.CI','=','usuario.Per_CI')
                ->where('usuario.ID','=',$_SESSION['username'])
                ->get();
            return view('Registrar.NotaDevolucion.index',["searchText"=>$query,"idrol"=>$idrol,"devolucion"=>$devolucion]);
        }
    }

    public function create()
    {
        $prestamoherramienta1=DB::table('nota_prestamo as ne')
            ->select(DB::raw('SUM(nota.Cantidad) as C'),'h.Nombre','pr.Nombre as N')
            ->join('notprest_tiene_herr as nota','ne.Codigo','=','nota.Nota_Prestamo_Codigo')
            ->join('herramienta as h','nota.Herramienta_Codigo','=','h.Codigo')
            ->join('proyecto as pr','ne.Proyecto_Nro','=','pr.Nro')
            ->groupBy('h.Nombre','pr.Nombre')
            ->get();

        $herramientas = DB::table('herramienta')->get();
        $estados = DB::table('estado')->get();
        $proyecto = DB::table('proyecto')->get();


        error_reporting(E_ALL and E_NOTICE);
        session_start();
        $idrol = DB::table('rol')
            ->select('rol.ID',DB::raw('CONCAT(persona.Nombre," ",persona.Apellido_Paterno," ",persona.Apellido_Materno) as Nombre'))
            ->join('usuario','rol.Per_CI','=','usuario.Per_CI')
            ->join('persona','persona.CI','=','usuario.Per_CI')
            ->where('usuario.ID','=',$_SESSION['username'])
            ->get();

        return view("Registrar.NotaDevolucion.create",["prestamoherramienta"=>$prestamoherramienta1,"idrol"=>$idrol,
            "herramientas"=>$herramientas,"estado"=>$estados,"proyecto"=>$proyecto]);
    }

    public function store(NotaDevolucionFormRequest $request)
    {
        $devolucion = new NotaDevolucion();
        $mytime = Carbon::now('America/La_paz');
        $devolucion->Fecha=$mytime->toDateTimeString();
        $devolucion->ID_Rol=$request->get('ID_Rol');
        $devolucion->Nro_Proyecto=$request->get('Proyecto_Nro');
        $devolucion->save();


        $codigo_herramienta = $request->get('Codigo_Herramienta');
        $estado = $request->get('ID_Estado');
        $Cantidad = $request->get('Cantidad');

        $cont = 0;
        while ($cont < count($codigo_herramienta)){
            $detalle = new EstadoDevolucion();
            $detalle->Nota_Devolucion_Codigo = $devolucion->Codigo;
            $detalle->Herramienta_Codigo = $codigo_herramienta[$cont];
            $detalle->ID_Estado = $estado[$cont];
            $detalle->Cantidad = $Cantidad[$cont];
            $detalle->save();
            $cont = $cont + 1;
        }
        session_start();
        $det=new DetalleBitacora();
        $det->ID_b=$_SESSION['id'];
        $det->Operacion = 'REGISTRA';
        $det->Tabla = 'DEVOLUCION';
        $mytime = Carbon::now('America/La_paz');
        $det->Hora=$mytime->toTimeString();
        $det->save();
        return Redirect::to('Registrar/NotaDevolucion');
    }

    public function show($id)
    {
        $devolucion=DB::table('nota_devolucion as nd')
            ->select('nd.Codigo','nd.Fecha')
            ->where('nd.Codigo','=',$id)
            ->get();
        $detalles=DB::table('estado_devolucion as es')
            ->join('nota_devolucion as nd','nd.Codigo','=','es.Nota_Devolucion_Codigo')
            ->join('herramienta as h','h.Codigo','=','es.Herramienta_Codigo')
            ->join('estado as e','e.ID_Estado','=','es.ID_Estado')
            ->select('h.Nombre','es.Cantidad','e.Descripcion')
            ->where('es.Nota_Devolucion_Codigo','=',$id)
            ->get();

        error_reporting(E_ALL and E_NOTICE);
        session_start();
        $idrol = DB::table('rol')
            ->select('rol.ID',DB::raw('CONCAT(persona.Nombre," ",persona.Apellido_Paterno," ",persona.Apellido_Materno) as Nom'))
            ->join('usuario','rol.Per_CI','=','usuario.Per_CI')
            ->join('persona','persona.CI','=','usuario.Per_CI')
            ->where('usuario.ID','=',$_SESSION['username'])
            ->get();

        return view("Registrar.NotaDevolucion.show",["devolucion"=>$devolucion,"detalles"=>$detalles,"idrol"=>$idrol]);
    }




}
