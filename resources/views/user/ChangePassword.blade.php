@extends('master')

@section('extra-head-assets')
{{--Add additional head assets here--}}

        <!-- Stylesheets
    ============================================= -->
@stop

@section('header')
    @include('partials.admin-header')
@stop


@section('content')
    <body class="hold-transition skin-blue sidebar-mini">
    @include('partials.left-side')
    @include('partials.content-header')

    <section class="container">
        <div class="row">
            <!-- left column -->
            <div class="col-md-9 col-lg-offset-3">
                <a href="/" class="btn btn-default center-block" style="margin-left: 35px">
                    <i aria-hidden="true"></i> Back</a>
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border text-center">
                        <h3 class="box-title">Edit user</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="" method="POST">
                        {!! csrf_field() !!}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="password" placeholder="Password" class="form-control" id="exampleInputEmail1" name="password" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Last name</label>
                                <input type="password" placeholder="Ponovite password" class="form-control" id="exampleInputEmail1" name="password_confirmation" required>
                            </div>


                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>

                        </div>
                    </form>
                </div>


                <!-- /.box -->
            </div>
            <!--/.col (left) -->

        </div>
        <!-- /.row -->
    </section>



    </body>
@stop
@section('extra-footer-assets')
    {{--Add additional footer assets here--}}

@stop




