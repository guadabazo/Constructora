@extends ('layouts.admin')
@section ('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

            @if (count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>


    {!!Form::model($proyecto,['method'=>'PATCH','route'=>['gestionar_proyecto.update',$proyecto->Nro]])!!}
    {{Form::token()}}
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group">
                <label for="Final_Aproximado">Final Aproximado</label>
                <input type="date" name="Final_Aproximado" class="form-control" value="{{$proyecto->Final_Aproximado}}">
            </div>
        </div>

        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group">
                <label>Estado</label>
                <select name="ID_Estado" id="ID_Estado" class="form-control selectpicker" data-live-search="true" title="Escoger Estado...">
                    <option value=""selected></option>
                    @foreach($estado as $es)
                        <option value="{{$es->ID}}" > {{$es->ID}} </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group">
                <label>Encargado Proyecto</label>
                <select name="Encargado_Proyecto"id="Encargado_Proyecto" class="form-control selectpicker" data-live-search="true" title="Escoger Encargado...">
                    <option value=""selected></option>
                    @foreach($encargado as $e)
                        <option value="{{$e->Per_CI}}" > {{$e->Per_CI}} </option>
                    @endforeach
                </select>
            </div>
        </div>

    </div>


    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <button class="btn btn-submit" type="submit">Guardar</button>
                <button  href="administrar/gestionar_proyecto" class="btn btn-danger" >Cancelar</button>
            </div>
        </div>
    </div>

    {!!Form::close()!!}


    </div>
@endsection