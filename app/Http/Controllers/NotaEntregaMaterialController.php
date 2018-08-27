<?php

namespace ApoloConstructora\Http\Controllers;

use Illuminate\Http\Request;

use ApoloConstructora\NotaEntregaMaterial;
use ApoloConstructora\MaterialPerteneceNotentre;
use ApoloConstructora\EntregaProyecto;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use ApoloConstructora\Http\Requests\NotaEntregaMaterialFormRequest;
use ApoloConstructora\DetalleBitacora;
use ApoloConstructora\NotaEntregaDotacion;
use Carbon\Carbon;
use DB;

class NotaEntregaMaterialController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        if($request)
        {
            $query=trim($request->get('searchText'));
            $NotaEntrega=DB::table('nota_entrega as ne')
                ->join('entrega_proyecto as ep','ep.Codigo','=','ne.Codigo')
                ->join('proyecto as p','p.Nro','=','ep.Proyecto_Nro')
                ->select('ne.Codigo','p.Nombre')
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
            return view('RegistrarEgreso.NotaEntregaMaterial.index',["NotaEntrega"=>$NotaEntrega,"searchText"=>$query,"idrol"=>$idrol]);
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

        $material=DB::table('material as m')
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

        return view("RegistrarEgreso.NotaEntregaMaterial.create",["proyecto"=>$proyecto,"idrol"=>$idrol,"material"=>$material]);
    }

    public function store(NotaEntregaMaterialFormRequest $request)
    {
        $notaEntrega=new NotaEntregaMaterial();
        $notaEntrega->ID_Rol=$request->get('ID_Rol');
        $mytime = Carbon::now('America/La_paz');
        $notaEntrega->Fecha_hora=$mytime->toDateTimeString();
        $notaEntrega->save();

        $Codigo = $request->get('Codigo');
        $cantidad=$request->get('Cantidad');

        $cont = 0;
        while ($cont < count($Codigo)){
            $MaterialPertenece=new MaterialPerteneceNotentre();
            $MaterialPertenece->Nota_Entrega_codigo=$notaEntrega->Codigo;
            $MaterialPertenece->Material_Codigo=$Codigo[$cont];
            $MaterialPertenece->Cantidad=$cantidad[$cont];
            $MaterialPertenece->save();
            $cont = $cont + 1;
        }

        $proyecto=new EntregaProyecto();
        $proyecto->Codigo=$notaEntrega->Codigo;
        $proyecto->Proyecto_Nro=$request->get('Nro');
        $proyecto->save();
        session_start();
        $det=new DetalleBitacora();
        $det->ID_b=$_SESSION['id'];
        $det->Operacion = 'ENTREGA';
        $det->Tabla = 'MATERIAL';
        $mytime = Carbon::now('America/La_paz');
        $det->Hora=$mytime->toTimeString();
        $det->save();

        return Redirect::to('RegistrarEgreso/NotaEntregaMaterial');


    }

    public function show($id)
    {

        $EntregaMaterial=DB::table('nota_entrega as ne')
            ->join('material_pertenece_notentre as mne','ne.Codigo','=','mne.Nota_Entrega_codigo')
            ->join('material as m','mne.Material_Codigo','=','m.Codigo')
            ->select('mne.Cantidad','m.Nombre','ne.Fecha_Hora')
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

        return view("RegistrarEgreso.NotaEntregaMaterial.show",["EntregaMaterial"=>$EntregaMaterial,"idrol"=>$idrol]);
    }


}
