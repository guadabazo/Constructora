<?php

namespace ApoloConstructora\Http\Controllers;

use Illuminate\Http\Request;

use ApoloConstructora\inventario;
use Illuminate\Support\Facades\Redirect;
use ApoloConstructora\Http\Requests\InventarioFormRequest;
use DB;

class InventarioController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {

        if ($request)
        {
            $query=trim($request->get('searchText'));

            $inventarioMate=DB::table('inventario_material as im')
                ->join('inventario as i','im.Codigo_I','=','i.Codigo')
                ->join('material as m','im.Cod_Mat','=','m.Codigo')
                ->select('m.Nombre','m.Cantidad')
                ->where ('m.Codigo','LIKE','%'.$query.'%')
                ->orderBy('m.Codigo','desc')

                ->paginate(5);

            $inventario_Dota=DB::table('inventario_dotacion as idot')
                ->join('inventario as i','idot.Codigo_I','=','i.Codigo')
                ->join('dotacion as d','idot.Id_Dot','=','d.ID')
                ->select('d.Nombre','d.Cantidad as C')
                ->where ('d.ID','LIKE','%'.$query.'%')
                ->orderBy('d.ID','desc')

                ->paginate(5);
            $inventario_H=DB::table('inventario_herramienta as ih')
                ->join('inventario as i','ih.Codigo_I','=','i.Codigo')
                ->join('herramienta as h','ih.Codigo_herr','=','h.Codigo')
                ->join('estado_tiene_herr as eh','eh.Codigo_Herramienta','=','h.Codigo')
                ->join('estado as es','es.ID_Estado','=','eh.ID_Estado')
                ->select('h.Nombre as NH','eh.Cantidad','es.Descripcion','eh.ID_Estado')
                ->where ('h.Nombre','LIKE','%'.$query.'%')
                ->orderBy('h.Codigo','asc')

                ->paginate(5);


            $produccion=DB::table('inventario_produccion as ipr')
                ->join('inventario as i','ipr.Codigo_I','=','i.Codigo')
                ->join('produccion as pr','pr.Nro','=','ipr.Nro_Prod')
                ->select('pr.Tipo','pr.Cantidad')
                ->where ('pr.Nro','LIKE','%'.$query.'%')
                ->orderBy('pr.Nro','asc')
                ->paginate(5);

            $inventario_P=DB::table('inventario_proyecto as ip')
                ->join('inventario as i','ip.Codigo_I','=','i.Codigo')
                ->join('proyecto as p','ip.Nro_Proy','=','p.Nro')
                ->join('detalle_estado as de','de.Nro_Proyecto','=','p.Nro')
                ->join('estado_proyecto as e','e.ID','=','de.ID_Estado_Proyecto')
                ->select('p.Nombre as NP','e.Descripcion','e.ID')
                ->orderBy('p.Nro','asc')
                ->paginate(5);

        }

        return view ('Administrar.AdministrarInventario.index',["material"=>$inventarioMate,"dotacion"=>$inventario_Dota,"herramienta"=>$inventario_H,
            "produccion"=>$produccion,"proyecto"=>$inventario_P,"searchText"=>$query]);

    }


    public function create()
    {

    }
    public function show($id)
    {
        /*	$inventarioMate=DB::table('Inventario as i')
            ->join('material as m','i.Codigo_Material','=','m.Codigo')
            ->select('m.nombre','m.cantidad')
            ->where ('i.codigo','LIKE','%'.$query.'%');*/
    }
}
