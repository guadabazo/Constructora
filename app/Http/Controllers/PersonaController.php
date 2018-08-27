<?php

namespace ApoloConstructora\Http\Controllers;

use Illuminate\Http\Request;
use ApoloConstructora\Persona;
use ApoloConstructora\DetalleBitacora;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Input;
use ApoloConstructora\Http\Requests\PersonaFormRequest;
use DB;

use Carbon\Carbon;

class PersonaController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request){

        if($request){
            $query=trim($request->get('searchText'));
            $personas=DB::table('persona as p')
                ->join ('tipo_persona as tp','p.Tipo_P','=','tp.Id')
                ->select ('p.CI','p.Nombre','p.Apellido_Paterno','p.Apellido_Materno','tp.Descripcion','p.Estado')

                ->where('p.Nombre','LIKE','%'.$query.'%')

                ->orderBy('p.CI','desc')
                ->groupBy('p.CI','p.Nombre','p.Apellido_Paterno','p.Apellido_Materno','tp.descripcion','p.Estado')
                ->paginate (10);


            return view('Gestionar.GestionarPersona.index',["personas"=>$personas,"searchText"=>$query]);
        }
    }

    public function create(){
        $tipo_per=DB::table('tipo_persona')
            ->get();
        return view('Gestionar.GestionarPersona.create',["tipo_persona"=>$tipo_per]);
    }

    public function store(PersonaFormRequest $request){

        $persona=new Persona;

        $persona->CI=$request->get('CI');
        $persona->Nombre=$request->get('Nombre');
        $persona->Apellido_Paterno=$request->get('Apellido_Paterno');
        $persona->Apellido_Materno=$request->get('Apellido_Materno');
        $persona->Tipo_P=$request->get('Tipo_P');
        $persona->Estado='A';
        $persona->save();

        session_start();
        $det=new DetalleBitacora();
        $det->ID_b=$_SESSION['id'];
        $det->Operacion = 'INSERTAR';
        $det->Tabla = 'PERSONA';
        $mytime = Carbon::now('America/La_paz');
        $det->Hora=$mytime->toTimeString();
        $det->save();
        return Redirect::to('Gestionar/GestionarPersona');
    }

    public function show($id){
        return view("Gestionar.GestionarPersona.show",["persona"=>Persona::findOrFail($id)]);
    }

    public function edit($id){
        $tipo_per=DB::table('tipo_persona')
            ->get();


        return view("Gestionar.GestionarPersona.edit",["persona"=>Persona::findOrFail($id),"tipo_persona"=>$tipo_per]);
    }

    public function update(PersonaFormRequest $request,$id)
    {
        $persona=Persona::findOrFail($id);
        $persona->CI=$id;
        $persona->Nombre=$request->get('Nombre');
        $persona->Apellido_Paterno=$request->get('Apellido_Paterno');
        $persona->Apellido_Materno=$request->get('Apellido_Materno');
        $persona->Tipo_P=$request->get('Tipo_P');

        $persona->update();
        session_start();
        $det=new DetalleBitacora();
        $det->ID_b=$_SESSION['id'];
        $det->Operacion = 'EDITA';
        $det->Tabla = 'PERSONA';
        $mytime = Carbon::now('America/La_paz');
        $det->Hora=$mytime->toTimeString();
        $det->save();
        return Redirect::to('Gestionar/GestionarPersona');
    }

    public function destroy($id)
    {
        $persona=Persona::findOrFail($id);
        $persona->Estado='B';
        $persona->update();
        session_start();
        $det=new DetalleBitacora();
        $det->ID_b=$_SESSION['id'];
        $det->Operacion = 'ELIMINA';
        $det->Tabla = 'PERSONA';
        $mytime = Carbon::now('America/La_paz');
        $det->Hora=$mytime->toTimeString();
        $det->save();
        return Redirect::to ('Gestionar/GestionarPersona');
    }

}
