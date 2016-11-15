@extends('layouts.app_index')

@section('content')

<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.css">
<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>

<div id="wrapper">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Publicaciones
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa  fa-tags  fa-4x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        @foreach($contar as $cuenta)

                                        {!! $cuenta->numero !!}

                                        @endforeach
                                    </div>
                                    <div>Publicaciones</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div id="listar" class="panel-footer">
                                <span class="pull-left">listar</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa  fa-plus-square-o fa-4x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><br></div>
                                    <div>Nuevo Publicacion</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div id="crear" class="panel-footer">
                                <span class="pull-left">Crear</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <br>
            </div>

            <div class="row">
            <div class="col-lg-12">
                <div id="tabla_lista" class="table-responsive table tabla_lista" style="display: none;">
                    <table id="example"  class="table table-hover table-striped  table-striped table-borderedSeen">
                        <thead>
                            <tr>
                                <th>Direccion</th>
                                <th>Operacion</th>
                                <th>Fecha de publicacion</th>
                                <th>Fecha de cierre publicacion</th>
                                <th>Estado</th>
                                <th>Editar</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div id="add_publicacion" style="display: none;">
                    <h1>postular</h1>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">


     $('#example').dataTable();

    $("#listar").click(function(){
        $(".tabla_lista").show()
        $("#add_publicacion").hide()

    });
    $("#crear").click(function(){
        $(".tabla_lista").hide()
        $("#add_publicacion").show()

    });




</script>
@stop




