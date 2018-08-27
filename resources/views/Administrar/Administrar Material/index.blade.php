@extends('layouts.admin')
@section('contenido')
    <div class = "row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>Listado de Materiales Escasos</h3>
            @include('administrar.administrar material.search')
        </div>
    </div>

    <div class="panel panel-primary">
        <div class="panel-body">
    <div class = "row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Unidad de Medida</th>
                    <th>Nomenclatura</th>
                    <th>Deposito Numero</th>
                    <th>Tipo</th>
                    </thead>
                    @foreach($materiales as $mat)
                        @if($mat->Cantidad < 100000)
                        <tr>
                            <td>{{ $mat->Codigo }}</td>
                            <td>{{ $mat->N }}</td>
                            <td>{{ $mat->Cantidad }}</td>
                            <td>{{ $mat->Descripcion }}</td>
                            <td>{{ $mat->Abreviatura }}</td>
                            <td>{{ $mat->Nombre }}</td>
                            <td>{{ $mat->Tipo }}</td>
                        </tr>
                        @endif
                    @endforeach
                </table>
            </div>
            {{ $materiales->render() }}
        </div>
    </div>
    </div>
    </div>

    <div class = "row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>Listado de Materiales  </h3>
            @include('administrar.administrar material.search')
        </div>
    </div>

    <div class="panel panel-primary">
        <div class="panel-body">
    <div class = "row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Unidad de Medida</th>
                    <th>Nomenclatura</th>
                    <th>Deposito Numero</th>
                    <th>Tipo</th>
                    </thead>
                    @foreach($materiales as $mat)
                        @if($mat->Cantidad >= 100000)
                        <tr>
                            <td>{{ $mat->Codigo }}</td>
                            <td>{{ $mat->N }}</td>
                            <td>{{ $mat->Cantidad }}</td>
                            <td>{{ $mat->Descripcion }}</td>
                            <td>{{ $mat->Abreviatura }}</td>
                            <td>{{ $mat->Nombre }}</td>
                            <td>{{ $mat->Tipo }}</td>
                        </tr>
                        @endif
                    @endforeach
                </table>
            </div>
            {{ $materiales->render() }}
        </div>
    </div>
        </div>
    </div>
@endsection
