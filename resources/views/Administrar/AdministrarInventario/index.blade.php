@extends('layouts.admin')
@section('contenido')

    <section class="content-header">
        <h1 align="center"><b>INVENTARIO</b></h1>
        <section class="content">
            <div class="col-md-6 col-sm- col-xs-12">
                <div class="col-xs-6 table">
                    <button type="button" class="btn btn-block bg-maroon btn-flat margin">DOTACION</button>
                    <table class="table table-striped">
                        <thead>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        </thead>
                        @foreach ($dotacion as $d)
                            <tr>
                                <td>{{ $d->Nombre}}</td>
                                <td>{{ $d->C}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="col-xs-6 table">
                    <button type="button" class="btn btn-block bg-blue btn-flat margin">HERRAMIENTAS</button>
                    <table class="table table-striped">
                        <thead>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Estado</th>
                        </thead>
                        @foreach ($herramienta as $h)
                            <tr>
                                <td>{{ $h->NH}}</td>
                                <td>{{ $h->Cantidad}}</td>
                                <td>{{ $h->Descripcion}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="col-xs-6 table">
                    <button type="button" class="btn btn-block bg-green btn-flat margin">MATERIAL</button>
                    <table class="table table-striped">
                        <thead>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        </thead>
                        @foreach ($material as $m)
                            <tr>
                                <td>{{ $m->Nombre}}</td>
                                <td>{{ $m->Cantidad}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="col-xs-6 table">
                    <button type="button" class="btn btn-block bg-blue btn-flat margin">PRODUCCION</button>
                    <table class="table table-striped">
                        <thead>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        </thead>
                        @foreach ($produccion as $pr)
                            <tr>
                                <td>{{ $pr->Tipo}}</td>
                                <td>{{ $pr->Cantidad}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="">
                    <div class="">
                        <div class="col-xs-6 table">
                            <button type="button" class="btn btn-block bg-red btn-flat margin">PROYECTO</button>
                            <table class="table table-striped">
                                <thead>
                                <th>Nombre</th>
                                <th>Tipo</th>
                                <th>Estado</th>
                                </thead>
                                @foreach ($proyecto as $p)
                                    <tr>
                                        <td>{{ $p->NP}}</td>
                                        <td>{{ $p->ID}}</td>
                                        <td>{{ $p->Descripcion}}</td>

                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
