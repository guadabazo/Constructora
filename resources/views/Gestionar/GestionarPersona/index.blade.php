<!-- Content Wrapper. Contains page content -->
@extends('layouts.admin')
@section('contenido')

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>Personas Activas<a href="GestionarPersona/create"><button class="btn btn-success pull-right">Nuevo</button></a></h3>
            @include('Gestionar.GestionarPersona.search')
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
                    <th>CI</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Tipo</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                    </thead>
                    @foreach ($personas as $p)
                        @if($p->Estado == 'A')
                        <tr>
                            <td>{{ $p->CI}}</td>
                            <td>{{ $p->Nombre}}</td>
                            <td>{{ $p->Apellido_Paterno}}</td>
                            <td>{{ $p->Apellido_Materno}}</td>
                            <td>{{ $p->Descripcion}}</td>
                            <td>{{ $p->Estado}}</td>
                            <td>
                                <a href="{{URL::action('PersonaController@edit',$p->CI)}}"><button class="btn btn-info">Editar</button></a>
                                <a href="" data-target="#modal-delete-{{$p->CI}} "data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                            </td>
                        </tr>
                        @include('Gestionar.GestionarPersona.modal')
                        @endif
                    @endforeach
                </table>
            </div>
            {{$personas->render()}}
        </div>
    </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>Personas en Baja</h3>
            @include('Gestionar.GestionarPersona.search')
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
                            <th>CI</th>
                            <th>Nombre</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Tipo</th>
                            <th>Estado</th>
                            </thead>
                            @foreach ($personas as $p)
                                @if($p->Estado == 'B')
                                    <tr>
                                        <td>{{ $p->CI}}</td>
                                        <td>{{ $p->Nombre}}</td>
                                        <td>{{ $p->Apellido_Paterno}}</td>
                                        <td>{{ $p->Apellido_Materno}}</td>
                                        <td>{{ $p->Descripcion}}</td>
                                        <td>{{ $p->Estado}}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </table>
                    </div>
                    {{$personas->render()}}
                </div>
            </div>
        </div>
    </div>
@endsection