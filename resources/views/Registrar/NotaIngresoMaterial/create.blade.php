@extends('layouts.admin')
@section('contenido')

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Nuevo Ingreso de Material</h3>
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

    {!! Form::open(array('url'=>'Registrar/IngresoMaterial','method'=>'POST','autocomplete'=>'off')) !!}
    {!! Form::token() !!}
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group">
                <label for="proveedor">Proveedor</label>
                <select name="Proveedor_CI" id="Proveedor_CI2" class="form-control selectpicker" data-live-search="true" title="Escoger Proveedor...">
                    @foreach($proveedores as $prov)
                        <option value="{{ $prov->Per_CI }}">{{ $prov->Per_CI.': ' .$prov->Nombre. ' ' .$prov->Apellido_Paterno. ' ' .$prov->Apellido_Materno }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="material">Materiales</label>
                <select name="Material_Codigo" id="Material_Codigo2" class="form-control selectpicker" data-live-search="true" title="Escoger Material...">
                    @foreach($materiales as $mat)
                        <option value="{{ $mat->Codigo }}">{{ $mat->Codigo}}: {{$mat->Nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="Cantidad">Cantidad</label>
                <input type="number" name="Cantidad" id="Cantidad2" class="form-control" placeholder="Cantidad...">
            </div>
        </div>

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

        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group">
                <button type="button" id="btn_add" class="btn btn-block btn-primary"> AGREGAR</button>
            </div>
        </div>                                                                                
    </div>

    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-body">
                <h3>Detalle de Ingreso de Material</h3>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                        <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                            <thead style="background-color: #A9D0F5">
                                <th>Opciones</th>
                                <th>Nombre Proveedor</th>
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
                idproveedor = $("#Proveedor_CI2").val();
                proveedor = $("#Proveedor_CI2 option:selected").text();
                material_codigo = $("#Material_Codigo2").val();
                material = $("#Material_Codigo2 option:selected").text();
                cantidad = $("#Cantidad2").val();

                if(proveedor != "" && proveedor!= "Escoger Proveedor..." && material != "" && material != "Escoger Material..."  && cantidad != "" && cantidad > 0){

                    var fila = '<tr class="selected" id="fila'+c+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+c+');">X</button></td><td><input id="Proveedor_CI" type="hidden" name="Proveedor_CI" value="'+idproveedor+'">'+proveedor+'</td><td><input id="Material_Codigo" type="hidden" name="Material_Codigo" value="'+material_codigo+'">'+material+'</td><td><input id="Cantidad2" type="number" name="Cantidad2" value="'+cantidad+'" ></td></tr>';

                    c++;
                    limpiar();
                    evaluar();
                    $('#detalles').append(fila);
                }else{
                    alert("Error al ingresar el detalle de ingreso, revise los datos del material");
                }
            }
            
            function limpiar(){
                $("#Cantidad").val("");
                $("#idproveedor").val("");
                $("#Material_Codigo").val("");
                $('#btn_add').hide();
            }

            function evaluar(){
                if (c > 0){
                    $("#guardar").show();
                }
                else{
                    $("#guardar").hide();
                    $('#btn_add').show();
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