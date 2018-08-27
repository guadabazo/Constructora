@extends('layouts.admin')
@section('contenido')

    <h3 align="center"><b>NUEVA ENTREGA DE DOTACION</b></h3>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
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

    {!! Form::open(array('url'=>'RegistrarEgreso/EntregaDotacion','method'=>'POST','autocomplete'=>'off')) !!}
    {!! Form::token() !!}

    <div class="row">
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
    </div>

    <div class="row">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group">
                <label for="trabajador">Trabajador</label>
                <select name="Per_CI2" id="Per_CI2" class="form-control selectpicker" data-live-search="true" title="Escoger trabajador...">
                    @foreach($trabajador as $tra)
                        <option value="{{ $tra->Per_CI }}">{{ $tra->Per_CI.': ' .$tra->Nombre. ' ' .$tra->Apellido_Paterno. ' ' .$tra->Apellido_Materno }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="dotacion">Dotacion</label>
                <select name="ID_Dotacion2" id="ID_Dotacion2" class="form-control selectpicker" data-live-search="true" title="Escoger dotacion...">
                    @foreach($dotacion as $d)
                        <option value="{{ $d->ID }}">{{ $d->ID}}: {{$d->Nombre}}</option>
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
                <h3 align="center"><b>DETALLE DE ENTREGA DE DOTACION</b></h3>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                        <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                            <thead>
                            <th>Opciones</th>
                            <th>Nombre trabajador</th>
                            <th>Dotacion</th>
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
            idtrabajador = $("#Per_CI2").val();
            trabajador = $("#Per_CI2 option:selected").text();
            id_dotacion = $("#ID_Dotacion2").val();
            dotacion = $("#ID_Dotacion2 option:selected").text();
            cantidad = $("#Cantidad2").val();

            if(trabajador != "" && trabajador!= "Escoger trabajador..." && dotacion != "" && dotacion != "Escoger dotacion..."  && cantidad != "" && cantidad > 0){

                var fila = '<tr class="selected" id="fila'+c+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+c+');">X</button></td><td><input id="Per_CI" type="hidden" name="Per_CI[]" value="'+idtrabajador+'">'+trabajador+'</td><td><input id="ID_Dotacion" type="hidden" name="ID_Dotacion[]" value="'+id_dotacion+'">'+dotacion+'</td><td><input id="Cantidad" type="number" name="Cantidad[]" value="'+cantidad+'" ></td></tr>';

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
            $("#ID_Dotacion2").val("");
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