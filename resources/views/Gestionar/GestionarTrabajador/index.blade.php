@extends('layouts.admin')
@section('contenido')

    <div class = "row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>Lista de trabajadores<a href="GestionarTrabajador/create"><button class="btn btn-success pull-right">Nuevo Trabajador</button></a></h3>
            @include('Gestionar.GestionarTrabajador.search')
        </div>
    </div>
    <h3></h3>
    <div class="panel panel-primary">
        <div class="panel-body">
            <div class = "row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-condensed table-hover">
                            <thead>
                            <th>ID Trabajador</th>
                            <th>CI</th>
                            <th>Nombre y Apellido</th>
                            <th>Tipo de Trabajador</th>
                            <th>Opciones</th>
                            </thead>
                            @foreach ($trabajador as $p)
                                <tr>
                                    <td>{{ $p->ID_Trabajador}}</td>
                                    <td>{{ $p->CI}}</td>
                                    <td>{{ $p->Nombre}} {{ $p->Apellido_Paterno}} {{ $p->Apellido_Materno}}</td>
                                    @if($p->TipoCh == 'V')
                                        <td>Chofer</td>
                                    @endif
                                    @if($p->TipoO == 'V')
                                        <td>Otro Trabajador</td>
                                    @endif
                                    <td>
                                        <a href="{{URL::action('TrabajadorController@edit',$p->CI)}}"><button class="btn btn-danger">Editar</button></a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    {{$trabajador->render()}}
                </div>
            </div>
        </div>
    </div>
@endsection