@extends('layouts.admin')
@section('contenido')
    <div class = "row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>Listado de Dotaciones Escasas</h3>
            @include('Administrar.AdministrarDotacion.search')
        </div>
    </div>

    <div class="panel panel-primary">
        <div class="panel-body">
            <div class = "row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-condensed table-hover">
                            <thead>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Nombre Deposito</th>
                            <th>Opciones</th>
                            </thead>
                            @foreach($dotacion as $dota)
                                @if($dota->Cantidad < 20)
                                    <tr>
                                        <td>{{ $dota->ID }}</td>
                                        <td>{{ $dota->N }}</td>
                                        <td>{{ $dota->Cantidad }}</td>
                                        <td>{{ $dota->Nombre }}</td>
                                        <td>
                                            <a><button class="btn btn-success">Ingresar Dotacion</button></a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </table>
                    </div>
                    {{ $dotacion->render() }}
                </div>
            </div>
        </div>
    </div>

    <div class = "row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>Listado de Dotaciones  </h3>
            @include('Administrar.AdministrarDotacion.search')
        </div>
    </div>

    <div class="panel panel-primary">
        <div class="panel-body">
            <div class = "row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-condensed table-hover">
                            <thead>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Nombre Deposito</th>
                            </thead>
                            @foreach($dotacion as $dota)
                                @if($dota->Cantidad >= 20)
                                    <tr>
                                        <td>{{ $dota->ID }}</td>
                                        <td>{{ $dota->N }}</td>
                                        <td>{{ $dota->Cantidad }}</td>
                                        <td>{{ $dota->Nombre }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </table>
                    </div>
                    {{ $dotacion->render() }}
                </div>
            </div>
        </div>
    </div>
@endsection