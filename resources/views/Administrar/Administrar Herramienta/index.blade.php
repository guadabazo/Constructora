<!-- Content Wrapper. Contains page content -->
@extends('layouts.admin')
@section('contenido')
    <div class = "row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>Listado de Herramientas Disponibles</h3>
            @include('administrar.administrar herramienta.search')
        </div>
    </div>

    <div class = "row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Numero de Deposito</th>
                    <th>Descripcion</th>

                    </thead>
                    @foreach ($herramientas as $herr)
                        @if($herr->ID_Estado == 1)
                            <tr>
                                <td>{{ $herr->Codigo}}</td>
                                <td>{{ $herr->N}}</td>
                                <td>{{ $herr->Cantidad}}</td>
                                <td>{{ $herr->Nombre}}</td>
                                <td>{{ $herr->Descripcion}}</td>
                            </tr>
                        @endif
                    @endforeach
                </table>
            </div>
            {{$herramientas->render()}}
        </div>
    </div>

    <div class = "row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>Listado de Herramientas No Disponibles</h3>
            @include('administrar.administrar herramienta.search')
        </div>
    </div>

    <div class = "row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Numero de Deposito</th>
                    <th>Descripcion</th>

                    </thead>
                    @foreach($herramientas as $herr)
                        @if($herr->ID_Estado ==2)
                            <tr>
                                <td>{{ $herr->Codigo}}</td>
                                <td>{{ $herr->N}}</td>
                                <td>{{ $herr->Cantidad}}</td>
                                <td>{{ $herr->Nombre}}</td>
                                <td>{{ $herr->Descripcion}}</td>
                            </tr>
                        @endif
                    @endforeach

                </table>
            </div>
            {{$herramientas->render()}}
        </div>
    </div>
@endsection