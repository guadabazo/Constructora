<?php

namespace ApoloConstructora\Http\Controllers;

use Illuminate\Http\Request;

use ApoloConstructora\NotaSalidaCombustible;
use ApoloConstructora\MaterialPerteneceNotentre;
use ApoloConstructora\EntregaChofer;
use ApoloConstructora\DetalleBitacora;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use ApoloConstructora\Http\Requests\NotaSalidaCombustibleFormRequest;

use Carbon\Carbon;
use DB;

class NotaSalidaCombustibleController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        if($request)
        {
            $query=trim($request->get('searchText'));
            $NotaEntregaCom=DB::table('nota_entrega as ne')
                ->join('entrega_chofer as ec','ec.Codigo','=','ne.Codigo')
                ->join('persona as p','p.Ci','=','ec.Chofer_CI')
                ->select('ne.Codigo','p.Nombre','p.Apellido_Paterno')
                ->where('ne.Codigo','LIKE','%'.$query.'%')
                ->orderBy('ne.Codigo','desc')
                ->paginate(10);

            error_reporting(E_ALL and E_NOTICE);
            session_start();
            $idrol = DB::table('rol')
                ->select(DB::raw('CONCAT(persona.Nombre," ",persona.Apellido_Paterno," ",persona.Apellido_Materno) as Nombre'))
                ->join('usuario','rol.Per_CI','=','usuario.Per_CI')
                ->join('persona','persona.CI','=','usuario.Per_CI')
                ->where('usuario.ID','=',$_SESSION['username'])
                ->get();
            return view('RegistrarEgreso.NotaSalidaCombustible.index',["NotaEntregaCom"=>$NotaEntregaCom,"searchText"=>$query,"idrol"=>$idrol]);
        }
    }

    public function create()
    {
        $chofer=DB::table('chofer as c')
            ->join('persona as p','p.CI','=','c.Per_CI')
            ->orderBy('Per_CI','asc')
            ->get();

        $material=DB::table('material as m')
            ->select('m.Codigo','m.Nombre')
            ->where('m.Tipo','=','1')
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

        return view("RegistrarEgreso.NotaSalidaCombustible.create",["chofer"=>$chofer,"idrol"=>$idrol,"material"=>$material]);
    }

    public function store(NotaSalidaCombustibleFormRequest $request)
    {
        $notaEntrega=new NotaSalidaCombustible();
        $notaEntrega->ID_Rol=$request->get('ID_Rol');
        $mytime = Carbon::now('America/La_paz');
        $notaEntrega->Fecha_hora=$mytime->toDateTimeString();
        $notaEntrega->save();


        $MaterialPertenece=new MaterialPerteneceNotentre();
        $MaterialPertenece->Nota_Entrega_codigo=$notaEntrega->Codigo;
        $MaterialPertenece->Material_Codigo=$request->get('Codigo');
        $MaterialPertenece->Cantidad=$request->get('Cantidad');
        $MaterialPertenece->save();

        $entregChofer=new EntregaChofer();
        $entregChofer->Codigo=$notaEntrega->Codigo;
        $entregChofer->Chofer_CI=$request->get('Per_CI');
        $entregChofer->save();

        session_start();
        $det=new DetalleBitacora();
        $det->ID_b=$_SESSION['id'];
        $det->Operacion = 'REGISTRA SALIDA';
        $det->Tabla = 'DE COMBUSTIBLE';
        $mytime = Carbon::now('America/La_paz');
        $det->Hora=$mytime->toTimeString();
        $det->save();

        return Redirect::to('RegistrarEgreso/NotaSalidaCombustible');


    }
    public function show($id)
    {

        $EntregaMaterialCom=DB::table('material as m')
            ->select('mne.Cantidad','m.Nombre','c.Licencia','c.Placa','ne.Fecha_Hora')
            ->join('material_pertenece_notentre as mne','m.Codigo','=','mne.Material_Codigo')
            ->join('nota_entrega as ne','ne.Codigo','=','mne.Nota_Entrega_codigo')
            ->join('entrega_chofer as en','en.Codigo','=','ne.Codigo')
            ->join('chofer as c','en.Chofer_CI','=','c.Per_CI')
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

        return view("RegistrarEgreso.NotaSalidaCombustible.show",["EntregaMaterialCom"=>$EntregaMaterialCom,"idrol"=>$idrol]);
    }

}
