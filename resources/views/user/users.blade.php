@extends('master')

@section('extra-head-assets')
{{--Add additional head assets here--}}

        <!-- Stylesheets
    ============================================= -->
@stop
<link rel="stylesheet" href="/assets/plugins/sweetalert2.min.css">
<script src="/assets/plugins/sweetalert2.min.js"></script>
@section('header')
    @include('partials.admin-header')
@stop


@section('content')
    <body class="hold-transition skin-blue sidebar-mini">
    @include('partials.left-side')
    @include('partials.content-header')
    <section class="panel container">
        <header class="panel-heading">
            <a href="/reg" class="btn btn-default center-block" style="margin-left: 35px">
                <i aria-hidden="true"></i> Create New User</a>
        </header>
        <form action="/" method="GET" style="margin-left: 35px" id="filter">
            <div class="box-body">
                <div class="form-group col-md-2">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter name"
                           value="{{(isset($_GET['name'])) ? $_GET['name']  : ''}}">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputEmail1">Last name</label>
                    <input type="text" name="lname" class="form-control" id="exampleInputEmail1" placeholder="Enter last name"
                           value="{{(isset($_GET['lname'])) ? $_GET['lname']  : ''}}">
                </div>
                <div class="form-group  col-md-2">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Enter username"
                           value="{{(isset($_GET['username'])) ? $_GET['username']  : ''}}">
                </div>

                <div class="form-group  col-md-2">
                    <label for="exampleInputPassword1">Status</label>
                    <input type="text" name="status" class="form-control" id="exampleInputPassword1" placeholder="Enter status"
                           value="{{(isset($_GET['status'])) ? $_GET['status']  : ''}}">
                </div>
                <div class="form-group  col-md-2">
                    <label for="exampleInputPassword1">Order desc</label>
                    <input type="radio" name="order"  id="exampleInputPassword1"
                           value="desc" {{(isset($_GET['order'])) ? $_GET['order'] == 'desc' ? 'checked' : ''  : ''}}>
                    <label for="exampleInputPassword2">Order</label>
                    <input type="radio" name="order"  id="exampleInputPassword2"
                           value="asc" {{(isset($_GET['order'])) ? $_GET['order'] == 'asc' ? 'checked' : ''  : ''}}>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </div>
            <!-- /.box-body -->


        </form>
        <div class="panel panel-default" style="margin-left: 35px">
            <table class="table table-striped" >
                <thead>
                <tr>
                    <th>NO.</th>
                    <th>Name</th>
                    <th>Last name</th>
                    <th>Username</th>
                    <th>E-mail</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $No=1; ?>
                @foreach($users as $user)

                        <tr id="line">
                            <td class="col-md-1 center">{{ $No++ }}</td>
                            <td class="col-md-2 center">{{$user->name}}</td>
                            <td class="col-md-2 center">{{$user->lname}}</td>
                            <td class="col-md-2 center">{{$user->username}}</td>
                            <td class="col-md-2 center">{{$user->email}}</td>
                            <td class="col-md-2 center">{{$user->status}}</td>
                            <td class="col-md-2 center">
                                <div class="ui-group-buttons">
                                    @role('Code')
                                    <a class="btn btn-primary btn-xs" href="/user/edit/{{ $user->id }}">Edit </a>
                                    <button type="button" onclick="deleteUser('{{ $user->id }}');" class="btn btn-danger btn-xs">Del</button>
                                    @endrole
                                </div>
                            </td>
                        </tr>

                @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </section>

    </body>
@stop
@section('extra-footer-assets')
    {{--Add additional footer assets here--}}
    <script>


        function deleteUser(id){
            swal({
                title: 'Are you sure you want to delete this user.?',
                text: "",
                type: 'success',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then(function () {
                $.ajax({
                    url:'/user/delete/'+ id,
                    method:'get',
                    success: function(response){
                        swal(
                                'Obrisan!',
                                response.status,
                                'success'
                        )
                        $('#line'+id).remove();
                    },
                    error:function(response,text,error){
                        swal(
                                'Deleted!',
                                error,
                                'warning'
                        )
                    }

                });

            })
        }
    </script>
@stop



