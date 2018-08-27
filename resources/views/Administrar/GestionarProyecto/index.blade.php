<!-- Content Wrapper. Contains page content -->
@extends('layouts.admin')
@section('contenido')

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>Proyectos<a href="gestionar_proyecto/create"><button class="btn btn-success pull-right">Nuevo Proyecto</button></a></h3>
            @include('Administrar.GestionarProyecto.search')
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
                            <th>Nombre</th>
                            <th>Tipo</th>
                            <th>Inicio</th>
                            <th>Final Aproximado</th>
                            <th>Opciones</th>
                            </thead>
                            @foreach ($proyecto as $p)

                                <tr>
                                    <td>{{ $p->Nombre}}</td>
                                    <td>{{ $p->Tipo}}</td>
                                    <td>{{ $p->Inicio}}</td>
                                    <td>{{ $p->Final_Aproximado}}</td>
                                    <td>
                                        <a href="{{URL::action('ProyectoController@edit',$p->Nro)}}"><button class="btn btn-info">Editar</button></a>
                                        <a href="{{URL::action('ProyectoController@show',$p->Nro)}}"><button class="btn btn-info">Detalles</button></a>

                                    </td>
                                </tr>


                            @endforeach
                        </table>
                    </div>
                    {{$proyecto->render()}}
                </div>
            </div>
        </div>
    </div>


@endsection