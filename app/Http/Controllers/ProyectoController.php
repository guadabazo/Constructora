<?php

namespace ApoloConstructora\Http\Controllers;

use Illuminate\Http\Request;

use ApoloConstructora\DetalleEstado;
use ApoloConstructora\Encargado;
use ApoloConstructora\EncargadoProyecto;
use ApoloConstructora\EstadoProyecto;
use ApoloConstructora\Produccion;
use ApoloConstructora\ProduccionRealizaProyecto;
use ApoloConstructora\DetalleBitacora;
use Carbon\Carbon;
use ApoloConstructora\Proyecto;
use Illuminate\Support\Facades\Redirect;
use ApoloConstructora\Http\Requests\ProyectoFormRequest;
use DB;

use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Component\CssSelector\Node\ElementNode;

class ProyectoController extends Controller
{
    public function __construct()
    {

    }



    public function index(Request $request)
    {
        if($request)
        {
            $query = trim($request->get('searchText'));
            $proyecto = DB::table('proyecto as p')
                ->join('detalle_estado as de','de.Nro_Proyecto','=','p.Nro')
                ->join('estado_proyecto as ep','ep.ID','=','de.ID_Estado_Proyecto')
                ->join('prod_realiza_proy as r','r.Proyecto_Nro','=','p.Nro')
                ->join('produccion as pr','pr.Nro','=','r.Produccion_Nro')
                ->select('p.Nro','p.Nombre','pr.Tipo','p.Inicio','p.Final_Aproximado')
                -> where('p.Nombre','LIKE','%'.$query.'%')
                ->groupBy('p.Nro','p.Nombre','pr.Tipo','p.Inicio','p.Final_Aproximado')
                ->orderBy('Nro','asc')
                ->paginate(5);


        }

        return view('Administrar.GestionarProyecto.index',["proyecto"=>$proyecto,"searchText"=>$query]);
    }


    public function create()
    {

        $produccion=DB::table('produccion')
            ->orderBy('Nro','asc' )
            ->get();

        $estado=DB::table('estado_proyecto')
            ->orderBy('ID','asc')
            ->get();
        $detalle=DB::table('detalle_estado')
            ->orderBy('ID','asc' )
            ->get();
        $encargado=DB::table('encargado')
            ->orderBy('Per_CI','asc' )
            ->get();

        return view("Administrar.GestionarProyecto.create",["produccion"=>$produccion,"estado_proyecto"=>$estado,
            "detalle"=>$detalle,"encargado"=>$encargado]);
    }


    public function store(ProyectoFormRequest $request){

        $proyecto=new Proyecto;


        $proyecto->Nombre=$request->get('Nombre');
        $mytime=Carbon::now('America/La_paz');
        $proyecto->Inicio=$mytime->toDateString();
        $proyecto->Final_Aproximado=$request->get('Final_Aproximado');
        $proyecto->save();

        $Proyecto_Nro=$proyecto->Nro;
        $Produccion_Nro = $request->get('Produccion_Numero');


        $realiza = new ProduccionRealizaProyecto;
        $realiza ->Produccion_Nro=$Produccion_Nro;
        $realiza ->Proyecto_Nro=$Proyecto_Nro;
        $realiza ->Cantidad='0';
        $mytimed=Carbon::now('America/La_paz');
        $realiza->Fecha=$mytimed->toDateString();

        $realiza->save();

        $ID_Estado = $request->get('ID_Estado');

        $estado = new DetalleEstado();
        $estado->ID_Estado_Proyecto=$ID_Estado;
        $estado->Nro_Proyecto=$Proyecto_Nro;
        $mytimee=Carbon::now('America/La_paz');
        $estado->Fecha_Hora=$mytimee->toDateString();
        $estado->save();

        $Encargado_CI = $request->get('Encargado_Proyecto');
        $encargado=new EncargadoProyecto;
        $encargado->Encargado_CI=$Encargado_CI;
        $encargado->Proyecto_Nro=$Proyecto_Nro;
        $encargado->save();

        session_start();
        $det=new DetalleBitacora();
        $det->ID_b=$_SESSION['id'];
        $det->Operacion = 'REGISTRA';
        $det->Tabla = 'PROYECTO';
        $mytime = Carbon::now('America/La_paz');
        $det->Hora=$mytime->toTimeString();
        $det->save();


        return Redirect::to('administrar/gestionar_proyecto');


    }

    public function show($id){
        $encargados=DB::table('proyecto as p')
            ->join('encar_tiene_proy as en','en.Proyecto_Nro','=','p.Nro')
            ->join('encargado as e','e.Per_CI','=','en.Encargado_CI')
            ->join('persona as pe','pe.CI','=','e.Per_CI')
            ->select('pe.Nombre','pe.Apellido_Paterno','pe.Apellido_Materno','p.Nombre')
            ->where('en.Proyecto_Nro','=',$id)
            ->orderBy('p.Nombre','asc')
            ->paginate(7);

        $estados=DB::table('proyecto as pr')
            ->join('detalle_estado as de','de.Nro_Proyecto','=','pr.Nro')
            ->join('estado_proyecto as ep','ep.ID','=','de.ID_Estado_Proyecto')
            ->select('pr.Nombre','de.Fecha_Hora','ep.Descripcion')
            ->where('de.Nro_Proyecto','=',$id)
            ->orderBy('pr.Nombre','asc')
            ->paginate(7);

        return view("Administrar.GestionarProyecto.show",["encargados"=>$encargados,"estados"=>$estados]);
    }

    public function edit($id){

        $estado=DB::table('estado_proyecto')
            ->get();
        $detalle=DB::table('detalle_estado')
            ->get();

        $encargado=DB::table('encargado')
            ->get();
        return view("Administrar.GestionarProyecto.edit",["proyecto"=>Proyecto::findOrFail($id)
            ,"estado"=>$estado,"detalle"=>$detalle,"encargado"=>$encargado]);


    }


    public function update(ProyectoFormRequest $request,$id)
    {
        $proyecto=Proyecto::findOrFail($id);
        $proyecto->Nro=$id;
        $proyecto->Final_Aproximado=$request->get('Final_Aproximado');

        $Encargado_CI = $request->get('Encargado_Proyecto');
        if($Encargado_CI!=""){

            $encargado=new EncargadoProyecto;
            $encargado->Encargado_CI=$Encargado_CI;
            $encargado->Proyecto_Nro=$proyecto->Nro;
            $encargado->save();
        }

        $ID_Estado = $request->get('ID_Estado');
        if($ID_Estado!=""){
            $estado = new DetalleEstado();
            $estado->ID_Estado_Proyecto=$ID_Estado;
            $estado->Nro_Proyecto=$proyecto->Nro;
            $mytimee=Carbon::now('America/La_paz');
            $estado->Fecha_Hora=$mytimee->toDateString();
            $estado->save();
        }

        $proyecto->update();
        session_start();
        $det=new DetalleBitacora();
        $det->ID_b=$_SESSION['id'];
        $det->Operacion = 'ACTUALIZA';
        $det->Tabla = 'PROYECTO';
        $mytime = Carbon::now('America/La_paz');
        $det->Hora=$mytime->toTimeString();
        $det->save();
        return Redirect::to('administrar/gestionar_proyecto');


    }

    public function destroy($id)
    {

    }


}
