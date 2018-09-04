@extends('main')

@section('title', '- Edit Users')

@section('stylesheets')
    {!! Html::style('css/users.css') !!}
    {!! Html::style('css/dashboard.css') !!}
    {!! Html::style('css/parsley.min.css') !!}
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
            font-size: 1.5rem;
            display: none;
        }
        .md-form label{
            font-size: 1.3rem;
            display: block;
        }
        input[type="text"]:not(.browser-default), input[type="number"]:not(.browser-default){
            font-size: 1.3rem;
            font-weight: bold;
        }
        .md-form input[type="text"]:not(.browser-default), .md-form input[type="number"]:not(.browser-default){
            font-size: 1.5rem;
        }
        input[type="text"]:focus:not(.browser-default):not([readonly]),input[type="number"]:focus:not(.browser-default):not([readonly]){
            border-bottom: 1px solid #00D255;
            -webkit-box-shadow: 0 1px 0 0 #00D255;
            box-shadow: 0 1px 0 0 #00D255;
        }
        .btn{
            background: #00D255;
            font-size: 1.11rem;
            font-weight: bold;
        }
        .btn:focus, .btn:hover {
            background: rgba(0, 210, 85, 0.8);
        }
        .pad{
            margin-top: 30px;
            margin-bottom: 20px;
        }
        .select-wrapper span.caret{
            color: #f5f5f5;
        }

    </style>
@endsection


@section('content')

    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-xs-12">

            <h3>Edit User</h3>
            <hr/>

            {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT']) !!}

                <div class="form-group pad">
                    {{ Form::label('roles', 'Role(s)') }}
                    {{ Form::select('roles[]', $roles, $userRole, ['class' => '', 'multiple', 'required' => '']) }}
                </div>

            {{ Form::submit('Update User', ['class' => 'inputbutton btn btn-primary']) }}

            {!! Form::close() !!}
        </div>
    </div>

@endsection


@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/materialize.min.js') !!}\

    <script>
        //initialize materialize select
        $(document).ready(function() {
            $('select').material_select();
        });
    </script>
@endsection