<?php

namespace ApoloConstructora\Http\Controllers;

use Illuminate\Http\Request;
use ApoloConstructora\Herramienta;
use Illuminate\Support\Facades\Redirect;
use ApoloConstructora\Http\Requests\HerramientaFormRequest;
use DB;

class HerramientaController extends Controller
{
    public function __construct()
    {
        
    }

    public function index(Request $request)
    {
        if($request)
        {
            $query = trim($request->get('searchText'));
            $herramientas = DB::table('herramienta as h')
                ->join('deposito as de','de.Numero','=','h.Depo_Numero')
                ->join('estado_tiene_herr as eh','eh.Codigo_Herramienta','=','h.Codigo')
                ->join('estado as es','es.ID_Estado','=','eh.ID_Estado')
                ->select('h.Codigo','h.Nombre as N','eh.Cantidad','de.Nombre','es.Descripcion','eh.ID_Estado')
                -> where('h.Nombre','LIKE','%'.$query.'%')
                ->orderBy('Codigo','asc')
                ->paginate(10);
            return view('Administrar.Administrar Herramienta.index',["herramientas" => $herramientas,"searchText"=>$query]);
        }
    }

    public function create()
    {
        return view("Administrar.Administrar Herramienta.create");
    }

    public function store(HerramientaFormRequest $request)
    {
        $herramienta = new Herramienta();
        $herramienta->Nombre = $request->get('Nombre');
        $herramienta->Cantidad = $request->get('Cantidad');
        $herramienta->Depo_Numero = $request->get('Depo_Numero');
        $herramienta->save();
        return Redirect::to('administrar/administrar_herramienta');

    }

    public function show($id)
    {
        return view("Administrar.Administrar Herramienta.show",["herramienta"=>Herramienta::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view("Administrar.Administrar Herramienta.edit",["herramienta"=>Herramienta::findOrFail($id)]);
    }

    public function update(HerramientaFormRequest $request, $id)
    {
        $herramienta = Herramienta::findOrFail($id);
        $herramienta->Nombre=$request->get('Nombre');
        $herramienta->Cantidad=$request->get('Cantidad');
        $herramienta->Depo_Numero=$request->get('Depo_Numero');
        $herramienta->update();
        return Redirect::to('administrar/administrar_herramienta');
    }

    public function destroy($id)
    {
        return Redirect::to('administrar/administrar_herramienta');
    }
}
