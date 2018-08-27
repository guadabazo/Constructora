@extends ('layouts.admin')
@section ('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Editar Usuario : {{$usuario->Id}}</h3>
            @if (count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {!!Form::model($usuario,['method'=>'PATCH','route'=>['AdministrarUsuario.update',$usuario->Per_CI]])!!}
            {{Form::token()}}

            <div class="form-group">
                <label for="Id">ID</label>
                <input type="text" name="Id" class="form-control" placeholder="Id...">
            </div>

            <div class="form-group">
                <label for="Contraseña">Contraseña</label>
                <input type="text" name="Contrasena" class="form-control" placeholder= "nueva contrasena">
            </div>

            <div class="form-group">
                <label>Grupo</label>
                <select name="Codigo_G" class="form-control">
                    @foreach ($grupo as $tpp)
                        @if ($tpp->Id==$usuario->Codigo_G)
                            <option value="{{$tpp->Id}}" selected>{{$tpp->Descripcion}}</option>
                        @else
                            <option value="{{$tpp->Id}}">{{$tpp->Descripcion}}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>



            {!!Form::close()!!}

        </div>
    </div>
@endsection