@extends('layouts.admin')
@section('contenido')


    <div class="row">
        <div class="col-lg-12 col-md-6 col-dm-12 col-xs-12">
            <div class="form-group">
                <label for="nombre">Bitacora</label>
                <p>{{$bitacora->ID_B}}</p>

            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                    <th>ID DB</th>
                    <th>DB</th>
                    <th>OPERACION</th>
                    <th>TABLA</th>
                    <th>HORA<th>
                    </thead>
                    @foreach($detalle_bitacoras as $bit)
                        <tr>
                            <td>{{$bit->ID_DB}}</td>
                            <td>{{$bit->ID_b}}</td>
                            <td>{{$bit->Operacion}}</td>
                            <td>{{$bit->Tabla}}</td>
                            <td>{{$bit->Hora}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>

        </div>
    </div>





@endsection