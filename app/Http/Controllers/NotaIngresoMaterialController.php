<?php

namespace ApoloConstructora\Http\Controllers;

use Illuminate\Http\Request;
use ApoloConstructora\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use ApoloConstructora\Http\Requests\NotaIngresoMaterialFormRequest;
use ApoloConstructora\NotaIngresoMaterial;
use Illuminate\Support\Facades\DB;
use ApoloConstructora\DetalleBitacora;
use Carbon\Carbon;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Component\CssSelector\Node\ElementNode;


class NotaIngresoMaterialController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        if($request)
        {
            $query=trim($request->get('searchText'));
            $ingresos=DB::table('nota_ingreso as ni')
                ->select('ni.Codigo','ni.Fecha',DB::raw('CONCAT(p.Nombre, " ",p.Apellido_Paterno," ",p.Apellido_Materno) as N'),'m.Nombre','ni.Cantidad')
                ->join('persona as p','p.CI','=','ni.Proveedor_CI')
                ->join('material as m','m.Codigo','=','ni.Material_Codigo')
                ->where('m.Nombre','LIKE','%'.$query.'%')
                ->orderBy('ni.Codigo','desc')
                ->paginate(10);
            return view('Registrar.NotaIngresoMaterial.index',["ingresos"=>$ingresos,"searchText"=>$query]);
        }
    }

    public function create()
    {
        $proveedores=DB::table('proveedor')
            ->join('persona','persona.CI','=','proveedor.Per_CI')
            ->get();
        $materiales=DB::table('material')
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
        session_start();
        $det=new DetalleBitacora();
        $det->ID_b=$_SESSION['id'];
        $det->Operacion = 'REGISTRA INGRESO';
        $det->Tabla = 'DE MATERIAL';
        $mytime = Carbon::now('America/La_paz');
        $det->Hora=$mytime->toTimeString();
        $det->save();

        return view("Registrar.NotaIngresoMaterial.create",["proveedores"=>$proveedores,"materiales"=>$materiales,"idrol"=>$idrol]);
    }

    public function store(NotaIngresoMaterialFormRequest $request)
    {
            $notaingresomaterial=new NotaIngresoMaterial;
            $notaingresomaterial->Cantidad=$request->get('Cantidad');
            $mytime = Carbon::now('America/La_paz');
            $notaingresomaterial->Fecha=$mytime->toDateTimeString();
            $notaingresomaterial->Proveedor_CI=$request->get('Proveedor_CI');
            $notaingresomaterial->Material_Codigo=$request->get('Material_Codigo');
            $notaingresomaterial->ID_Rol = $request->get('ID_Rol');
            $notaingresomaterial->save();

        return Redirect::to('Registrar/IngresoMaterial');
    }


}
