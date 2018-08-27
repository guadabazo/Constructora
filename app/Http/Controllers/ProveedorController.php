<?php

namespace ApoloConstructora\Http\Controllers;
use ApoloConstructora\DetalleBitacora;
use Illuminate\Http\Request;
use ApoloConstructora\Requests;
use ApoloConstructora\Proveedor;
use Illuminate\Support\Facades\Redirect;
use ApoloConstructora\Http\Requests\ProveedorFormRequest;
use Carbon\Carbon;
use DB;

class ProveedorController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        if($request){
            $query=trim($request->get('searchText'));
            $proveedores=DB::table('proveedor as pr')
                ->select('p.CI','p.Nombre','p.Apellido_Paterno','p.Apellido_Materno','pr.Placa')
                ->join('persona as p','p.CI','=','pr.Per_CI')
                ->where('p.Estado','=','A')
                ->where('p.Nombre','LIKE','%'.$query.'%')
                ->paginate(7);
            return view('Gestionar.GestionarProveedor.index',["proveedores"=>$proveedores,"searchText"=>$query]);
        }
    }

    public function create()
    {
        $personas=DB::table('persona')
            ->where('Tipo_P','=',20001)
            ->where('Estado','=','A')
            ->get();
        return view("Gestionar.GestionarProveedor.create",["personas"=>$personas]);
    }

    public function store(ProveedorFormRequest $request)
    {
        $proveedores=new Proveedor;
        $proveedores->Per_CI=$request->get('Per_CI');
        $proveedores->Placa=$request->get('Placa');
        $proveedores->save();
        session_start();
        $det=new DetalleBitacora();
        $det->ID_b=$_SESSION['id'];
        $det->Operacion = 'REGISTRA';
        $det->Tabla = 'PROVEEDOR';
        $mytime = Carbon::now('America/La_paz');
        $det->Hora=$mytime->toTimeString();
        $det->save();
        return Redirect::to('Gestionar/GestionarProveedor');
    }

    public function show($id)
    {
        return view("Gestionar.GestionarProveedor.show",["proveedores"=>Proveedor::findOrFail($id)]);
    }

    public function edit($id)
    {   session_start();
        $det=new DetalleBitacora();
        $det->ID_b=$_SESSION['id'];
        $det->Operacion = 'EDITA';
        $det->Tabla = 'PROVEEDOR';
        $mytime = Carbon::now('America/La_paz');
        $det->Hora=$mytime->toTimeString();
        $det->save();
        return view("Gestionar.GestionarProveedor.edit",["proveedores"=>Proveedor::findOrFail($id)]);

    }

    public function update(ProveedorFormRequest $request,$id)
    {
        $proveedores=Proveedor::findOrFail($id);
        $proveedores->Placa=$request->get('Placa');
        $proveedores->update();
        session_start();
        $det=new DetalleBitacora();
        $det->ID_b=$_SESSION['id'];
        $det->Operacion = 'ACTUALIZA';
        $det->Tabla = 'PROVEEDOR';
        $mytime = Carbon::now('America/La_paz');
        $det->Hora=$mytime->toTimeString();
        $det->save();
        return Redirect::to('Gestionar/GestionarProveedor');
    }

    public function destroy($id)
    {
    }

}
