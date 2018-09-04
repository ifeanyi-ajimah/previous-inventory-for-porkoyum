@extends('main')

@section('title', '- View Roles')

@section('stylesheets')
    {!! Html::style('css/dashboard.css') !!}
    {!! Html::style('css/materialize.css') !!}
    {!! Html::style('css/compiled.css') !!}

    <style>
        .caret{
            border-color: transparent !important;
        }
        .select-wrapper ul{
            list-style: none;
        }
        .select-wrapper span.caret {
            right: 7px;
            top: 0px;
            font-size: 10px;
        }
        .select-wrapper input.select-dropdown{
            font-size: 1.2rem;
            font-weight: bold;
        }
        .select-dropdown{
            /*width: 100% !important;*/
            padding-left: 0px !important;
        }
        label{
            color: #808080;
            font-size: 1rem;
        }
        .btn-success{
            background: #00D255;
            font-family: arial;
            font-size: 1.05rem;
            font-weight: 100 !important;
        }
        .btn-success:focus, .btn-success:hover{
            background: rgba(0, 210, 85,0.8);
        }
        .btn-danger{
            background: #ea1e39;
            font-size: 1.05rem;
        }
        .btn-danger:focus, .btn-danger:hover{
            background: rgba(234, 30, 57,0.8);
        }
        .btn{
            font-weight: 700;
        }
        .select-wrapper span.caret{
            color: #f5f5f5;
        }
    </style>
@endsection

@section('content')
    <div class="row details">
        <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-xs-12">
            <div class="row">
                <h4>View <strong>{{ $role->display_name }}</strong> Role Details</h4>
                <hr/>
                <a class="btn btn-primary" href="{{ route('roles.index') }}">Go Back to Roles</a>
                <a class="btn btn-danger" href="">Delete this Role</a>

                <div class="details">
                    <div class="form-group">
                        <strong>Name:</strong>
                        {{ $role->name }}
                    </div>
                    <div class="form-group">
                        <strong>Display Name:</strong>
                        {{ $role->display_name }}
                    </div>
                    <div class="form-group">
                        <strong>Description:</strong>
                        {{ $role->description }}
                    </div>
                    <div class="form-group">
                        <strong>Permission(s):</strong>
                        @if(!empty($rolePermissions))
                            @foreach($rolePermissions as $rolePermission)
                                <label class="label label-success">{{ $rolePermission->display_name }}</label>
                            @endforeach
                        @else
                            <em>No Permissions given to this role yet</em>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row details">
                <h4 style="font-weight: 700; text-align: center;">Add Permission to this Role</h4>
                <hr/>
                {!! Form::open(['route' => 'roles.attachPermission', 'method' => 'POST', 'data-parsley-validate' => '']) !!}

                    {{ Form::hidden('role_id', $role->id) }}

                    {{ Form::hidden('role', $role->name) }}

                    <div class="form-group">
                        {{ Form::label('permission', 'Permissions') }}
                        <select name="permission" class="">
                            @foreach($permissions as $permission)
                                <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{ Form::submit('Add Permission', ['class' => 'inputbutton btn btn-success']) }}

                {!! form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    {!! Html::script('js/materialize.min.js') !!}

    <script>
        //initialize materialize select
        $(document).ready(function() {
            $('select').material_select();
        });
    </script>

@endsection