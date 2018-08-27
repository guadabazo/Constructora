@extends('layouts.admin')
@section('contenido')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>Deposito <a href="registrar_deposito/create"><button class="btn btn-success pull-right">Registrar Deposito</button></a></h3>
            @include('Administrar.RegistrarDeposito.search')
        </div>
    </div>

    <div class="panel panel-primary">
        <div class="panel-body">

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-condensed table-hover">
                            <thead>
                            <th>Numero</th>
                            <th>Nombre</th>
                            </thead>
                            @foreach($deposito as $depo)
                                <tr>
                                    <td>{{ $depo->Numero }}</td>
                                    <td>{{ $depo->Nombre }}</td>

                                </tr>
                            @endforeach
                        </table>
                    </div>
                    {{ $deposito->render() }}
                </div>
            </div>
        </div>

    </div>

@endsection