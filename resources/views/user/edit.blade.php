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
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{$user->name}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Last name</label>
                                <input type="text" name="lname" class="form-control" id="exampleInputEmail1" value="{{$user->lname}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Username</label>
                                <input type="text" name="username" class="form-control" id="exampleInputEmail1" value="{{$user->username}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control"name="email" id="exampleInputEmail1" value="{{$user->email}}">
                            </div>
                            <div class="form-group" >
                                <label for="exampleInputPassword1">Status</label>
                                <input type="text" name="status" class="form-control" id="exampleInputPassword1" value="{{$user->status}}">
                            </div>
                            <div class="form-group">
                                <h3>Roles</h3>
                                @foreach($roles as $role)
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" @if($user->hasRole($role->name)) {{'checked'}} @endif name="roles[]" value="{{ $role->id }}">{{ $role->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="/user/changePassword/{{$user->id}}" class="btn btn-danger pull-right" >
                                <i aria-hidden="true"></i> Change Password</a>
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




