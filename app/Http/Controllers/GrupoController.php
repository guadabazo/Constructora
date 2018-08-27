<?php

namespace ApoloConstructora\Http\Controllers;

use Illuminate\Http\Request;

use ApoloConstructora\Grupo;
use ApoloConstructora\Herramienta;
use Illuminate\Support\Facades\Redirect;
use ApoloConstructora\Http\Requests\GrupoFormRequest;
use Illuminate\Database\MySqlConnection;
use Carbon\Carbon;
use ApoloConstructora\DetalleBitacora;
use DB;

class GrupoController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        if($request)
        {
            $query=trim($request->get('searchText'));
            $grupos=DB::table('grupo as p')
                ->select ('p.Id','p.Descripcion')
                ->where('p.Id','LIKE','%'.$query.'%')
                ->orderBy('p.Id','desc')
                ->paginate (10);

            return view('AdmUsuario.AdministrarGrupo.index',["grupo" => $grupos,"searchText"=>$query]);
        }
    }

    public function create()
    {
        $grupo=DB::table('grupo')->get();
        $Id=DB::table('grupo')
            ->get();
        return view("AdmUsuario.AdministrarGrupo.create",["grupo" =>$grupo,"ID"=>$Id]);
    }

    public function store(GrupoFormRequest $request)
    {
        $Grupo = new Grupo();
        $Grupo-> Id = $request->get('Id');
        $Grupo-> Descripcion = $request->get('Descripcion');
        $Grupo->save();
        session_start();
        $det=new DetalleBitacora();
        $det->ID_b=$_SESSION['id'];
        $det->Operacion = 'CREA';
        $det->Tabla = 'GRUPO';
        $mytime = Carbon::now('America/La_paz');
        $det->Hora=$mytime->toTimeString();
        $det->save();
        return Redirect::to('AdmUsuario/AdministrarGrupo');
    }

    public function show($id)
    {
        return view("AdmUsuario.AdministrarGrupo.show",["grupo"=>grupo::findOrFail($id)]);
    }

    public function edit($id)

    {
        $Grupo=grupo::findOrFail($id);
        return view("AdmUsuario.AdministrarGrupo.edit",["Grupo"=>$Grupo]);
        session_start();
        $det=new DetalleBitacora();
        $det->ID_b=$_SESSION['id'];
        $det->Operacion = 'EDITA';
        $det->Tabla = 'GRUPO';
        $mytime = Carbon::now('America/La_paz');
        $det->Hora=$mytime->toTimeString();
        $det->save();
    }

    public function update(GrupoFormRequest $request, $id)
    {
        $Grupo=grupo::findOrFail($id);
        $Grupo->Id=$request->get('Id');
        $Grupo->Descripcion=$request->get('Descripcion');
        $Grupo->update();
        session_start();
        $det=new DetalleBitacora();
        $det->ID_b=$_SESSION['id'];
        $det->Operacion = 'ACTUALIZA';
        $det->Tabla = 'GRUPO';
        $mytime = Carbon::now('America/La_paz');
        $det->Hora=$mytime->toTimeString();
        $det->save();
        return Redirect::to('AdmUsuario/AdministrarGrupo');
    }

    public function destroy($id)
    {
        return Redirect::to('AdmUsuario/AdministrarGrupo');
    }

}
