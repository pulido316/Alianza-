@extends('layouts.app_index')

@section('content')

<div id="wrapper">

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Inmueble
                    </h1>

                </div>
            </div>
            {!! Form::select('zona')!!}
           
            {!! Form::select('barrio')!!}

            <div class="row">
                <div class="col-lg-6">
                </div>
            <div class="col-lg-6">
              <h1>Disabled Form States</h1>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>

<!-- /#wrapper -->
<script type="text/javascript">
    $("#inmueble").addClass('active');
</script>
@stop
