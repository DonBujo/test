@extends('admin.master')

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

    <div class="jumbotron">
        <h1 class="text-center"><b>Welcome</b><br>Šta radimo danas... <br>Boss???</h1>
    </div>


</body>
@stop
@section('extra-footer-assets')
    {{--Add additional footer assets here--}}

@stop




