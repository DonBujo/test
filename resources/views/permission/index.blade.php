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
            <h1>Permission</h1>
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
                @foreach($permissions as $permission)
                    <tr>
                        <th><b>{{ $No++ }}</b></th>
                        <th><b>{{ $permission->name }}</b></th>
                        <th><b>{{ $permission->display_name }}</b></th>
                        <th><b>{{ $permission->description }}</b></th>
                        <th>
                            <div class="ui-group-buttons">
                                @role('Code')
                                <a class="btn btn-primary btn-xs" href="/edit/permision/{{ $permission->id }}">Edit</a>
                                <button type="button" onclick="deletePermission('{{ $permission->id }}');" class="btn btn-danger btn-xs">Delete</button>
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
                <form action="/store/permission" method="post">
                    {!! csrf_field() !!}
                    <h2>New Permission</h2>
                    <input type="text" id="name" name="name" class="form-control required" placeholder="Permission name">
                    <input type="text" id="display_name" name="display_name" class="form-control required" placeholder="Display name">
                    <input type="text" id="description" name="description" class="form-control required" placeholder="Description">

                    <hr>
                    <button type="submit" class=" btn btn-success">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
    </body>
@stop
@section('extra-footer-assets')
    {{--Add additional footer assets here--}}

    <script>
        function deletePermission(id){
            location.href = '/permission/delete/' + id;
        }
    </script>
@stop




