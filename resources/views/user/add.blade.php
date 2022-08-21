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
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border text-center">
                        <h3 class="box-title">Register user</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="/add/user" method="POST">
                        {!! csrf_field() !!}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Last name</label>
                                <input type="text" name="lname" class="form-control" id="exampleInputEmail1" placeholder="Enter last name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Username</label>
                                <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Enter last name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control"name="email" id="exampleInputEmail1" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="form-group" hidden>
                                <label for="exampleInputPassword1">Status</label>
                                <input type="text" name="status" class="form-control" id="exampleInputPassword1" value="Code">
                            </div>
                            <div class="form-group">
                                <h3>Roles</h3>
                                @foreach($roles as $role)
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"name="role[]" value="{{$role->id}}"> {{$role->name}}
                                        </label>
                                    </div>
                                @endforeach
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




