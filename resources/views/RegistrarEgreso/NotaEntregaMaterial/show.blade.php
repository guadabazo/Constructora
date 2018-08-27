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
                <label for="nota_entrega">Fecha</label>
                @foreach($EntregaMaterial as $e)
                    <p>{{ $e->Fecha_Hora }}</p>
                @endforeach
            </div>
        </div>
    </div>

    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-body">
                <h3>Detalle de Entrega de Material</h3>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                        <table id="" class="table table-striped table-bordered table-condensed table-hover">
                            <thead style="background-color: #A9D0F5">

                            <th>material</th>
                            <th>cantidad</th>
                            <th>encargado</th>

                            </thead>
                            <tfoot>
                            <th></th>
                            <th></th>
                            </tfoot>
                            <tbody>
                            @foreach($EntregaMaterial as $em)
                                @foreach($idrol as $id)
                                    <tr>
                                        <td>{{ $em->Nombre }}</td>
                                        <td>{{ $em->Cantidad }}</td>
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


    </div>



@endsection