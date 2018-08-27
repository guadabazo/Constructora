@extends('layouts.admin')
@section('contenido')

    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-body">
                <h3 align="center"><b>Detalle de Prestamo de Herramienta</b></h3>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                        <table id="" class="table table-striped table-bordered table-condensed table-hover">
                            <thead style="background-color: #A9D0F5">
                            <th>Herramienta Prestada</th>
                            <th>Cantidad Prestada</th>
                            <th>Proyecto</th>
                            </thead>
                            <tfoot>
                            <th></th>
                            <th></th>
                            </tfoot>
                            <tbody>
                            @foreach($prestamoherramienta as $em)
                                <tr>
                                    <td>{{ $em->Nombre }}</td>
                                    <td>{{ $em->C }}</td>
                                    <td>{{ $em->N }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h3 align="center"><b>Nueva Devolucion de Herramientas</b></h3>
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

    {!! Form::open(array('url'=>'Registrar/NotaDevolucion','method'=>'POST','autocomplete'=>'off')) !!}
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

        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group">
                <label>Nombre de Proyecto</label>
                <select name="Proyecto_Nro" id="Proyecto_Nro" class="form-control selectpicker" data-live-search="true" title="Escoger Proyecto...">
                    @foreach($proyecto as $pr)
                        <option value="{{ $pr->Nro }}">{{ $pr->Nro }}: {{$pr->Nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                <label>Herramienta</label>
                <select name="Codigo_Herramienta2" id="Codigo_Herramienta2" class="form-control selectpicker" data-live-search="true" title="Escoger Herramienta...">
                    @foreach($herramientas as $herr)
                        <option value="{{ $herr->Codigo }}">{{ $herr->Codigo}}: {{$herr->Nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                <label>Estado de Herramienta</label>
                <select name="Estado2" id="Estado2" class="form-control selectpicker" data-live-search="true" title="Escoger Estado...">
                    @foreach($estado as $es)
                        <option value="{{ $es->ID_Estado }}">{{$es->Descripcion}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
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
                <h3 align="center"><b>Detalle de la Devolucion de Herramientas</b></h3>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                        <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                            <thead style="background-color: #A9D0F5">
                            <th>Opciones</th>
                            <th>Herramienta</th>
                            <th>Estado</th>
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
            codigo_herramienta = $("#Codigo_Herramienta2").val();
            herramienta = $("#Codigo_Herramienta2 option:selected").text();

            id_estado = $("#Estado2").val();
            estado = $("#Estado2 option:selected").text();

            cantidad = $("#Cantidad2").val();

            if(herramienta != "" && herramienta != "Escoger Herramienta..."  && estado != "" && estado != "Escoger Estado..." && cantidad != "" && cantidad > 0){

                var fila = '<tr class="selected" id="fila'+c+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+c+');">X</button></td><td><input type="hidden" name="Codigo_Herramienta[]" value="'+codigo_herramienta+'">'+herramienta+'</td><td><input type="hidden" name="ID_Estado[]" value="'+id_estado+'">'+estado+'</td><td><input type="number" name="Cantidad[]" value="'+cantidad+'" ></td></tr>';

                c++;
                limpiar();
                evaluar();
                $('#detalles').append(fila);
            }else{
                alert("Error al ingresar el detalle de ingreso, revise los datos de la devolucion");
            }
        }

        function limpiar(){
            $("#Cantidad2").val("");
            $("#Codigo_Herramienta2").val("");
            $("#Estado2").val("");
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