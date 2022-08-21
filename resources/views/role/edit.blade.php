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

            <form class="col-md-12" action="" method="post">
                {!! method_field('PATCH') !!}
                {!! csrf_field() !!}
                <div class="form-group">
                    <label for="naslov">Name *</label>
                    <input type="text" name="name" value="{{ $role->name }}"class="form-control required">
                </div>
                <div class="form-group">
                    <label for="naslov">Display Name *</label>
                    <input type="text" name="display_name" value="{{ $role->display_name }}"class="form-control required">
                </div>
                <div class="form-group">
                    <label for="naslov">Description *</label>
                    <input type="text" name="description" value="{{ $role->description }}"class="form-control required">
                </div>
                <div class="form-group">
                    <h3>Permission</h3>
                    @foreach($permissions as $permission)
                        <div class="checkbox">
                            <label>
                                <?php
                                $checked="";
                                foreach ($rolepremissions as $rolepermission){
                                    if ($permission->id==$rolepermission->id) $checked="checked";
                                }
                                ?>
                                <input type="checkbox"  {{ $checked }} name="permissions[]" value="{{ $permission->id }}">{{ $permission->name }}
                            </label>
                        </div>
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




