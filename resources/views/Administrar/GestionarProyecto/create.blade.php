@extends('layouts.admin')
@section('contenido')

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Nuevo Ingreso de Herramienta</h3>
            @if(count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>

    {!! Form::open(array('url'=>'administrar/gestionar_proyecto','method'=>'POST','autocomplete'=>'off')) !!}
    {!! Form::token() !!}
    <div class="row">


        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group">
                <label for="Nombre">Nombre</label>
                <input type="text" name="Nombre" class="form-control" placeholder="Nombre...">
            </div>
        </div>


        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group">
                <label>Tipo de Proyecto</label>
                <select name="Produccion_Numero" id="Produccion_Numero" class="form-control selectpicker" data-live-search="true" title="Escoger Tipo Produccion...">
                    @foreach($produccion as $tp)
                        <option value="{{$tp->Nro}}" selected> {{$tp->Nro}} </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="Inicio">Fecha Inicio</label>
                <input type="date" name="Inicio" class="form-control" placeholder="fecha inicio...">
            </div>
        </div>


        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group">
                <label>Estado</label>
                <select name="ID_Estado" id="ID_Estado" class="form-control selectpicker" data-live-search="true" title="Escoger Estado...">
                    @foreach($estado_proyecto as $es)
                        <option value="{{$es->ID}}" selected> {{$es->ID}} </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="Final_Aproximado">Final Aproximado</label>
                <input type="date" name="Final_Aproximado" class="form-control" placeholder="Final Aproximado...">
            </div>
        </div>





        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group">
                <label>Tipo de Proyecto</label>
                <select name="Encargado_Proyecto"id="Encargado_Proyecto" class="form-control selectpicker" data-live-search="true" title="Escoger Encargado...">
                    @foreach($encargado as $e)
                        <option value="{{$e->Per_CI}}" selected> {{$e->Per_CI}} </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <button class="btn btn-submit" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
        </div>
    </div>
    {!!Form::close()!!}



@endsection
