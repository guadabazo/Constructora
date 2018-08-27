@extends('layouts.admin')
@section('contenido')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>Listado de Ingreso de Herramientas <a href="IngresoHerramienta/create"><button class="btn btn-success pull-right">Realizar Nota de Ingreso</button></a><a  href="report/ingresoherramienta" > <button class="btn btn-danger pull-right">Generar Reporte</button></a></h3>
            @include('Registrar.NotaIngresoHerramienta.search')
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
                            <th>Nombre Usuario</th>
                            <th>Opciones</th>
                            </thead>
                            @foreach($ingresos as $ing)
                                @foreach($idrol as $idroles)
                                <tr>
                                    <td>{{ $ing->Codigo }}</td>
                                    <td>{{ $ing->Fecha_Hora }}</td>
                                    <td>{{ $idroles->Nombre}}</td>
                                    <td>
                                        <a href="{{URL::action('NotaIngresoHerramientaController@show',$ing->Codigo)}}"><button class="btn btn-primary">Detalles</button></a>
                                    </td>
                                </tr>
                                @endforeach
                            @endforeach
                        </table>
                    </div>
                    {{ $ingresos->render() }}
                </div>
            </div>
        </div>

    </div>

@endsection