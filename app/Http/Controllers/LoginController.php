<?php

namespace ApoloConstructora\Http\Controllers;

use ApoloConstructora\Bitacora;
use ApoloConstructora\DetalleBitacora;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use ApoloConstructora\Http\Requests\LoginFormRequest;
use DB;

use Carbon\Carbon;

class LoginController extends Controller
{


    public function index(){
        return view('login.user.index');
    }

    public function store(LoginFormRequest $request){

        $conexion=  mysqli_connect("localhost", "root", "", "apoloconstructoramesa");
        $correo = trim($_POST['usuario']);
        $clave = trim($_POST['Contraseña']);

        $consulta = "SELECT * FROM usuario
	                 WHERE Id = '$correo' and 
	                 Contrasena = '$clave'";

        $usuario =DB::table('usuario')
            ->where('usuario.Id','=',$correo)
            ->where('usuario.Contrasena','=',$clave)
            ->select('usuario.Id')
        ->get();
        $usuario123 =DB::table('usuario')
            ->where('usuario.Id','=',$correo)
            ->where('usuario.Contrasena','=',$clave)
            ->select('usuario.Id')
            ->get();

        error_reporting(E_ALL and E_NOTICE);
        session_start();

        $_SESSION['username'] = $correo;

        $r = mysqli_query( $conexion,$consulta); //consulta si los valores son correctos
        $result = mysqli_num_rows($r); // si devuelve alguna fila significa que es correcto

        $bita=new Bitacora();
        $mytime = Carbon::now('America/La_paz');
        $bita->Inicio=$mytime->toDateTimeString();
        $bita->Usuario=$_SESSION['username'];
        $bita->save();

        $_SESSION['id'] = $bita->ID_B;

        $g = "select u.Codigo_G
              FROM grupo as g,usuario as u
              where u.Codigo_G = g.Id and u.Id=$correo";

        if ($result > 0){

            $g2 =DB::table('usuario')
                ->join('grupo','grupo.Id','=','usuario.Codigo_G')
                ->where('usuario.Id','=',$correo)
                ->select('usuario.Codigo_G','grupo.Id')->get();

            session_start();
            ob_start();
            $_SESSION['valor'] =$g2;

            return Redirect::to('admin');
        }
    }

    public function finalizar(){

        error_reporting(E_ALL and E_NOTICE);
        session_start();
        $det=Bitacora::findOrFail($_SESSION['id']);
        $det->ID_B=$_SESSION['id'];
        $mytime = Carbon::now('America/La_paz');
        $det->Finalizacion=$mytime->toDateTimeString();
        $det->update();

        Redirect::to('/');
    }
}

