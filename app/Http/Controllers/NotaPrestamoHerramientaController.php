<?php

namespace ApoloConstructora\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use ApoloConstructora\Http\Requests\NotaPrestamoHerramientaFormRequest;
use ApoloConstructora\NotaPrestamoHerramienta;
use ApoloConstructora\notprest_tiene_herr;
use ApoloConstructora\DetalleBitacora;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class NotaPrestamoHerramientaController extends Controller
{
    public function __construct()
    {
    }

    public function index(Request $request)
    {
        if($request)
        {
            $query=trim($request->get('searchText'));
            $prestamo=DB::table('nota_prestamo as np')
                ->select('np.Codigo','np.Fecha_Hora')
                ->where('np.Codigo','LIKE','%'.$query.'%')
                ->orderBy('np.Codigo','desc')
                ->paginate(10);

            error_reporting(E_ALL and E_NOTICE);
            session_start();
            $idrol = DB::table('rol')
                ->select(DB::raw('CONCAT(persona.Nombre," ",persona.Apellido_Paterno," ",persona.Apellido_Materno) as Nombre'))
                ->join('usuario','rol.Per_CI','=','usuario.Per_CI')
                ->join('persona','persona.CI','=','usuario.Per_CI')
                ->where('usuario.ID','=',$_SESSION['username'])
                ->get();
            return view('RegistrarEgreso.NotaPrestamoHerramienta.index',["prestamo"=>$prestamo,"searchText"=>$query,"idrol"=>$idrol]);
        }
    }

    public function create()
    {
        $proyecto=DB::table('proyecto as p')
            ->select('p.Nro','p.Nombre')
            ->join('detalle_estado as ds','ds.Nro_Proyecto','=','p.Nro')
            ->join('estado_proyecto as ep','ep.ID','=','ds.ID_Estado_Proyecto')
            ->where('ep.Descripcion','=','en Curso')
            ->orderBy('p.Nro','asc')
            ->get();

        $herramienta=DB::table('herramienta')
            ->orderBy('Codigo','asc')
            ->get();

        $encargados=DB::table('proyecto as p')
            ->join('encar_tiene_proy as en','en.Proyecto_Nro','=','p.Nro')
            ->join('encargado as e','e.Per_CI','=','en.Encargado_CI')
            ->join('persona as pe','pe.CI','=','e.Per_CI')
            ->select('pe.Nombre','pe.Apellido_Paterno','pe.Apellido_Materno','p.Nombre')
            ->orderBy('p.Nombre','asc')
            ->paginate(7);

        error_reporting(E_ALL and E_NOTICE);
        session_start();
        $idrol = DB::table('rol')
            ->select('rol.ID',DB::raw('CONCAT(persona.Nombre," ",persona.Apellido_Paterno," ",persona.Apellido_Materno) as Nombre'))
            ->join('usuario','rol.Per_CI','=','usuario.Per_CI')
            ->join('persona','persona.CI','=','usuario.Per_CI')
            ->where('usuario.ID','=',$_SESSION['username'])
            ->get();

        return view("RegistrarEgreso.NotaPrestamoHerramienta.create",["proyecto"=>$proyecto,"idrol"=>$idrol,"herramienta"=>$herramienta,"encargados"=>$encargados]);
    }

    public function store(NotaPrestamoHerramientaFormRequest $request)
    {
        $notaPrestamo=new NotaPrestamoHerramienta();
        $notaPrestamo->ID_Rol=$request->get('ID_Rol');
        $mytime = Carbon::now('America/La_paz');
        $notaPrestamo->Fecha_hora=$mytime->toDateTimeString();
        $notaPrestamo->Fecha_Aprox_Devol=$request->get('FechaA');
        $notaPrestamo->Proyecto_Nro = $request->get('Nro');
        $notaPrestamo->save();

        $Codigo = $request->get('Codigo');
        $cantidad=$request->get('Cantidad');

        $cont = 0;
        while ($cont < count($Codigo)){
            $prestamo=new notprest_tiene_herr();
            $prestamo->Nota_Prestamo_Codigo=$notaPrestamo->Codigo;
            $prestamo->Herramienta_Codigo=$Codigo[$cont];
            $prestamo->Cantidad=$cantidad[$cont];
            $prestamo->save();
            $cont = $cont + 1;
        }
        session_start();
        $det=new DetalleBitacora();
        $det->ID_b=$_SESSION['id'];
        $det->Operacion = 'REGISTRA';
        $det->Tabla = 'PRESTAMO';
        $mytime = Carbon::now('America/La_paz');
        $det->Hora=$mytime->toTimeString();
        $det->save();
        return Redirect::to('RegistrarEgreso/PrestamoHerramienta');


    }


    public function show($id)
    {

        $prestamoherramienta=DB::table('nota_prestamo as ne')
            ->join('notprest_tiene_herr as nota','ne.Codigo','=','nota.Nota_Prestamo_Codigo')
            ->join('herramienta as h','nota.Herramienta_Codigo','=','h.Codigo')
            ->join('proyecto as pr','ne.Proyecto_Nro','=','pr.Nro')
            ->select('nota.Cantidad','h.Nombre','ne.Fecha_Hora','pr.Nombre as N')
            ->where('ne.Codigo','=',$id)
            ->get();

        error_reporting(E_ALL and E_NOTICE);
        session_start();
        $idrol = DB::table('rol')
            ->select('rol.ID',DB::raw('CONCAT(persona.Nombre," ",persona.Apellido_Paterno," ",persona.Apellido_Materno) as Nom'))
            ->join('usuario','rol.Per_CI','=','usuario.Per_CI')
            ->join('persona','persona.CI','=','usuario.Per_CI')
            ->where('usuario.ID','=',$_SESSION['username'])
            ->get();

        return view("RegistrarEgreso.NotaPrestamoHerramienta.show",["prestamoherramienta"=>$prestamoherramienta,"idrol"=>$idrol]);
    }


}
