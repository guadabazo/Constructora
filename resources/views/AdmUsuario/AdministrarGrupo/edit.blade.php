@extends ('layouts.admin')
@section ('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Editar Grupo : {{$Grupo->Id}}</h3>
            @if (count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {!!Form::model($Grupo,['method'=>'PATCH','route'=>['AdministrarGrupo.update',$Grupo->Id]])!!}
            {{Form::token()}}

            <div class="form-group">
                <label for="Id">ID</label>
                <input type="text" name="Id" class="form-control" value="{{$Grupo->Id}}">
            </div>

            <div class="form-group">
                <label for="Descripcion">DESCRIPCION</label>
                <input type="text" name="Descripcion" class="form-control" value="{{$Grupo->Descripcion}}">
            </div>



            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>



            {!!Form::close()!!}

        </div>
    </div>
@endsection