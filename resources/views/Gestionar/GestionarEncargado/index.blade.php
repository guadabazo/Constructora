@extends('layouts.admin')
@section('contenido')

    <div class = "row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>Lista de Encargados de proyectos<a href="GestionarEncargado/create"><button class="btn btn-success pull-right">Nuevo Encargado</button></a></h3>
            @include('Gestionar.GestionarEncargado.search')
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
                            <th>ID ENCARGADO</th>
                            <th>CI</th>
                            <th>Nombre y Apellido</th>
                            <th>Opciones</th>
                            </thead>
                            @foreach ($encargado as $p)
                                <tr>
                                    <td>{{ $p->ID_Encargado}}</td>
                                    <td>{{ $p->CI}}</td>
                                    <td>{{ $p->Nombre}} {{ $p->Apellido_Paterno}} {{ $p->Apellido_Materno}}</td>
                                    <td>
                                        <a href="{{URL::action('EncargadoController@edit',$p->CI)}}"><button class="btn btn-danger">Editar</button></a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    {{$encargado->render()}}
                </div>
            </div>
        </div>
    </div>
@endsection