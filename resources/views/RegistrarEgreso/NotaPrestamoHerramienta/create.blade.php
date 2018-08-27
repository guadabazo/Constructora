@extends('layouts.admin')
@section('contenido')

    <h3 align="center"><b>Lista de Encargados de Proyecto</b></h3>
    <div class="panel panel-primary">
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-condensed table-hover">
                            <thead>
                            <th>Encargado</th>
                            <th>Proyecto</th>
                            </thead>
                            @foreach($encargados as $e)
                                    <tr>
                                        <td>{{ $e->Nombre }} {{ $e->Apellido_Paterno }} {{ $e->Apellido_Materno }}</td>
                                        <td>{{ $e->Nombre }}</td>
                                    </tr>
                            @endforeach
                        </table>
                    </div>
                    {{ $encargados->render() }}
                </div>
            </div>
        </div>
    </div>





    <h3 align="center"><b> Prestamo de Herramientas</b></h3>
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

    {!! Form::open(array('url'=>'RegistrarEgreso/PrestamoHerramienta','method'=>'POST','autocomplete'=>'off')) !!}
    {!! Form::token() !!}

    <div class="row">
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
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
                <label for="proyecto">proyecto</label>
                <select name="Nro2" id="Nro2" class="form-control selectpicker" data-live-search="true" title="Escoger proyecto...">
                    @foreach($proyecto as $p)
                        <option value="{{ $p->Nro }}">{{ $p->Nro}}: {{$p->Nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                <label for="herramienta">Herramienta</label>
                <select name="Codigo2" id="Codigo2" class="form-control selectpicker" data-live-search="true" title="Escoger Herramienta...">
                    @foreach($herramienta as $h)
                        <option value="{{ $h->Codigo }}">{{ $h->Codigo}}: {{$h->Nombre}}</option>
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

        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                <label for="FechaA">Fecha Aproximada</label>
                <input type="date" name="FechaA2" id="FechaA2" class="form-control" placeholder="Introdusca la Fecha Aproximada de Devolucion...">
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
                <h3 align="center"><b>Detalle de Entrega de Material</b></h3>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                        <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                            <thead>
                            <th>Opciones</th>
                            <th>Nombre del Proyecto</th>
                            <th>Material</th>
                            <th>Cantidad</th>
                            <th>Fecha Aproximada de Devolucion</th>
                            </thead>
                            <tfoot>
                            <th></th>
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
            herramienta = $("#Codigo2 option:selected").text();

            cantidad = $("#Cantidad2").val();

            fecha = $("#FechaA2").val();

            if(proyecto != "" && proyecto!= "Escoger proyecto..." && herramienta != "" && herramienta != "Escoger Herramienta..."  && cantidad != "" && cantidad > 0 && fecha != "" && fecha != "Introdusca la Fecha Aproximada de Devolucion..."){

                var fila = '<tr class="selected" id="fila'+c+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+c+');">X</button></td><td><input id="Nro" type="hidden" name="Nro" value="'+Nro+'">'+proyecto+'</td><td><input id="Codigo" type="hidden" name="Codigo[]" value="'+Codigo+'">'+herramienta+'</td><td><input id="Cantidad" type="number" name="Cantidad[]" value="'+cantidad+'" ></td><td><input id="FechaA" type="date" name="FechaA" value="'+fecha+'" ></td></tr>';

                c++;
                limpiar();
                evaluar();
                $('#detalles').append(fila);
            }else{
                alert("Error al ingresar el detalle de prestamo, revise los datos");
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