@extends ('layouts.admin')
@section ('contenido')

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

            {!!Form::open(array('url'=>'Gestionar/GestionarProveedor','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}

            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label>Carnet de Proveedor</label>
                        <select name="Per_CI" class="form-control">
                            @foreach($personas as $p)
                                <option value="{{$p->CI}}" selected>{{$p->CI}} </option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="Placa">Placa</label>
                        <input type="text" name="Placa" class="form-control" placeholder="Placa...">
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