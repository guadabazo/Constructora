@extends('layouts.admin')
@section('contenido')


    <div class = "row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>Listado de Produccion de prefabricado</h3>
            @include('Administrar.AdministrarProduccion.search')
        </div>
    </div>

    <div class = "row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                    <th>Nro</th>
                    <th>Tipo</th>
                    <th>Cantidad</th>
                    </thead>
                    @foreach($produccion as $prod)
                        @if($prod->Cantidad > 0)
                            <tr>
                                <td>{{ $prod->Nro}}</td>
                                <td>{{ $prod->Tipo}}</td>
                                <td>{{ $prod->Cantidad}}</td>

                            </tr>
                        @endif
                    @endforeach
                </table>
            </div>
            {{ $produccion->render() }}
        </div>
    </div>


@endsection