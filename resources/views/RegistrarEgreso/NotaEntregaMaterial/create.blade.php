@extends('layouts.admin')
@section('contenido')


    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3> Entrega de Material</h3>
            @if(count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>

    {!! Form::open(array('url'=>'RegistrarEgreso/NotaEntregaMaterial','method'=>'POST','autocomplete'=>'off')) !!}
    {!! Form::token() !!}

    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
        <div class="form-group">
            <label for="idrol">Nombre de Usuario</label>
            <select name="ID_Rol">
                @foreach($idrol as $idroles)
                    <option name="ID_Rol" id="ID_Rol" value="{{ $idroles->ID }}">{{$idroles->Nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group">
                <label for="proyecto">proyecto</label>
                <select name="Nro2" id="Nro2" class="form-control selectpicker" data-live-search="true" title="Escoger proyecto...">
                    @foreach($proyecto as $p)
                        <option value="{{ $p->Nro }}">{{ $p->Nro}}: {{$p->Nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="material">material</label>
                <select name="Codigo2" id="Codigo2" class="form-control selectpicker" data-live-search="true" title="Escoger material...">
                    @foreach($material as $m)
                        <option value="{{ $m->Codigo }}">{{ $m->Codigo}}: {{$m->Nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="Cantidad">Cantidad</label>
                <input type="number" name="Cantidad2" id="Cantidad2" class="form-control" placeholder="Cantidad...">
            </div>
        </div>

        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group">
                <button type="button" id="btn_add" class="btn btn-block btn-primary"> AGREGAR</button>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-body">
                <h3>Detalle de Entrega de Material</h3>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                        <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                            <thead>
                            <th>Opciones</th>
                            <th>Nombre del Proyecto</th>
                            <th>Material</th>
                            <th>Cantidad</th>
                            </thead>
                            <tfoot>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            </tfoot>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">
            <div class="form-group">
                <input name="_token" value="{{csrf_token()}}" type="hidden">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
        </div>
    </div>

    {!! Form::close() !!}

    @push('scripts')
    <script>
        $(document).ready(function () {
            $('#btn_add').click(function () {
                agregar();
            });
        });

        var hoy = new Date();

        c = 0;

        $("#guardar").hide();

        function agregar() {


            Nro = $("#Nro2").val();
            proyecto = $("#Nro2 option:selected").text();

            Codigo = $("#Codigo2").val();
            material = $("#Codigo2 option:selected").text();

            cantidad = $("#Cantidad2").val();

            if(proyecto != "" && proyecto!= "Escoger proyecto..." && material != "" && material != "Escoger material..."  && cantidad != "" && cantidad > 0){

                var fila = '<tr class="selected" id="fila'+c+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+c+');">X</button></td><td><input id="Nro" type="hidden" name="Nro" value="'+Nro+'">'+proyecto+'</td><td><input id="Codigo" type="hidden" name="Codigo[]" value="'+Codigo+'">'+material+'</td><td><input id="Cantidad" type="number" name="Cantidad[]" value="'+cantidad+'" ></td></tr>';

                c++;
                limpiar();
                evaluar();
                $('#detalles').append(fila);
            }else{
                alert("Error al ingresar el detalle de ingreso, revise los datos del material");
            }
        }

        function limpiar(){
            $("#Cantidad2   ").val("");
            $("#Codigo2").val("");
        }

        function evaluar(){
            if (c > 0){
                $("#guardar").show();
            }
            else{
                $("#guardar").hide();
            }
        }

        function eliminar(index) {
            $("#fila" + index).remove();
            c--;
            evaluar();
        }

    </script>
    @endpush
    </div>



@endsection