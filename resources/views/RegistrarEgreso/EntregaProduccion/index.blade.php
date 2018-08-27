<!-- Content Wrapper. Contains page content -->
@extends('layouts.admin')
@section('contenido')

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3><b>REGISTROS DE ENTREGA DE PRODUCCION</b><a href='EntregaProduccion/create'><button class="btn btn-success pull-right">Nuevo</button></a></h3>
            @include('RegistrarEgreso.EntregaProduccion.search')
        </div>
    </div>
    <h3></h3>

    <div class="panel panel-primary">
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-condensed table-hover">
                            <thead>
                            <th>NUMERO DE PRODUCCION</th>
                            <th>PROYECTO</th>
                            <th>CANTIDAD</th>
                            <th>FECHA</th>
                            </thead>
                            @foreach ($ingresos as $p)

                                <tr>
                                    <td>{{ $p->Produccion_Nro}}</td>
                                    <td>{{ $p->Nombre}}</td>
                                    <td>{{ $p->Cantidad}}</td>
                                    <td>{{ $p->fecha}}</td>

                                </tr>


                            @endforeach
                        </table>
                    </div>
                    {{$ingresos->render()}}
                </div>
            </div>
        </div>
    </div>


    <h3></h3>


@endsection