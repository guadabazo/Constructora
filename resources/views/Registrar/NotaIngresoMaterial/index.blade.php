@extends('layouts.admin')
@section('contenido')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>Listado de Ingreso de Material <a href="IngresoMaterial/create"><button class="btn btn-success pull-right">Realizar Nota de Ingreso</button></a>
                <a  href="report/ingresomaterial" > <button class="btn btn-danger pull-right">Generar Reporte</button></a></h3>
            @include('Registrar.NotaIngresoMaterial.search')
        </div>
    </div>

    <div class="panel panel-primary">
        <div class="panel-body">

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-condensed table-hover">
                        <thead>
                            <th>Codigo</th>
                            <th>Fecha</th>
                            <th>Proveedor</th>
                            <th>Material</th>
                            <th>Cantidad</th>
                        </thead>
                        @foreach($ingresos as $ing)
                            <tr>
                                <td>{{ $ing->Codigo }}</td>
                                <td>{{ $ing->Fecha }}</td>
                                <td>{{ $ing->N }}</td>
                                <td>{{ $ing->Nombre }}</td>
                                <td>{{ $ing->Cantidad }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                {{ $ingresos->render() }}
            </div>
        </div>
        </div>

    </div>

@endsection