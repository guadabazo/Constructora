@extends('layouts.admin')
@section('contenido')
    <div class = "row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>Roles De la Empresa<a href="GestionarRol/create"><button class="btn btn-success pull-right">Nuevo Rol</button></a></h3>
            @include('Gestionar.GestionarRol.search')
        </div>
    </div>
    <h3></h3>

    <div class="panel panel-primary">
        <div class="panel-body">
            <div class = "row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-condensed table-hover">
                            <thead>
                                <th>Id</th>
                                <th>Descripcion</th>
                                <th>CI</th>
                                <th>Nombre y Apellido</th>
                                <th>Opciones</th>
                                </thead>
                            @foreach ($Roles as $r)
                            <tr>
                                <th>{{ $r->ID}}</th>
                                <td>{{ $r->Descripcion}}</td>
                                <td>{{ $r->Per_CI }}</td>
                                <td>{{ $r->N }}</td>
                                <td>
                                    <a href="{{URL::action('RolController@edit',$r->ID)}}"><button class="btn btn-danger">Editar</button></a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    {{$Roles->render()}}
                </div>
            </div>
        </div>
    </div>
@endsection