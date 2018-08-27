<?php

namespace ApoloConstructora\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use ApoloConstructora\Http\Requests\DotacionFormRequest;
use ApoloConstructora\dotacion;
use DB;

class DotacionController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request){
        if($request){
            $query=trim($request->get('searchText'));
            $dotaciones =DB::table('dotacion as d')
                ->join('deposito as de','de.Numero', '=', 'd.Depo_Numero')
                ->select('d.ID','d.Nombre as N','d.Cantidad','de.Nombre')
                -> where('d.Nombre','LIKE','%'.$query.'%')
                ->orderBy('d.ID','asc')
                ->paginate(5);
            return view('Administrar.AdministrarDotacion.index',["dotacion"=>$dotaciones,"searchText"=>$query]);
        }
    }
}
