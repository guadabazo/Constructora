@extends('layouts.admin')
@section('contenido')

    <div class = "row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>Lista de Proveedores<a href="GestionarProveedor/create"><button class="btn btn-success pull-right">Nuevo Proveedor</button></a></h3>
            @include('Gestionar.GestionarProveedor.search')
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
                    <th>CI</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Placa</th>
                    <th>Opciones</th>
                    </thead>
                    @foreach ($proveedores as $p)
                        <tr>
                            <td>{{ $p->CI}}</td>
                            <td>{{ $p->Nombre}}</td>
                            <td>{{ $p->Apellido_Paterno}}</td>
                            <td>{{ $p->Apellido_Materno}}</td>
                            <td>{{ $p->Placa}}</td>
                            <td>
                                <a href="{{URL::action('ProveedorController@edit',$p->CI)}}"><button class="btn btn-danger">Editar</button></a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            {{$proveedores->render()}}
        </div>
    </div>
        </div>
    </div>
@endsection