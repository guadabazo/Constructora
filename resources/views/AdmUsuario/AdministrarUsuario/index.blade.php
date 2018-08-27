@extends ('layouts.admin')
@section ('contenido')

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>Listado de Usuarios<a href="AdministrarUsuario/create"><button class="btn btn-success pull-right">Nuevo Usuario</button></a></h3>
            @include('AdmUsuario.AdministrarUsuario.search')
        </div>
    </div>
    <h3></h3>
    <div class="panel panel-primary">
        <div class="panel-body">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                    <th>Ci</th>
                    <th>Nombre</th>
                    <th>ID</th>
                    <th>Contraseña</th>
                    <th>Descripcion</th>
                    <th>Opciones</th>
                    </thead>
                    @foreach($usuario as $usu)
                        <tr>
                            <td>{{$usu->Per_CI}}</td>
                            <td>{{$usu->Nombre}}</td>
                            <td>{{$usu->ID}}</td>
                            <td>{{$usu->Contraseña}}</td>
                            <td>{{$usu->Descripcion}}</td>
                            <td>
                                <a href="{{URL::action('UsuarioController@edit',$usu->Per_CI)}}"><button class="btn btn-info">Editar</button></a>
                            </td>
                        </tr>

                    @endforeach
                </table>
            </div>
            {{$usuario->render()}}
        </div>
    </div>
        </div>
    </div>

@endsection