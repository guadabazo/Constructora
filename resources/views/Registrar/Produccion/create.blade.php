@extends('layouts.admin')
@section('contenido')

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Nueva Produccion</h3>
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

    {!! Form::open(array('url'=>'Registrar/Produccion','method'=>'POST','autocomplete'=>'off')) !!}
    {!! Form::token() !!}
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <h3>Registro de Produccion</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label>Tipo de Produccion</label>
                <input type="text" name="Tipo" id="Tipo" class="form-control" placeholder="Introducir el Tipo de Produccion...">
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label>Cantidad Total de Produccion</label>
                <input type="text" name="Cantidad1" id="Cantidad1" class="form-control" placeholder="Introducir la Cantidad de Produccion Total...">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <h3>Registro de Proyecto</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label>Proyecto</label>
                <select name="Proy_Nro2" id="Proy_Nro2" class="form-control selectpicker" data-live-search="true" title="Escoger Proyecto...">
                    @foreach($proyecto as $pr)
                        <option value="{{ $pr->Nro }}">{{ $pr->Nro}}: {{$pr->Nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="Cantidad">Cantidad Realizada</label>
                <input type="number" name="Cantidad2" id="Cantidad2" class="form-control" placeholder="Cantidad...">
            </div>
        </div>

        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" id="btn_add">
            <div class="form-group">
                <button type="button" id="btn_add" class="btn btn-block btn-primary"> AGREGAR</button>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-body">
                <h3>Detalle de la Produccion</h3>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                        <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                            <thead style="background-color: #A9D0F5">
                            <th>Opciones</th>
                            <th>Tipo de Produccion</th>
                            <th>Cantidad Total de Produccion</th>
                            <th>Cantidad Realizada de Produccion</th>
                            <th>Proyecto</th>
                            </thead>
                            <tfoot>
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
        var x = 0;
        $(document).ready(function () {
            $('#btn_add').click(function () {
                agregar();
            });
        });

        var hoy = new Date();

        var c = 0;

        $("#guardar").hide();

        function agregar() {
            Tipo = $("#Tipo").val();
            CantidadTotal = $("#Cantidad1").val();
            CantidadRealizada = $("#Cantidad2").val();
            proyecto_nro = $("#Proy_Nro2").val();
            proyecto = $("#Proy_Nro2 option:selected").text();


            if(Tipo!="" && CantidadTotal!="" && CantidadTotal > 0 && CantidadRealizada!="" && CantidadRealizada > 0 && proyecto != "" && proyecto != "Escoger Proyecto..."){

                var fila = '<tr class="selected" id="fila'+c+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+c+');">X</button></td><td><input type="hidden" name="Tipo" value="'+Tipo+'"></td><td><input type="hidden" name="Cantidad_Total" value="'+CantidadTotal+'"></td><td><input type="hidden" name="CantidadRealizada[]" value="'+CantidadRealizada+'"></td><td><input type="hidden" name="Proy_Nro[]" value="'+proyecto_nro+'">'+proyecto+'</td></tr>';

                c++;
                limpiar();
                evaluar();
                $('#detalles').append(fila);
            }else{
                alert("Error al ingresar , revise los datos");
            }
        }

        function limpiar(){
            $("#Cantidad2").val("");
            $("#Cantidad1").val("");
            $("#Proy_Nro2").val("");
            $("#Tipo").val("");
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