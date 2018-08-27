<?php

namespace ApoloConstructora\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use ApoloConstructora\Http\Requests\MaterialFormRequest;
use ApoloConstructora\Material;
use DB;


class MaterialController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        if($request)
        {
            $query = trim($request->get('searchText'));
            $materiales = DB::table('material as m')
                ->join('unidad_medida as um','um.ID','=','m.ID_Unidad_Medida')
                ->join('deposito as de','de.Numero', '=', 'm.Depo_Numero')
                ->select('m.Codigo','m.Nombre as N','m.Cantidad','um.Descripcion','um.Abreviatura','de.Nombre','m.Tipo')
                ->where('m.Nombre','LIKE','%'.$query.'%')
                ->orderBy('m.Codigo','asc')
                ->paginate(7);

            return view('Administrar.Administrar Material.index',["materiales" => $materiales,"searchText"=>$query]);
        }
    }
}
