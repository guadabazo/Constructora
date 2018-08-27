@extends ('layouts.admin')
@section ('contenido')

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">


            {!!Form::open(array('url'=>'Gestionar/GestionarRol','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Tipo</label>
                    <select name="Descripcion" class="form-control">
                            <option value="ADMINISTRADOR" selected>Administrador</option>
                        <option value="BODEGUERO" selected>Bodeguero</option>
                    </select>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label>Carnet</label>
                        <select name="Per_CI" class="form-control">
                            @foreach($usuarios as $u)
                                <option value="{{$u->Per_CI}}" selected>{{$u->Per_CI }} </option>
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