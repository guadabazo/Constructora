@extends  ('layouts.admin')
@section ('contenido')

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>EDITAR CATEGORIA:{{$Roles->Per_CI}}</h3>

            {!!Form::model($Roles,['method'=>'PATCH','route'=>['GestionarRol.update',$Roles->ID]])!!}
            {{Form::token()}}

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Tipo</label>
                    <select name="Descripcion" class="form-control">
                        <option value ="{{$Roles->Descripcion}}" selected>{{$Roles->Descripcion}}</option>
                        <option value="ADMINISTRADOR">Administrador</option>
                        <option value="BODEGUERO">Bodeguero</option>
                    </select>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label>Carnet</label>
                        <select name="Per_CI" class="form-control">
                            @foreach($usuarios as $u)
                                @if ($u->Per_CI==$Roles->Per_CI)
                                    <option value="{{$u->Per_CI}}" selected>{{$u->Per_CI }} </option>
                                @else
                                    <option value="{{$u->Per_CI}}">{{$u->Per_CI }} </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Guardar</button>
                        <button href="Gestionar/GestionarRol" class="btn btn-danger">Cancelar</button>
                    </div>
                </div>
            </div>
            {!!Form::close()!!}

        </div>
    </div>

@endsection