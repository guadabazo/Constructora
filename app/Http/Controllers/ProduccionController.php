<?php

namespace ApoloConstructora\Http\Controllers;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use ApoloConstructora\Http\Requests\ProduccionFormRequest;
use ApoloConstructora\Produccion;
use DB;


class ProduccionController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request){

        if($request){
            $query=trim($request->get('searchText'));
            $producciones = DB::table('produccion as p')

                ->select('p.Nro','p.Tipo','p.Cantidad')
                -> where('p.Tipo','LIKE','%'.$query.'%')
                ->orderBy('p.Nro','asc')
                ->paginate(5);
            return view('Administrar.AdministrarProduccion.index',["produccion"=>$producciones,"searchText"=>$query]);
        }
    }
}
