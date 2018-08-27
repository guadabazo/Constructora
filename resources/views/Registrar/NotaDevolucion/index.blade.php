@extends('layouts.admin')
@section('contenido')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>Listado de Notas de Devolucion <a href="NotaDevolucion/create"><button class="btn btn-success pull-right">Realizar Devolucion</button></a></h3>
            @include('Registrar.NotaDevolucion.search')
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
                            @foreach($devolucion as $dev)
                                @foreach($idrol as $idroles)
                                    <tr>
                                        <td>{{ $dev->Codigo }}</td>
                                        <td>{{ $dev->Fecha }}</td>
                                        <td>{{ $idroles->Nombre}}</td>
                                        <td>
                                            <a href="{{URL::action('NotaDevolucionController@show',$dev->Codigo)}}"><button class="btn btn-primary">Detalles</button></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </table>
                    </div>
                    {{ $devolucion->render() }}
                </div>
            </div>
        </div>

    </div>

@endsection