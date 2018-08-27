<!-- Content Wrapper. Contains page content -->
@extends('layouts.admin')
@section('contenido')
    <div class = "row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3><b>LISTADO DE ENTREGA DE COMBUSTIBLE</b><a href="NotaSalidaCombustible/create"><button class="btn btn-success pull-right">Realizar Nota Entrega de Combustible</button></a></h3>
            @include('RegistrarEgreso.NotaSalidaCombustible.search')
        </div>
    </div>

    <div class = "row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                    <th>CODIGO</th>
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>ENTREGADO</th>
                    <th>OPCIONES</th>
                    </thead>
                    @foreach ($NotaEntregaCom as $ne)
                        @foreach($idrol as $idroles)
                            <tr>
                                <td>{{ $ne->Codigo }}</td>
                                <td>{{ $ne->Nombre}}</td>
                                <td>{{ $ne->Apellido_Paterno}}</td>
                                <td>{{ $idroles->Nombre}}</td>
                                <td>
                                    <a href="{{URL::action('NotaSalidaCombustibleController@show',$ne->Codigo)}}"><button class="btn btn-primary">Detalles</button></a>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </table>
            </div>
            {{$NotaEntregaCom->render()}}
        </div>
    </div>
@endsection