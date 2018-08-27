<?php

namespace ApoloConstructora\Http\Controllers;

use Illuminate\Http\Request;

use ApoloConstructora\Requests;
use ApoloConstructora\Encargado;
use Illuminate\Support\Facades\Redirect;
use ApoloConstructora\Http\Requests\EncargadoFormRequest;
use DB;
use ApoloConstructora\DetalleBitacora;
use Carbon\Carbon;
class EncargadoController extends Controller
{
    public function index(Request $request)
    {
        if($request){
            $query=trim($request->get('searchText'));
            $encargados=DB::table('encargado as pr')
                ->select('p.CI','p.Nombre','p.Apellido_Paterno','p.Apellido_Materno','pr.ID_Encargado')
                ->join('persona as p','p.CI','=','pr.Per_CI')
                ->where('p.Estado','=','A')
                ->where('p.Nombre','LIKE','%'.$query.'%')
                ->paginate(7);
            return view('Gestionar.GestionarEncargado.index',["encargado"=>$encargados,"searchText"=>$query]);
        }
    }

    public function create()
    {
        $persona=DB::table('persona')
            ->where('Tipo_P','=',2003)
            ->where('Estado','=','A')
            ->get();
        return view("Gestionar.GestionarEncargado.create",["personas"=>$persona]);
    }

    public function store(EncargadoFormRequest $request)
    {
        $Encargados=new Encargado();
        $Encargados->Per_CI=$request->get('Per_CI');
        $Encargados->ID_Encargado=$request->get('ID_Encargado');
        $Encargados->save();

        session_start();
        $det=new DetalleBitacora();
        $det->ID_b=$_SESSION['id'];
        $det->Operacion = 'REGISTRA';
        $det->Tabla = 'ENCARGADO';
        $mytime = Carbon::now('America/La_paz');
        $det->Hora=$mytime->toTimeString();
        $det->save();

        return Redirect::to('Gestionar/GestionarEncargado');
    }

    public function show($id)
    {
        return view("Gestionar.GestionarEncargado.show",["encargados"=>Encargado::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view("Gestionar.GestionarEncargado.edit",["encargado"=>Encargado::findOrFail($id)]);
    }

    public function update(EncargadoFormRequest $request,$id)
    {
        $encargado=encargado::findOrFail($id);
        $encargado->ID_Encargado=$request->get('ID_Encargado');
        $encargado->update();
        session_start();
        $det=new DetalleBitacora();
        $det->ID_b=$_SESSION['id'];
        $det->Operacion = 'ACTUALIZA';
        $det->Tabla = 'ENCARGADO';
        $mytime = Carbon::now('America/La_paz');
        $det->Hora=$mytime->toTimeString();
        $det->save();
        return Redirect::to('Gestionar/GestionarEncargado');
    }

    public function destroy($id)
    {
    }


}
