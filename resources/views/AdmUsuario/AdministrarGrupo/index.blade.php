@extends ('layouts.admin')
@section ('contenido')

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>Listado de Grupos<a href="AdministrarGrupo/create"><button class="btn btn-success pull-right">Nuevo Grupo</button></a></h3>
            @include('AdmUsuario.AdministrarGrupo.search')
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
                            <th>Id</th>
                            <th>Descripcion</th>
                            </thead>
                            @foreach($grupo as $gru)
                                <tr>
                                    <td>{{$gru->Id}}</td>
                                    <td>{{$gru->Descripcion}}</td>
                                    <td>
                                        <a href="{{URL::action('GrupoController@edit',$gru->Id)}}"><button class="btn btn-info">Editar</button></a>
                                    </td>
                                </tr>

                            @endforeach
                        </table>
                    </div>
                    {{$grupo->render()}}
                </div>
            </div>
        </div>
    </div>

@endsection