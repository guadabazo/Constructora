<?php

namespace ApoloConstructora\Http\Controllers;

use Illuminate\Http\Request;
use ApoloConstructora\DetalleBitacora;
use ApoloConstructora\Requests;
use ApoloConstructora\Rol;
use Illuminate\Support\Facades\Redirect;
use ApoloConstructora\Http\Requests\RolFormRequest;
use Carbon\Carbon;
use DB;

class RolController extends Controller
{
    public function __construct()
    {
    }

    public function index(Request $request)
    {
        if($request){
            $query=trim($request->get('searchText'));
            $Roles=DB::table('Rol as r')
                ->join('usuario as u','r.Per_CI','=','u.Per_CI')
                ->join('persona as p','p.CI','=','u.Per_CI')
                ->select('r.ID','r.Descripcion','r.Per_CI',DB::raw('CONCAT(p.Nombre, " ",p.Apellido_Paterno," ",p.Apellido_Materno) as N'))
                ->where('r.ID','LIKE','%'.$query.'%')
                ->paginate(7);
            return view('Gestionar.GestionarRol.index',["Roles"=>$Roles,"searchText"=>$query]);
        }
    }

    public function create()
    {
        $usuarios=DB::table('usuario')->get();
        return view("Gestionar.GestionarRol.create",["usuarios"=>$usuarios]);
    }

    public function store(RolFormRequest $request)
    {
        $Roles=new Rol;
        $Roles->Descripcion=$request->get('Descripcion');
        $Roles->Per_CI=$request->get('Per_CI');
        $Roles->save();
        session_start();
        $det=new DetalleBitacora();
        $det->ID_b=$_SESSION['id'];
        $det->Operacion = 'REGISTRA';
        $det->Tabla = 'ROL';
        $mytime = Carbon::now('America/La_paz');
        $det->Hora=$mytime->toTimeString();
        $det->save();
        return Redirect::to('Gestionar/GestionarRol');
    }

    public function show($id)
    {
        return view("Gestionar.GestionarRol.show",["Roles"=>Rol::findOrFail($id)]);
    }

    public function edit($id)
    {
        $Roles=Rol::findOrFail($id);
        $usuarios=DB::table('usuario')->get();

        return view("Gestionar.GestionarRol.edit",["Roles"=>$Roles,"usuarios"=>$usuarios]);
    }

    public function update(RolFormRequest $request,$id)
    {
        $Roles=Rol::findOrFail($id);
        $Roles->Descripcion=$request->get('Descripcion');
        $Roles->Per_CI=$request->get('Per_CI');
        $Roles->update();

        session_start();
        $det=new DetalleBitacora();
        $det->ID_b=$_SESSION['id'];
        $det->Operacion = 'ACTUALIZA';
        $det->Tabla = 'ROL';
        $mytime = Carbon::now('America/La_paz');
        $det->Hora=$mytime->toTimeString();
        $det->save();
        return Redirect::to('Gestionar/GestionarRol');
    }

    public function destroy($id)
    {
    }

}
