<?php

namespace ApoloConstructora\Http\Controllers;
use ApoloConstructora\DetalleBitacora;
use ApoloConstructora\Usuario;
use Illuminate\Http\Request;
use ApoloConstructora\Herramienta;
use Illuminate\Support\Facades\Redirect;
use ApoloConstructora\Http\Requests\UsuarioFormRequest;
use Illuminate\Database\MySqlConnection;
use Carbon\Carbon;
use DB;

class UsuarioController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        if($request)
        {
            $query = trim($request->get('searchText'));
            $usuarios = DB::table('usuario')
                ->join('persona','persona.CI','=','usuario.Per_CI')
                ->join('grupo','grupo.Id','=','usuario.Codigo_G')
                ->select('usuario.Per_CI',DB::raw('CONCAT(persona.Nombre," ",persona.Apellido_Paterno," ",persona.Apellido_Materno) as Nombre'),'usuario.Id as ID','usuario.Contrasena as Contraseña','grupo.Descripcion')
                ->where('persona.Nombre','LIKE','%'.$query.'%')
                ->orderBy('persona.CI','asc')
                ->paginate(10);
            return view('AdmUsuario.AdministrarUsuario.index',["usuario" => $usuarios,"searchText"=>$query]);
        }
    }

    public function create()
    {
        $grupo=DB::table('grupo')->get();
        $CI=DB::table('persona')
            ->where('persona.Tipo_P', '=', 2000)
            ->get();
        return view("AdmUsuario.AdministrarUsuario.create",["grupo" =>$grupo,"CI"=>$CI]);
    }

    public function store(UsuarioFormRequest $request)
    {
        $usuario = new Usuario();
        $usuario->Per_CI = $request->get('Per_CI');
        $usuario->Id = $request->get('Id');
        $usuario->Contrasena = $request->get('Contraseña');
        $usuario->Codigo_G = $request->get('Codigo_G');
        $usuario->save();
        return Redirect::to('AdmUsuario/AdministrarUsuario');
    }

    public function show($id)
    {
        return view("AdmUsuario.AdministrarUsuario.show",["usuario"=>Usuario::findOrFail($id)]);
    }

    public function edit($id)
    {
        $grupos=DB::table('grupo')->get();
        $usuario=Usuario::findOrFail($id);
        return view("AdmUsuario.AdministrarUsuario.edit",["usuario"=>$usuario,"grupo"=>$grupos]);
    }

    public function update(UsuarioFormRequest $request, $id)
    {
        $usuario=Usuario::findOrFail($id);


       $usuario->Id=$request->get('Id');
        $usuario->Contrasena=$request->get('Contrasena');
        $usuario->Codigo_G=$request->get('Codigo_G');
        $usuario->update();

        return Redirect::to('AdmUsuario/AdministrarUsuario');
    }

    public function destroy($id)
    {
        return Redirect::to('AdmUsuario/AdministrarUsuario');
    }
}
