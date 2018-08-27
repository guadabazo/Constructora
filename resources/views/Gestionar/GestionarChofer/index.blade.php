@extends('layouts.admin')
@section('contenido')

    <div class = "row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>Lista de CHOFERES<a href="GestionarChofer/create"><button class="btn btn-success pull-right">Nuevo CHofer</button></a></h3>
            @include('Gestionar.GestionarChofer.search')
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
                            <th>LICENCIA</th>
                            <th>CI</th>
                            <th>Nombre Y Apellido</th>
                            <th>Opciones</th>
                            </thead>
                            @foreach ($choferes as $p)
                                <tr>
                                    <td>{{ $p->Licencia}}</td>
                                    <td>{{ $p->CI}}</td>
                                    <td>{{ $p->Nombre}} {{ $p->Apellido_Paterno}} {{ $p->Apellido_Materno}}</td>
                                    <td>
                                        <a href="{{URL::action('ChoferController@edit',$p->CI)}}"><button class="btn btn-danger">Editar</button></a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    {{$choferes->render()}}
                </div>
            </div>
        </div>
    </div>
@endsection