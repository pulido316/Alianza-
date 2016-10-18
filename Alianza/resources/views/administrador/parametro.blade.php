@extends('layouts.app_index')

@section('content')

<div id="wrapper">

    <div id="page-wrapper">

        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Parámetros
                    </h1>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div>
                        <legend>Tipo de inmueble</legend>
                        <form role="form" role="form" method="POST" action="{{url('parametros')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="nombreTipo">Nombre</label>
                                <input type="text" name="tipo" class="form-control" id="tipo" placeholder="Nombre tipo de inmueble">
                                <br>
                                @if($errors->has('tipo'))
                                <span style="color:red;">{{ $errors->first('tipo') }}</span>
                                <br>
                                @endif
                                <button type="submit" class="btn btn-default">Agregar</button>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="col-lg-6">
                    <div>
                        <legend>Agregar Persona</legend> 
                        <form role="form" role="form" method="POST" action="{{url('parametros')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="nombreTipo">Nombre</label>
                                <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre tipo de inmueble">
                                <label for="apellido">Apellido</label>
                                <input type="text" name="apellido" class="form-control" id="apellido" placeholder="Nombre tipo de inmueble">
                                <label for="correo">Correo</label>
                                <input id="email" type="email" class="form-control" name="email" value="Correo de la persona"required="" autofocus="">
                                
                                <br>
                                @if($errors->has('tipo'))
                                <span style="color:red;">{{ $errors->first('tipo') }}</span>
                                <br>
                                @endif
                                <button type="submit" class="btn btn-default">Agregar</button>
                            </div>
                        </form>                       
                    </div>
                </div> 
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->



    <script type="text/javascript">
        $("#lote").addClass('active');
    </script>
    @stop
