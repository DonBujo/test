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
    <div class="container clearfix page-section" >
        <div class="bottommargin center" style="margin-left: 35px">
            <a href="/role" class="btn btn-default center-block">
                <i class="fa fa-angle-double-left" aria-hidden="true"></i> BACK</a>

            <form class="col-md-12" action="/store/role" method="post">

                {!! csrf_field() !!}
                <div class="form-group">
                    <label for="naslov">Name *</label>
                    <input type="text" name="name" placeholder="Name"class="form-control required">
                </div>
                <div class="form-group">
                    <label for="naslov">Display Name *</label>
                    <input type="text" name="display_name" placeholder="Display Name"class="form-control required">
                </div>
                <div class="form-group">
                    <label for="naslov">Description *</label>
                    <input type="text" name="description" placeholder="Description"class="form-control required">
                </div>
                <div class="form-group">
                    <h3>Permission</h3>
                    @foreach($permissions as $permission)
                        <input type="checkbox"name="permission[]" value="{{$permission->id}}"> {{$permission->name}}
                    @endforeach
                </div>

                <button type="submit" class="pull-right btn btn-success">Save changes</button>

            </form>

        </div>
    </div>
    </body>
@stop
@section('extra-footer-assets')
    {{--Add additional footer assets here--}}

@stop




