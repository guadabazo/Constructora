@extends ('layouts.admin')
@section ('contenido')

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

            {!!Form::open(array('url'=>'Gestionar/GestionarTrabajador','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}

            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label>Carnet de trabajador</label>
                        <select name="Per_CI" class="form-control">
                            @foreach($personas as $p)
                                <option value="{{ $p->CI }}" selected>{{ $p->CI }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="ID_Trabajador">ID_TRABAJADOR</label>
                        <input type="number" name="ID_Trabajador" class="form-control" placeholder="ID trabajador">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group">
                        <label>Tipo de Persona</label>
                        <select name="Tipo_P" class="form-control">
                            <option value="obrero" selected> "OBRERO" </option>
                            <option value="chofer" selected> "CHOFER" </option>
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