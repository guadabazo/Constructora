@extends ('layouts.admin')
@section ('contenido')

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3 align="center"><b>ENTREGA DE PRODUCCION</b></h3>
            @if (count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {!!Form::open(array('url'=>'RegistrarEgreso/EntregaProduccion','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}

        <div class="row">
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <div class="form-group">
                    <label for="Cantidad">CANTIDAD</label>
                    <input type="number" name="Cantidad" class="form-control" placeholder="Cantidad...">
                </div>
            </div>
        </div>

            <div class="row">
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group">
                        <label>proyectos</label>
                        <select name="Proyecto_Nro" class="form-control">
                            @foreach($proyecto as $tp)
                                <option value="{{$tp->Nro}}" selected> {{$tp->Nombre}} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group">
                        <label>produccion</label>
                        <select name="Produccion_Nro" class="form-control">
                            @foreach($produccion as $tp)
                                <option value="{{$tp->Nro}}" selected> {{$tp->Tipo}} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>





            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">

                        <button class="btn btn-primary" type="submit">Guardar</button>
                        <button  href="RegistrarEgresos/EntregaProduccion" class="btn btn-danger" type="reset">Cancelar</button>

                    </div>
                </div>
            </div>

            {!!Form::close()!!}

        </div>
    </div>
@endsection