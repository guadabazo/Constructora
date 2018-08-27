<?php

namespace ApoloConstructora\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use DB;

use Response;
use Illuminate\Support\Collection;

class BitacoraController extends Controller
{
    public function __construct(){

    }

    public function index(Request $request){

        if($request){
            $query=trim($request->get('searchText'));
            $bitacoras=DB::table('bitacora')
                ->where('ID_B','LIKE','%'.$query.'%')
                ->paginate(7);
            return view('AdmUsuario.AdministrarBitacora.index',["bitacoras"=>$bitacoras,"searchText"=>$query]);
        }

    }

    public function show($id){



        $bitacora=DB::table('bitacora')
            ->where('ID_B','=',$id)
            ->first();
        $detalle_bitacoras=DB::table('detalle_bitacora as d')
            ->select('d.ID_DB','d.ID_b','d.Operacion','d.Tabla','d.Hora')
            ->where('d.ID_B','=',$id)
            ->get();

        return view("AdmUsuario.AdministrarBitacora.show",["bitacora"=>$bitacora,"detalle_bitacoras"=>$detalle_bitacoras]);
    }
}
