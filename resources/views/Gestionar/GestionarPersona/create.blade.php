@extends ('layouts.admin')
@section ('contenido')

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Nueva Persona</h3>
            @if (count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {!!Form::open(array('url'=>'Gestionar/GestionarPersona','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}

            <div class="row">
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group">
                        <label for="CI">CI</label>
                        <input type="text" name="CI" class="form-control" placeholder="Carnet de identidad...">
                    </div>
                </div>

                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group">
                        <label for="Nombre">Nombre</label>
                        <input type="text" name="Nombre" class="form-control" placeholder="Nombre...">
                    </div>
                </div>

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="Apellido_Paterno">Apellido Paterno</label>
                        <input type="text" name="Apellido_Paterno" class="form-control" placeholder="Apellido Paterno...">
                    </div>
                </div>

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="Apellido_Materno">Apellido Materno</label>
                        <input type="text" name="Apellido_Materno" class="form-control" placeholder="Apellido Materno...">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group">
                        <label>Tipo de Persona</label>
                        <select name="Tipo_P" class="form-control">
                            @foreach($tipo_persona as $tp)
                                <option value="{{$tp->Id}}" selected> {{$tp->Descripcion}} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>


        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                    <button class="btn btn-danger" type="reset">Cancelar</button>
                </div>
            </div>
        </div>

        {!!Form::close()!!}

        </div>
    </div>
@endsection