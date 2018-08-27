<!-- Content Wrapper. Contains page content -->
@extends('layouts.admin')
@section('contenido')
    <div class = "row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>Listado de Entrega de Dotacion<a href="EntregaDotacion/create"><button class="btn btn-success pull-right">Realizar Nota de Entrega de Dotacion</button></a></h3>
            @include('RegistrarEgreso.EntregaDotacion.search')
        </div>
    </div>

    <div class = "row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Entregado</th>
                    <th>Opciones</th>
                    </thead>
                    @foreach ($entregaDotacion as $e_d)
                        @foreach($idrol as $idroles)
                            <tr>
                                <td>{{ $e_d->Codigo }}</td>
                                <td>{{ $e_d->Nombre}}</td>
                                <td>{{ $e_d->Apellido_Paterno}}</td>
                                <td>{{ $idroles->Nombre}}</td>
                                <td>
                                    <a href="{{URL::action('EntregaDotacionController@show',$e_d->Codigo)}}"><button class="btn btn-primary">Detalles</button></a>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </table>
            </div>
            {{$entregaDotacion->render()}}
        </div>
    </div>
@endsection