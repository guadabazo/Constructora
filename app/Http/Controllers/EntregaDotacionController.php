<?php

namespace ApoloConstructora\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use ApoloConstructora\Http\Requests\EntregaDotacionFormRequest;
use ApoloConstructora\EntregaDotacion;
use DB;

use Carbon\Carbon;

use ApoloConstructora\DetalleBitacora;
class EntregaDotacionController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        if($request)
        {
            $query=trim($request->get('searchText'));
            $entregaDotacion=DB::table('dot_entrega_trabajador as ed')
                ->join('trabajador as j','j.Per_CI','=','ed.Per_CI')
                ->join('persona as p','p.CI','=','ed.Per_CI')
                ->select('p.Nombre','p.Apellido_Paterno','ed.Codigo')
                ->where('p.Nombre','LIKE','%'.$query.'%')
                ->orderBy('ed.Codigo','desc')
                ->paginate(10);

            error_reporting(E_ALL and E_NOTICE);
            session_start();
            $idrol = DB::table('rol')
                ->select(DB::raw('CONCAT(persona.Nombre," ",persona.Apellido_Paterno," ",persona.Apellido_Materno) as Nombre'))
                ->join('usuario','rol.Per_CI','=','usuario.Per_CI')
                ->join('persona','persona.CI','=','usuario.Per_CI')
                ->where('usuario.ID','=',$_SESSION['username'])
                ->get();
            return view('RegistrarEgreso.EntregaDotacion.index',["entregaDotacion"=>$entregaDotacion,"searchText"=>$query,"idrol"=>$idrol]);
        }
    }

    public function create()
    {
        $trabajador=DB::table('trabajador')
            ->select('et.Nombre','et.Apellido_Paterno','et.Apellido_Materno','trabajador.Per_CI')
            ->join('persona as et','et.CI','=','trabajador.Per_CI')
            ->get();

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

        return view("RegistrarEgreso.EntregaDotacion.create",["trabajador"=>$trabajador,"idrol"=>$idrol,"dotacion"=>$dotacion]);
    }

    public function store(EntregaDotacionFormRequest $request)
    {
        $ID_Dotacion = $request->get('ID_Dotacion');
        $Per_CI = $request->get('Per_CI');
        $Cantidad = $request->get('Cantidad');

        $cont = 0;
        while ($cont < count($ID_Dotacion)){
            $entregaDotacion=new EntregaDotacion();

            $entregaDotacion->ID_Dotacion=$ID_Dotacion[$cont];
            $entregaDotacion->Per_CI=$Per_CI[$cont];
            $entregaDotacion->Cantidad=$Cantidad[$cont];
            $entregaDotacion->ID_Rol = $request->get('ID_Rol');

            $mytime = Carbon::now('America/La_paz');
            $entregaDotacion->Fecha=$mytime->toDateString();

            $entregaDotacion->save();
            $cont = $cont + 1;
        }
        session_start();
        $det=new DetalleBitacora();
        $det->ID_b=$_SESSION['id'];
        $det->Operacion = 'ENTREGA';
        $det->Tabla = 'DOTACION';
        $mytime = Carbon::now('America/La_paz');
        $det->Hora=$mytime->toTimeString();
        $det->save();
        return Redirect::to('RegistrarEgreso/EntregaDotacion');


    }
    public function show($id)
    {

        $EntregaDotacion=DB::table('dot_entrega_trabajador as et')
            ->join('dotacion as d','d.ID','=','et.ID_Dotacion')
            ->select('d.Nombre','et.Cantidad','et.Fecha')
            ->where('et.Codigo','=',$id)
            ->get();

        error_reporting(E_ALL and E_NOTICE);
        session_start();
        $idrol = DB::table('rol')
            ->select('rol.ID',DB::raw('CONCAT(persona.Nombre," ",persona.Apellido_Paterno," ",persona.Apellido_Materno) as Nom'))
            ->join('usuario','rol.Per_CI','=','usuario.Per_CI')
            ->join('persona','persona.CI','=','usuario.Per_CI')
            ->where('usuario.ID','=',$_SESSION['username'])
            ->get();

        return view("RegistrarEgreso.EntregaDotacion.show",["EntregaDotacion"=>$EntregaDotacion,"idrol"=>$idrol]);
    }

}
