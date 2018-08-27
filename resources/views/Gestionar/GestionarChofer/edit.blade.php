@extends ('layouts.admin')
@section ('contenido')

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Editar Chofer : {{$choferes->Per_CI}}</h3>
            @if (count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {!!Form::model($choferes,['method'=>'PATCH','route'=>['GestionarChofer.update',$choferes->Per_CI]])!!}
            {{Form::token()}}

            <div class="row">
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group">
                        <label for="Licencia">LICENCIA</label>
                        <input type="text" name="Licencia" class="form-control" value="{{$choferes->Licencia}}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Guardar</button>
                        <button  href="Gestionar/GestionarChofer" class="btn btn-danger" >Cancelar</button>
                    </div>
                </div>
            </div>

            {!!Form::close()!!}

        </div>
    </div>
@endsection