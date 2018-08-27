@extends('layouts.admin')
@section('contenido')

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Nuevo Ingreso de Dotacion</h3>
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

    {!! Form::open(array('url'=>'Registrar/IngresoDotacion','method'=>'POST','autocomplete'=>'off')) !!}
    {!! Form::token() !!}
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group">
                <label for="rol">Nombre Usuario</label>
                <select name="ID_Rol" id="ID_Rol">
                    @foreach($idrol as $idroles)
                        <option value="{{ $idroles->ID }}">{{ $idroles->Nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label>Dotacion</label>
                <select name="ID_Dotacion2" id="ID_Dotacion2" class="form-control selectpicker" data-live-search="true" title="Escoger Dotacion...">
                    @foreach($dotacion as $dot)
                        <option value="{{ $dot->ID }}">{{ $dot->ID}}: {{$dot->Nombre}}</option>
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

        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" id="btn_add">
            <div class="form-group">
                <button type="button" id="btn_add" class="btn btn-block btn-primary"> AGREGAR</button>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-body">
                <h3>Detalle de Ingreso de Dotacion</h3>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                        <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                            <thead style="background-color: #A9D0F5">
                            <th>Opciones</th>
                            <th>Dotacion</th>
                            <th>Cantidad</th>
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
            ID_Dotacion = $("#ID_Dotacion2").val();
            Dotacion = $("#ID_Dotacion2 option:selected").text();
            Cantidad = $("#Cantidad2").val();

            if(Dotacion != "" && Dotacion != "Escoger Dotacion..."  && Cantidad != "" && Cantidad > 0){

                var fila = '<tr class="selected" id="fila'+c+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+c+');">X</button></td><td><input type="hidden" name="ID_Dotacion[]" value="'+ID_Dotacion+'">'+Dotacion+'</td><td><input type="number" name="Cantidad[]" value="'+Cantidad+'" ></td></tr>';

                c++;
                limpiar();
                evaluar();
                $('#detalles').append(fila);
            }else{
                alert("Error al ingresar el detalle de ingreso, revise los datos de la dotacion");
            }
        }

        function limpiar(){
            $("#Cantidad2").val("");
            $("#Codigo_Herramienta").val("");
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