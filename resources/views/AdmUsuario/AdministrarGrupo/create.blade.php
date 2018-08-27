@extends ('layouts.admin')
@section ('contenido')

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Nuevo Grupo</h3>
            @if (count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            {!!Form::open(array('url'=>'AdmUsuario/AdministrarGrupo','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}



            <div class="row">
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group">
                        <label for="Id">ID GRUPO</label>
                        <input type="text" name="Id" class="form-control" placeholder="ID grupo...">
                    </div>
                </div>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group">
                        <label for="Descripcion">DESCRIPCION</label>
                        <input type="text" name="Descripcion" class="form-control" placeholder="descripcion...">
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