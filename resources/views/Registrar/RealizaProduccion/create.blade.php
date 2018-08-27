@extends('layouts.admin')
@section('contenido')

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Nueva Produccion</h3>
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

    {!! Form::open(array('url'=>'Registrar/RealizaProduccion','method'=>'POST','autocomplete'=>'off')) !!}
    {!! Form::token() !!}
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <h3>Registro de Produccion</h3>
        </div>
    </div>
    <div class="row">

        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group">
                <label>Cantidad Total de Produccion</label>
                <input type="text" name="Cantidad" id="Cantidad" class="form-control" placeholder="Introducir la Cantidad de Produccion Total...">
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label>Produccion</label>
                <select name="Produccion_Nro" id="Produccion_Nro" class="form-control selectpicker" data-live-search="true" title="Escoger Produccion...">
                    @foreach($produccion as $pd)
                        <option value="{{ $pd->Nro }}">{{ $pd->Nro}}: {{$pd->Tipo}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label>Proyecto</label>
                <select name="Proyecto_Nro" id="Proyecto_Nro" class="form-control selectpicker" data-live-search="true" title="Escoger Proyecto...">
                    @foreach($proyecto as $pr)
                        <option value="{{ $pr->Nro }}">{{ $pr->Nro}}: {{$pr->Nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group">
                <button class="btn btn-primary"> Guardar</button>
            </div>
        </div>
    </div>

    {!! Form::close() !!}


@endsection