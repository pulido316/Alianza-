@extends('layouts.app_index')

@section('content')



<div id="wrapper">

    <div id="page-wrapper">

        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Inmuebles
                    </h1>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div>
                        <legend>Agregar Inmueble</legend>
                        <select name="empresa">

                        @foreach($zona as $dato)

                            <option value="{{ $dato->id }}">{{ $dato->nombre }}</option>

                            @endforeach

                        </select>

                    </div>

                </div>
                <div class="col-lg-6">
                    <div>
                        <legend>Agregar Persona</legend> 

                    </div>
                </div> 
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->


    <!-- /#wrapper -->
    <script type="text/javascript">
        $("#inmueble").addClass('active');
    </script>
    @stop
