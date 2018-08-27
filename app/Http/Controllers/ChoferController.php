<?php

namespace ApoloConstructora\Http\Controllers;

use Illuminate\Http\Request;

use ApoloConstructora\chofer;
use ApoloConstructora\Requests;
use Illuminate\Support\Facades\Redirect;
use ApoloConstructora\Http\Requests\ChoferFormRequest;
use ApoloConstructora\DetalleBitacora;
use Carbon\Carbon;
use DB;

class ChoferController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        if($request){
            $query=trim($request->get('searchText'));
            $choferes=DB::table('chofer as pr')
                ->select('p.CI','p.Nombre','p.Apellido_Paterno','p.Apellido_Materno',"pr.Licencia")
                ->join('persona as p','p.CI','=','pr.Per_CI')
                ->where('p.Estado','=','A')
                ->where('p.Nombre','LIKE','%'.$query.'%')
                ->paginate(7);
            return view('Gestionar.GestionarChofer.index',["choferes"=>$choferes,"searchText"=>$query]);
        }
    }

    public function create()
    {
        $personas=DB::table('trabajador as t')
            ->where('Tipo_P','=',2002)
            ->join('persona as p','p.CI','=','t.Per_CI')
            ->where('Estado','=','A')
            ->where('t.TipoCh','=','V')
            ->get();

        return view("Gestionar.GestionarChofer.create",["personas"=>$personas]);
    }

    public function store(ChoferFormRequest $request)
    {
        $choferes=new Chofer();
        $choferes->Per_CI=$request->get('Per_CI');
        $choferes->Licencia=$request->get('Licencia');
        $choferes->Placa=$request->get('Placa');



        $choferes->save();

        session_start();
        $det=new DetalleBitacora();
        $det->ID_b=$_SESSION['id'];
        $det->Operacion = 'ACTUALIZA';
        $det->Tabla = 'CHOFER';
        $mytime = Carbon::now('America/La_paz');
        $det->Hora=$mytime->toTimeString();
        $det->save();
        return Redirect::to('Gestionar/GestionarChofer');
    }

    public function show($id)
    {
        return view("Gestionar.GestionarChofer.show",["choferes"=>chofer::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view("Gestionar.GestionarChofer.edit",["choferes"=>chofer::findOrFail($id)]);
    }

    public function update(ChoferFormRequest $request,$id)
    {
        $choferes=chofer::findOrFail($id);
        $choferes->Licencia=$request->get('Licencia');

        $choferes->update();
        session_start();
        $det=new DetalleBitacora();
        $det->ID_b=$_SESSION['id'];
        $det->Operacion = 'INSERTA';
        $det->Tabla = 'CHOFER';
        $mytime = Carbon::now('America/La_paz');
        $det->Hora=$mytime->toTimeString();
        $det->save();
        return Redirect::to('Gestionar/GestionarChofer');
    }

    public function destroy($id)
    {
    }
}
