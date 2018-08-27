<?php

namespace ApoloConstructora\Http\Controllers;

use Illuminate\Http\Request;

use ApoloConstructora\DetalleBitacora;
use ApoloConstructora\Trabajador;
use ApoloConstructora\Requests;
use Illuminate\Support\Facades\Redirect;
use ApoloConstructora\Http\Requests\TrabajadorFormRequest;
use Carbon\Carbon;
use DB;

class TrabajadorController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        if($request){
            $query=trim($request->get('searchText'));
            $trabajadores=DB::table('trabajador as pr')
                ->select('p.CI','p.Nombre','p.Apellido_Paterno','p.Apellido_Materno','pr.ID_Trabajador','pr.TipoO','pr.TipoCh')
                ->join('persona as p','p.CI','=','pr.Per_CI')
                ->where('p.Estado','=','A')
                ->where('p.Nombre','LIKE','%'.$query.'%')
                ->paginate(7);
            return view('Gestionar.GestionarTrabajador.index',["trabajador"=>$trabajadores,"searchText"=>$query]);
        }
    }

    public function create()
    {
        $personas=DB::table('persona as p')
            ->where('p.Tipo_P','=',2002)
            ->where('p.Estado','=','A')
            ->get();
        return view("Gestionar.GestionarTrabajador.create",["personas"=>$personas]);
    }

    public function store(TrabajadorFormRequest $request)
    {
        $trabajadores=new Trabajador();
        $trabajadores->Per_CI=$request->get('Per_CI');
        $trabajadores->ID_Trabajador=$request->get('ID_Trabajador');
        if ($request->get("Tipo_P")=="obrero"){
            $trabajadores->TipoO="V";
            $trabajadores->TipoCh="F";
        }else{
            $trabajadores->TipoO="F";
            $trabajadores->TipoCh="V";
        }
        $trabajadores->save();

        session_start();
        $det=new DetalleBitacora();
        $det->ID_b=$_SESSION['id'];
        $det->Operacion = 'REGISTRA';
        $det->Tabla = 'TRABAJADOR';
        $mytime = Carbon::now('America/La_paz');
        $det->Hora=$mytime->toTimeString();
        $det->save();
        return Redirect::to('Gestionar/GestionarTrabajador');
    }

    public function show($id)
    {
        return view("Gestionar.GestionarTrabajador.show",["trabajadores"=>Trabajador::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view("Gestionar.GestionarTrabajador.edit",["trabajadores"=>Trabajador::findOrFail($id)]);
    }

    public function update(TrabajadorFormRequest $request,$id)
    {
        $trabajadores=trabajador::findOrFail($id);
        $trabajadores->ID_Trabajador=$request->get('ID_Trabajador');
        $trabajadores->update();
        session_start();
        $det=new DetalleBitacora();
        $det->ID_b=$_SESSION['id'];
        $det->Operacion = 'ACTUALIZA';
        $det->Tabla = 'TRABAJADOR';
        $mytime = Carbon::now('America/La_paz');
        $det->Hora=$mytime->toTimeString();
        $det->save();
        return Redirect::to('Gestionar/GestionarTrabajador');
    }

    public function destroy($id)
    {
    }
}
