<!-- Content Wrapper. Contains page content -->
@extends('layouts.admin')
@section('contenido')
    <div class = "row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>Listado de Entrega de Material<a href="NotaEntregaMaterial/create"><button class="btn btn-success pull-right">Realizar Nota Entrega de Material</button></a></h3>
            @include('RegistrarEgreso.NotaEntregaMaterial.search')
        </div>
    </div>

    <div class = "row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                    <th>Codigo</th>
                    <th>Proyecto</th>
                    <th>Entregado</th>
                    <th>Opciones</th>
                    </thead>
                    @foreach ($NotaEntrega as $ne)
                        @foreach($idrol as $idroles)
                            <tr>
                                <td>{{ $ne->Codigo }}</td>
                                <td>{{ $ne->Nombre}}</td>
                                <td>{{ $idroles->Nombre}}</td>
                                <td>
                                    <a href="{{URL::action('NotaEntregaMaterialController@show',$ne->Codigo)}}"><button class="btn btn-primary">Detalles</button></a>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </table>
            </div>
            {{$NotaEntrega->render()}}
        </div>
    </div>
@endsection