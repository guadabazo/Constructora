<!DOCTYPE html>
<html lang="en">
<head>
    <h3 align="center">Reporte Ingreso De Herramientas</h3>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>REPORTE ENTREGA DE MATERIAL</title>
    <link href="css/style.css" rel="stylesheet" type="all">

</head>
<body>

<main>



    <div class="panel panel-primary">
        <div class="panel-body">

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  >
                    <div class="table-responsive">
                        <table align="center" heigt="50" border="1" class="table table-striped table-bordered table-condensed table-hover" >
                            <thead>
                            <th>Codigo</th>
                            <th>Fecha</th>
                            <th>Proveedor</th>
                            <th>Material</th>
                            <th>Cantidad</th>
                            <tr></tr>
                            @foreach($data as $ing)
                                <tr>
                                    <th>{{ $ing->Codigo }}</th>
                                    <th>{{ $ing->Fecha }}</th>
                                    <th>{{ $ing->N }}</th>
                                    <th>{{ $ing->Nombre }}</th>
                                    <th>{{ $ing->Cantidad }}</th>
                                </tr>
                            @endforeach
                            </thead>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>



</body>
</html>