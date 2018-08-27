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
                <label for="rol">Fecha</label>
                <p>{{ $ingreso->Fecha_Hora }}</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-body">
                <h3>Detalle de Ingreso de Dotacion</h3>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                        <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
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
                            @foreach($detalles as $det)
                                @foreach($idrol as $id)
                                    <tr>
                                        <td>{{ $det->Nombre }}</td>
                                        <td>{{ $det->Cantidad }}</td>
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