@extends('layouts.admin')
@section('contenido')


    <h3 align="center"><b>ENTREGA DE COMBUSTIBLE</b></h3>
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

    {!! Form::open(array('url'=>'RegistrarEgreso/NotaSalidaCombustible','method'=>'POST','autocomplete'=>'off')) !!}
    {!! Form::token() !!}

    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
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
                <label for="chofer">Chofer</label>
                <select name="Per_CI2" id="Per_CI2" class="form-control selectpicker" data-live-search="true" title="Escoger chofer...">
                    @foreach($chofer as $c)
                        <option value="{{ $c->Per_CI }}">{{ $c->Per_CI}}: {{$c->Nombre}}: {{$c->Apellido_Paterno}}: {{$c->Licencia}}: {{$c->Placa}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="material">Material</label>
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

    < class="row">
        <div class="panel panel-primary">
            <div class="panel-body">
                <h3 align="center"><b>DETALLE DE ENTREGA DE COMBUSTIBLE</b></h3>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                        <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                            <thead>
                            <th>OPCIONES</th>
                            <th>CHOFER</th>
                            <th>COMBUSTIBLE</th>
                            <th>CANTIDAD</th>
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
        <script type="text/javascript">
            function btnClick() {

            }
        </script>
    <?php

    /* https://programarenphp.wordpress.com*/

    /******** CONECTAR CON BASE DE DATOS **************** */
    /******** Recuerda cambiar por tus datos ***********/
    $conexion=  mysqli_connect("localhost", "root", "", "apoloconstructoramesa");
   // $con = mysql_connect(“host”,”usuario”,”contraseña”);

    if (!$conexion){die(`ERROR DE CONEXION CON MYSQL:` . mysql_error());}
    /* ********************************************** */
    /********* CONECTA CON LA BASE DE DATOS  **************** */
    $database = mysql_select_db(“almacen”,$con);
    if (!$database){die(‘ERROR CONEXION CON BD: ‘.mysql_error());}
    /* ********************************************** */
    /*ejecutamos la consulta, que solicita nombre, precio y existencia de la
    tabla productos */
    $sql = “SELECT nombre, precio, existencia FROM productos WHERE codigo='”
      .$_POST[‘codigo’].”‘”;
$result = mysql_query ($sql);
// verificamos que no haya error
if (! $result){
   echo “La consulta SQL contiene errores.”.mysql_error();
   exit();
}else {
    echo “<table border=’1’><tr><td>Nombre</td><td>Precio</td><td>Existencia</td>
         </tr><tr>”;
//obtenemos los datos resultado de la consulta
    while ($row = mysql_fetch_row($result)){
                echo “<td>”.$row[0].”</td><td>”.$row[1].”</td>
              <td>”.$row[2].”</td>”;
   }
   echo “</tr></table>”;
 }
?>


        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">
            <div class="form-group">
                <input name="_token" value="{{csrf_token()}}" type="hidden">
                <button class="btn btn-primary" type="submit"  onclick='return btnClick();'>Guardar</button>
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


            Per_CI = $("#Per_CI2").val();
            chofer = $("#Per_CI2 option:selected").text();

            Codigo = $("#Codigo2").val();
            material = $("#Codigo2 option:selected").text();

            cantidad = $("#Cantidad2").val();

            if(chofer != "" && chofer!= "Escoger chofer..." && material != "" && material != "Escoger material..."  && cantidad != "" && cantidad > 0){

                var fila = '<tr class="selected" id="fila'+c+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+c+');">X</button></td><td><input id="Per_CI" type="hidden" name="Per_CI" value="'+Per_CI+'">'+chofer+'</td><td><input id="Codigo" type="hidden" name="Codigo" value="'+Codigo+'">'+material+'</td><td><input id="Cantidad" type="number" name="Cantidad" value="'+cantidad+'" ></td></tr>';

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
                $('#btn_add').hide();
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