@extends('main')

@section('title', '- Permissions')

@section('stylesheets')
    {!! Html::style('css/dashboard.css') !!}

    <style>
        .btn-success{
            background: #00D255;
            font-size: 1.3rem;
            font-weight: 700;
        }
        .btn-success:focus, .btn-success:hover{
            background: rgba(0, 210, 85,0.8);
        }
        @media (max-width: 767px) {
            .fo{ font-size: 20px; text-align: left !important;}
            .fo .btn{ margin-top: -25px}
        }
    </style>
@endsection


@section('content')

    <div class="row">
        <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-xs-12">
            <h3 class="fo">
                <span class="hidden-xs">Permissions Management </span>
                <span class="visible-xs">Permissions </span>
                <a class="pull-right btn btn-success" href="{{ route('permissions.create') }}">Create New Permission</a>
            </h3>
            <hr/>
            <table class="table table-responsive table-bordered text-center">
                <thead>
                <tr>
                    <td>S/N</td>
                    <td>Name</td>
                    <td>Display</td>
                    <td>Description</td>
                    <td>Roles attached to permission</td>
                    <td colspan="2">Actions</td>
                </tr>
                </thead>
                <tbody>
                @foreach($permissions as $permission)
                    <tr>
                        <td>{{ $permission->id }}</td>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->display_name }}</td>
                        <td>{{ $permission->description }}</td>
                        <td>
                            @if(!empty($permission->roles))
                                @foreach($permission->roles as $role)
                                    <label class="label label-success">{{ $role->display_name }}</label>
                                @endforeach
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('permissions.edit', $permission->id) }}">Edit</a>
                        </td>
                        <td>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
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