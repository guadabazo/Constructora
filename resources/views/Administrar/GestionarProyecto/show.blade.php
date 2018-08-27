@extends('layouts.admin')
@section('contenido')


    <h3 align="center"><b>Lista de Encargados de Proyecto</b></h3>
    <div class="panel panel-primary">
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-condensed table-hover">
                            <thead>
                            <th>Encargado</th>
                            <th>Proyecto</th>
                            </thead>
                            @foreach($encargados as $e)
                                <tr>
                                    <td>{{ $e->Nombre }} {{ $e->Apellido_Paterno }} {{ $e->Apellido_Materno }}</td>
                                    <td>{{ $e->Nombre }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    {{ $encargados->render() }}
                </div>
            </div>
        </div>
    </div>

    <h3 align="center"><b>Lista de Estados del Proyecto</b></h3>
    <div class="panel panel-primary">
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-condensed table-hover">
                            <thead>
                            <th>Proyecto</th>
                            <th>Descripcion</th>
                            <th>Fecha</th>
                            </thead>
                            @foreach($estados as $es)
                                <tr>
                                    <td>{{ $es->Nombre}}</td>
                                    <td>{{ $es->Descripcion }}</td>

                                    <td>{{ $es->Fecha_Hora }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    {{ $estados->render() }}
                </div>
            </div>
        </div>
    </div>



@endsection