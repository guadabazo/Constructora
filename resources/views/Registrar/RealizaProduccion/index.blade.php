@extends('layouts.admin')
@section('contenido')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>Listado de Producciones <a href="RealizaProduccion/create"><button class="btn btn-success pull-right">Realizar Produccion</button></a></h3>
            @include('Registrar.RealizaProduccion.search')
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
                            <th>Opciones</th>
                            </thead>
                            @foreach($produccion as $pr)
                                <tr>
                                    <td>{{ $pr->Codigo }}</td>
                                    <td>{{ $pr->Fecha }}</td>
                                    <td>
                                        <a href="{{URL::action('ProduccionRealizaProyectoController@show',$pr->Codigo)}}"><button class="btn btn-primary">Detalles</button></a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    {{ $produccion->render() }}
                </div>
            </div>
        </div>

    </div>

@endsection