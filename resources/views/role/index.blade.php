@extends('master')

@section('extra-head-assets')
{{--Add additional head assets here--}}

<link rel="stylesheet" href="/assets/plugins/sweetalert2.min.css">
<script src="/assets/plugins/sweetalert2.min.js"></script>
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
<div class="container">
    <div class="row">
        <div class="col-md-8" style="margin-left: 35px">
            <h1>Roles</h1>
            <table class="table">
                <thead>
                <?php $No=1; ?>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>DName</th>
                    <th>Desc</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                @foreach($roles as $role)
                    <tr>
                        <th><b>{{ $No++ }}</b></th>
                        <th><b>{{ $role->name }}</b></th>
                        <th><b>{{ $role->display_name }}</b></th>
                        <th><b>{{ $role->description }}</b></th>
                        <th>
                            <div class="ui-group-buttons">
                                @role('Code')
                                <a class="btn btn-primary btn-xs" href="/editRole/{{ $role->id }}">Edit</a>
                                <button type="button" onclick="deleteRole('{{ $role->id }}');" class="btn btn-danger btn-xs">Delete</button>
                                @endrole
                            </div>
                        </th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-md-3">
            <div class="well">
                <a class="btn btn-primary btn-xs" href="/create">Create Role</a>
            </div>
        </div>
    </div>
</div>
    </body>
@stop
@section('extra-footer-assets')
    {{--Add additional footer assets here--}}

    <script>
        function deleteRole(id){
            location.href = '/delete/role/' + id;
        }
    </script>
@stop




