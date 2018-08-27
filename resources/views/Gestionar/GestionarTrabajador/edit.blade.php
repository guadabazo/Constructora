@extends ('layouts.admin')
@section ('contenido')

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Editar Trabajador : {{$trabajadores->Per_CI}}</h3>
            @if (count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {!!Form::model($trabajadores,['method'=>'PATCH','route'=>['GestionarTrabajador.update',$trabajadores->Per_CI]])!!}
            {{Form::token()}}

            <div class="row">
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group">
                        <label for="ID_trabajador">ID_Trabajador</label>
                        <input type="text" name="ID_Trabajador" class="form-control" value="{{$trabajadores->ID_Trabajador}}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Guardar</button>
                        <button  href="Gestionar/GestionarTrabajador" class="btn btn-danger" >Cancelar</button>
                    </div>
                </div>
            </div>

            {!!Form::close()!!}

        </div>
    </div>
@endsection