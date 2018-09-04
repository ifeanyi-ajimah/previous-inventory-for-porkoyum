@extends('main')

@section('title', '- All Roles')

@section('stylesheets')
    {!! Html::style('css/dashboard.css') !!}

    <style>
        hr{
            visibility: hidden;
        }
        tr{
            padding-top: 20px;
            padding-bottom: 20px;
        }
        .fo{ font-size: 20px; text-align: left !important;}
        .fo .btn{ margin-top: -25px;}
    </style>
@endsection

@section('content')
    <div class="row details">
        <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-xs-12">
            <h3 class="fo">
                <span class="hidden-xs">User Roles Management</span>
                <span class="visible-xs">User Roles Mgt</span>
                <a class="btn btn-success pull-right" href="{{ route('roles.create') }}">Create New Role</a></h3>
            <hr/>

            <table class="table table-responsive details">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Name</th>
                        <th>Display Name</th>
                        <th>Description</th>
                        <th colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->display_name }}</td>
                            <td>{{ $role->description }}</td>
                            <td>
                                <a class="btn btn-info" href="{{ route('roles.show', $role->id) }}">
                                    <span class="glyphicon glyphicon-eye-open"></span>
                                </a>
                                <a class="btn btn-primary" href="{{ route('roles.edit', $role->id) }}">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('styles')

@endsection