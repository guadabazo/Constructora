<h3 align="center">Reporte ingreso de dotacion</h3>
<head>

    <link href="css/style.css" rel="stylesheet" type="all">
</head>

<div class="panel panel-primary">
    <div class="panel-body">

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="table-responsive">
                    <table  align="center" heigt="50" border="1" class="table table-striped table-bordered table-condensed table-hover">
                        <thead>
                        <th>Codigo</th>
                        <th>Fecha</th>
                        <th>Nombre Usuario</th>
                        <tr></tr>

                        @foreach($data as $ing)
                            @foreach($invoice as $idroles)
                                <tr>
                                    <th>{{ $ing->Codigo }}</th>
                                    <th>{{ $ing->Fecha_Hora }}</th>
                                    <th>{{ $idroles->Nombre}}</th>
                                </tr>
                            @endforeach
                        @endforeach
                        </thead>
                    </table>
                </div>

            </div>
        </div>
    </div>

</div>