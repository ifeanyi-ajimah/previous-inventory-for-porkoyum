@extends('main')

@section('title', '- Manage Users')

@section('stylesheets')
    {!! Html::style('css/input-material.css') !!}
    {!! Html::style('css/users.css') !!}

    <style>
        body {
            background-color: #171B1F;
            color: #fff;
            font-family: "Raleway", sans-serif;
        }
        hr{
            visibility: hidden;
        }
        .navbar-default{
            background: rgba(0,0,0,0.1);
            border-color: rgba(0,0,0,0.2);
        }
        .navbar-nav > li > .dropdown-menu{
            background-color: rgba(11,11,11,0.95);
            border-radius: 2px;
        }
        .dropdown-menu li > a{
            color: #f5f5f5;
        }
        .dropdown-menu > li > a:focus, .dropdown-menu > li > a:hover{
            background: #000000;
            color: rgba(226,226,226,0.98);
        }
        .dropdown-menu li:hover{
            background: #000;
        }
        .dropdown-menu{
            background: rgba(11,11,11,0.95);
            min-width: 180px;
        }
        .navbar-default .navbar-nav > li > a:focus, .navbar-default .navbar-nav > li > a:hover{
            color: whitesmoke;
        }
        .btn-override{
            background: #00D255;
            /*font-size: 1.11rem;
            font-weight: bold;*/
            border-color: transparent;
        }
        .btn-override:focus, .btn-override:hover {
            background: rgba(0, 210, 85, 0.8);
            border-color:transparent ;
        }
        .table-bordered, .table-bordered > tbody > tr > td, .table > thead:first-child > tr:first-child > td{
           border: 1px solid rgba(221, 221, 221,0.5);
        }
        @media (min-width: 992px) {
            .alert-success {
                background-color: rgba(223, 240, 216, .8);
                border-color: rgba(223, 240, 216, .8);
                color: #3c763d;
            }
            .alert-dismissable, .alert-dismissible{
                width: 40%;
                float: right;
                margin-right: 7.33%;
            }
            .alert-danger {
                background-color: rgba(242, 222, 222, .8);
                border-color: rgb(235, 204, 209);
                color: #a94442;
            }
        }
        @media (max-width: 767px) {
            .fo{ font-size: 20px; text-align: left !important;}
        }
        .dataTables_length{
            display: none;
        }
        .dataTables_filter.input-field label{
            position: relative;
            top: 0;
            width: 100%;
            padding: 0;
        }
        .input-field input[type="search"]{
            padding: 0;
        }
        .input-field input[type="search"]:focus {
            background: transparent;
            color: white;
        }
        .row{
            margin-left: 0;
        }
    </style>
@endsection


@section('content')

    <div class="row">
        <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-xs-12">
            
            <div class="row">
                <h3 class="fo" style="text-align: center;">{{ isset($title)? $title : "User Management" }}<a class="pull-right btn btn-primary btn-override" href="{{ route('users.create') }}">Create New User</a></h3>
                <hr/>
            </div>
            <table class="table table-responsive table-bordered text-center" id="searcher">
                <thead>
                    <tr>
                        <td>S/N</td>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Roles</td>
                        <td></td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if(!empty($user->roles))
                                    @foreach($user->roles as $role)
                                        <label class="label label-success">{{ $role->display_name }}</label>
                                    @endforeach
                                @endif
                            </td>
                            <td><a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">Edit</a></td>
                            <td>{!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="margin: 0 auto; display: table">{{ $users->links() }}</div>
        </div>
    </div>

@endsection


@section('scripts')
    {!! Html::script('js/datatables.js') !!}
    {!! Html::script('js/materialize.min.js') !!}

    <script>
        $(document).ready(function() {
            $('#searcher').DataTable();
            $(".dataTables_filter").addClass("input-field");
            $(".dataTables_filter").appendTo(".md-form");
        });
    </script>
@endsection