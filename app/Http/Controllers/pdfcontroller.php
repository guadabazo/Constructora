<?php

namespace ApoloConstructora\Http\Controllers;

use Illuminate\Http\Request;

use ApoloConstructora\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use ApoloConstructora\Http\Requests\NotaIngresoMaterialFormRequest;
use ApoloConstructora\NotaIngresoMaterial;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Component\CssSelector\Node\ElementNode;






class pdfcontroller extends Controller
{

    public function invoice()
    {
        ini_set('max_execution_time', 150);
        $data=DB::table('nota_ingreso as ni')
            ->select('ni.Codigo','ni.Fecha',DB::raw('CONCAT(p.Nombre, " ",p.Apellido_Paterno," ",p.Apellido_Materno) as N'),'m.Nombre','ni.Cantidad')
            ->join('persona as p','p.CI','=','ni.Proveedor_CI')
            ->join('material as m','m.Codigo','=','ni.Material_Codigo')
            ->orderBy('ni.Codigo','desc')
            ->paginate(15);
        $date = date('Y-m-d');
        $invoice = "2222";
        $view =  \View::make('resportes.invoice', compact('data', 'date', 'invoice'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice');
    }

    public function dotacion()
    {
        ini_set('max_execution_time', 150);
        $data=DB::table('nota_ingreso_dotacion as ni')
            ->select('ni.Codigo','ni.Fecha_Hora')
            ->orderBy('ni.Codigo','desc')
            ->paginate(10);
        $date = date('Y-m-d');
        error_reporting(E_ALL and E_NOTICE);
        session_start();
        $invoice = DB::table('rol')
            ->select(DB::raw('CONCAT(persona.Nombre," ",persona.Apellido_Paterno," ",persona.Apellido_Materno) as Nombre'))
            ->join('usuario','rol.Per_CI','=','usuario.Per_CI')
            ->join('persona','persona.CI','=','usuario.Per_CI')
            ->where('usuario.ID','=',$_SESSION['username'])
            ->get();


        $view =  \View::make('resportes.ingresodotacion', compact('data', 'date', 'invoice'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice');
    }
    public function herramienta()
    {
        ini_set('max_execution_time', 150);
        $data=DB::table('nota_ingreso_herramienta as ni')
            ->select('ni.Codigo','ni.Fecha_Hora')
            ->paginate(30);

        error_reporting(E_ALL and E_NOTICE);
        session_start();
        $date = date('Y-m-d');
        $invoice =  DB::table('rol')
            ->select(DB::raw('CONCAT(persona.Nombre," ",persona.Apellido_Paterno," ",persona.Apellido_Materno) as Nombre'))
            ->join('usuario','rol.Per_CI','=','usuario.Per_CI')
            ->join('persona','persona.CI','=','usuario.Per_CI')
            ->where('usuario.ID','=',$_SESSION['username'])
            ->get();
        $view =  \View::make('resportes.ingresoherramienta', compact('data', 'date', 'invoice'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        return $pdf->stream('invoice');



    }
}
