@extends('layouts.admin')
@section('contenido')



    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="rol">Nombre Usuario</label>
                @foreach($idrol as $id)
                    <p>{{ $id->Nom }}</p>
                @endforeach
            </div>
        </div>



        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="dot_entrega_trabajador">Fecha</label>
                @foreach($EntregaDotacion as $ed)
                    <p>{{ $ed->Fecha }}</p>
                @endforeach
            </div>
        </div>
    </div>

    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-body">
                <h3>Detalle de Entrega de Dotacion</h3>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                        <table id="dot_entrega_trabajador" class="table table-striped table-bordered table-condensed table-hover">
                            <thead style="background-color: #A9D0F5">
                            <th>Dotacion</th>
                            <th>Cantidad</th>
                            <th>Nombre de Usuario</th>
                            </thead>
                            <tfoot>
                            <th></th>
                            <th></th>
                            </tfoot>
                            <tbody>
                            @foreach($EntregaDotacion as $et)
                                @foreach($idrol as $id)
                                    <tr>
                                        <td>{{ $et->Nombre }}</td>
                                        <td>{{ $et->Cantidad }}</td>
                                        <td>{{ $id->Nom }}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" id="btn_add">
            <div class="form-group">
                <button type="button" id="btn_add" class="btn btn-danger"> Generar Reporte</button>
            </div>
        </div>
    </div>



@endsection